<?php

namespace Ftm\PlayerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ftm\PlayerBundle\Entity\Inscription;
use Ftm\PlayerBundle\Entity\Player;

class PlayerController extends Controller
{
    public function inscriptionAction()
    {		
		$uniqid = md5(microtime().rand());
		$validation=false;//tout c'est bien passe
		$demand=false; //fait deja l'etat d'une demande
		$minimumAge = 13;
		
		$player = new Inscription;
		
		$formBuilder = $this->createFormBuilder($player);
		$er = $this->getDoctrine()
					 ->getManager()
					 ->getRepository('FtmPlayerBundle:Inscription');
		
		$formBuilder
				->add('pseudo',        'text', array('attr'=>array('autofocus'=>'autofocus')))
				->add('email',       'text')
				->add('motivation',     'textarea')
				->add('age',      'integer');
		$form = $formBuilder->getForm();

		$request = $this->get('request');
	
		if ($request->getMethod() == 'POST') {
		 
		  $form->bind($request);
		  
		  $demand = $er->exists($player->getPseudo());
		  
		  if ($form->isValid() && !$demand) 
		  {
			$repo = $this->getDoctrine()->getManager();
			$player->setPremod(($player->getAge()<$minimumAge?true:false));
			$player->setUniqid($uniqid);
			$repo->persist($player);
			$repo->flush();
			$validation = true;
			
			if($player->getAge()<$minimumAge)
			{
				$mailer = $this->get('mailer');

				$message = \Swift_Message::newInstance()
				  ->setSubject('Inscription FTM!')
				  ->setFrom('staff@ftmarshmallow.com')
				  ->setTo($player->getEmail())
				  ->setBody($this->renderView('FtmPlayerBundle:Moderation:refuse.txt.twig', array('name' => $player->getPseudo())));

				$mailer->send($message);
			}
			$mailer = $this->get('mailer');
		 	$doby = \Swift_Message::newInstance()
				->setSubject('Nouvelle inscription')
				->setFrom('staff@ftmarshmallow.com')
				->setTo('iamadena.ftm@gmail.com')
				->setBody($this->renderView('FtmPlayerBundle:Moderation:doby.txt.twig', array('name' => $player->getPseudo(), 'motivation' => $player->getMotivation())));

			$mailer->send($doby);
			return $this->render('FtmPlayerBundle:Default:form.html.twig', array('valid'=>$validation, 'demand'=>$demand, 'form' => $form->createView()));
		  }
		}
		
        return $this->render('FtmPlayerBundle:Default:form.html.twig', array('valid'=>$validation, 'demand'=>$demand, 'form' => $form->createView(),));
    }
	
	public function passwordAction()
    {
		$repo =$this->getDoctrine()->getManager()->getRepository('FtmPlayerBundle:Player');
		$user = new Player;
		$user = $repo->findOneByUsername($this->getUser()->getUsername());
		$form = $this->createFormBuilder($user)
					 ->add('password', 'repeated', array(
					 		'error_bubbling'=>true,
						    'type' => 'password',
						    'invalid_message' => 'Les mots de passe ne correspondent pas.',
						    'options' => array('required' => true),
						    'first_options'  => array('label' => 'Mot de passe', 'error_bubbling'=>true),
						    'second_options' => array('label' => 'Mot de passe (validation)'),
						))
					 ->getForm();
		$request = $this->get('request');
		if($request->getMethod() == 'POST')
		{
			$form->bind($request);
			if($form->isValid())
			{
				$em =$this->getDoctrine()->getManager();
				$salt = md5(microtime().rand());
				$user->setSalt($salt);
				$factory = $this->get('security.encoder_factory');
				$encoder = $factory->getEncoder($user);
				$password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
				$user->setPassword($password);
				$em->persist($user);
				$em->flush();
				$this->get('session')->getFlashBag()->add('success', 'Votre mot de passe a été changé');
				return $this->redirect($this->generateUrl('ftm_player_info'));
			}
			
		}	   
		
        return $this->render('FtmPlayerBundle:Player:password.html.twig', array('form' => $form->createView()));
    }
	
	public function playerInfoAction()
	{
		$validation = false;
		$factory = $this->get('security.encoder_factory');
		$salt = md5(microtime().rand());
		
		$repository = $this->getDoctrine()
						   ->getManager()
						   ->getRepository('FtmPlayerBundle:Player');
						   
		$player = new Player;
		$player = $repository->findOneByUsername($this->getUser()->getUsername());
		
		$formBuilder = $this->createFormBuilder($player);
		
		$formBuilder
				->add('username',        'text')
				->add('email',       'text')
				->add('age',      'integer');
		$form = $formBuilder->getForm();
		
		$request = $this->get('request');
		
		if ($request->getMethod() == 'POST') {// Si on valide le formulaire
		 
		  $form->bind($request);//on lie les reponses
		  
		  if ($form->isValid()) 
		  {
			$repo = $this->getDoctrine()->getManager();//on prepare le manager a manager l'entité
			
			$repo->persist($player);
			$repo->flush();
			$this->get('session')->getFlashBag()->add('success', 'Vos informations ont été changés	');
		  }
		}
		
        return $this->render('FtmPlayerBundle:Player:info.html.twig', array('form' => $form->createView(), 'username'=>$player->getUsername(), 'api'=>$player->getApi()));
	}
	
	public function playerAdminAction($username)
	{
		$validation = false;
		$factory = $this->get('security.encoder_factory');
		$salt = md5(microtime().rand());
		
		$repository = $this->getDoctrine()
						   ->getManager()
						   ->getRepository('FtmPlayerBundle:Player');
						   
		$player = new Player;
		$player = $repository->findOneByUsername($username);
		
		$formBuilder = $this->createFormBuilder($player);
		
		$formBuilder
				->add('username',        'text')
				->add('email',       'text')
				->add('roles', 'collection', array('type'   => 'text','allow_add' => true,'allow_delete' => true,))
				->add('age',      'integer');
		$form = $formBuilder->getForm();
		
		$request = $this->get('request');
		
		if ($request->getMethod() == 'POST') {// Si on valide le formulaire
		 
		  $form->bind($request);//on lie les reponses
		  
		  if ($form->isValid()) 
		  {
			$repo = $this->getDoctrine()->getManager();//on prepare le manager a manager l'entité
			
			//recupere le role sous forme de tableau
			//$player->setRoles(array('ROLE_ADMIN'));
			
			$repo->persist($player);
			$repo->flush();
			$validation = true;
		  }
		}
		
        return $this->render('FtmPlayerBundle:Player:info.html.twig', array('valid'=>$validation, 'form' => $form->createView(), 'username'=>$username));
	}
	
	public function generatePassAction($name)
	{
		$repository = $this->getDoctrine()
						   ->getManager()
						   ->getRepository('FtmPlayerBundle:Player');
		
		$withoutPass = $repository->findByUsername($name);
		
		$repo = $this->getDoctrine()->getManager();
		$factory = $this->get('security.encoder_factory');
		foreach($withoutPass as $player)
		{
			$salt = md5(microtime().rand());
			$passwordUncrypt = uniqid();
			
			$player->setSalt($salt);
			$encoder = $factory->getEncoder($player);
			$password = $encoder->encodePassword($passwordUncrypt, $player->getSalt());
			$player->setPassword($password);
			
			//Mail:
			$mailer = $this->get('mailer');

			$message = \Swift_Message::newInstance()
			  ->setSubject('Salut Marshmallow!')
			  ->setFrom('staff@ftmarshmallow.com')
			  ->setTo($player->getEmail())
			  ->setBody($this->renderView('FtmPlayerBundle:Moderation:pass.txt.twig', array('name' => $player->getUsername(), 'password'=>$passwordUncrypt)));

			$mailer->send($message);
			
			$repo->persist($player);
			$repo->flush();
		}
		$this->get('session')->getFlashBag()->add('success','Mot de passe réinitialisé!');
		return $this->redirect($this->generateUrl('ftm_player_whitelist'));
	}
	
	public function sendMailAction()
	{
	
		$data = array();
		$form = $this->createFormBuilder($data)
			->add('Title', 'text')
			->add('Text', 'textarea')
			->getForm();
			
		$request = $this->get('request');

		if ($request->isMethod('POST')) {
			$form->bind($request);
			
			$data = $form->getData();
			$repo = $this->getDoctrine()->getManager()->getRepository('FtmPlayerBundle:Player');
			$playerList = $repo->findByAdmin(0);
		
			foreach($playerList as $player)
			{	
					$mailer = $this->get('mailer');
				try{
					$message = \Swift_Message::newInstance()
					->setCharset('iso-8859-2')
				  	->setSubject('MarshmaNews!')
				  	->setFrom('staff@ftmarshmallow.com')
				  	->setTo($player->getEmail())
				  	->setBody($this->renderView('FtmPlayerBundle:Player:news.txt.twig', array('name' => $player->getUsername(),
																								'title'=>$data['Title'], 
																								'text'=>$data['Text'])));

						$mailer->send($message);
					}
				catch(Exception $e){
						pass;
					}
			}
			
		}
		
		return $this->render('FtmPlayerBundle:Player:mailer.html.twig', array('form'=>$form->createView()));
		
	}
	
	public function getWlNbAction()
	{
		$repository = $this->getDoctrine()
						   ->getManager()
						   ->getRepository('FtmPlayerBundle:Player');
						   
		return $this->render("FtmPlayerBundle:Moderation:number.html.twig", array('number'=>$repository->getCount()));
	}
	
	public function deletePlayerAction($id)
	{
		if (false === $this->get('security.context')->isGranted('ROLE_ADMIN')) {
        	throw new AccessDeniedException();
    	}
		$repo = $this->getDoctrine()->getManager()->getRepository("FtmPlayerBundle:Player");

		$player = $repo->findOneById($id);			
		
		$em = $this->getDoctrine()->getManager();
		$em->remove($player);
		$em->flush();
		
		return $this->redirect($this->generateUrl('ftm_player_whitelist'));
	}
}

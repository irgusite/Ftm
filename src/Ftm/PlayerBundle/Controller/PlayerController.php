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
		
		$player = new Inscription;
		
		$formBuilder = $this->createFormBuilder($player);
		$er = $this->getDoctrine()
					 ->getManager()
					 ->getRepository('FtmPlayerBundle:Inscription');
		
		$formBuilder
				->add('pseudo',        'text')
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
			$player->setPremod(($player->getAge()<15?true:false));
			$player->setUniqid($uniqid);
			$repo->persist($player);
			$repo->flush();
			$validation = true;
			return $this->render('FtmPlayerBundle:Default:form.html.twig', array('valid'=>$validation, 'demand'=>$demand, 'form' => $form->createView()));
		  }
		}
		
        return $this->render('FtmPlayerBundle:Default:form.html.twig', array('valid'=>$validation, 'demand'=>$demand, 'form' => $form->createView(),));
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
				->add('password',     'password')
				->add('age',      'integer');
		$form = $formBuilder->getForm();
		
		$request = $this->get('request');
		
		if ($request->getMethod() == 'POST') {// Si on valide le formulaire
		 
		  $form->bind($request);//on lie les reponses
		  
		  if ($form->isValid()) 
		  {
			$repo = $this->getDoctrine()->getManager();//on prepare le manager a manager l'entité
			
			//on crypte le mot de passe
			$encoder = $factory->getEncoder($player);
			$player->setSalt($salt);//on cree le salt
			$password = $encoder->encodePassword($player->getPassword(), $player->getSalt());
			$player->setPassword($password);
			
			$repo->persist($player);
			$repo->flush();
			$validation = true;
		  }
		}
		
        return $this->render('FtmPlayerBundle:Player:info.html.twig', array('valid'=>$validation, 'form' => $form->createView(), 'username'=>$player->getUsername()));
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
	
	public function generatePassAction()
	{
		$repository = $this->getDoctrine()
						   ->getManager()
						   ->getRepository('FtmPlayerBundle:Player');
		
		$withoutPass = $repository->findByUsername('IamAdena');
		
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
			  ->setBody($this->renderView('FtmPlayerBundle:Moderation:accept.txt.twig', array('name' => $player->getUsername(), 'password'=>$passwordUncrypt)));

			$mailer->send($message);
			
			$repo->persist($player);
			$repo->flush();
		}
	}
}

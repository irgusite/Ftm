<?php

namespace Ftm\PlayerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Ftm\PlayerBundle\Entity\Inscription;
use Ftm\PlayerBundle\Entity\Player;

class ModerationController extends Controller
{

    public function acceptAction($accept, $uniqid)
    {
		$player= new Player;
		$salt = md5(microtime().rand());
		$roles = array('ROLE_PLAYER');
		$factory = $this->get('security.encoder_factory');
		$passwordUncrypt = uniqid();
		$notfound=false;
		
		
		$repository = $this->getDoctrine()
						   ->getManager()
						   ->getRepository('FtmPlayerBundle:Inscription');

		$repositoryPlayer = $this->getDoctrine()
						   ->getManager()
						   ->getRepository('FtmPlayerBundle:Player');
		   
		$em =$this->getDoctrine()->getManager();

		$inscription = $repository->findOneByUniqid($uniqid);


		if($inscription == null)
		{
			$this->get('session')->getFlashBag()->add('error','Clé inconnue! Demande à irgu et envoie le lien de confirmation avec'); 
		}
		elseif($accept=='0')
		{
			$inscription->setPremod(1);
			$mailer = $this->get('mailer');

			$message = \Swift_Message::newInstance()
			  ->setSubject('Inscription FTM!')
			  ->setFrom('staff@ftmarshmallow.com')
			  ->setTo($inscription->getEmail())
			  ->setBody($this->renderView('FtmPlayerBundle:Moderation:refuse.txt.twig', array('name' => $inscription->getPseudo())));

			$mailer->send($message);
			
			$em->persist($inscription);
			$em->flush();
			
		}
		elseif($accept=='1' && $repositoryPlayer->member($inscription->getPseudo())){
			$player = $repositoryPlayer->findOneByUsername($inscription->getPseudo());
			if($inscription->getServer()==1)
				$player->setServer(3);
			else
				$player->setServer(1);

			$em->remove($inscription);
			$em->persist($player);
			$em->flush();
		}
		else
		{
			//get user uuid
			$content = file_get_contents('https://api.mojang.com/users/profiles/minecraft/'.urlencode($inscription->getPseudo()).'?at='.time() );
			// Decode it
			$json = json_decode($content);

			// Check for error
			if (empty($json->error) && !empty($json->id)&& !empty($json->name)) {

			    $uuid = $json->id;
				$player->setUuid($uuid);
			}
			
			$player->setUsername($inscription->getPseudo())
				   ->setEmail($inscription->getEmail())
				   ->setAdmin(false)
				   ->setRoles($roles)
				   ->setConnected(0)
				   ->setServer($inscription->getServer())
				   ->setAge($inscription->getAge());

			$content = file_get_contents('https://api.mojang.com/users/profiles/minecraft/'.urlencode($player->getUsername()).'?at='.time() );
			// Decode it
			$json = json_decode($content);

			// Check for error
			if (empty($json->error) && !empty($json->id)&& !empty($json->name)) {
			    $uuid = $json->id;
				$player->setUuid($uuid);
				//$player->setUsername($json->name);
				
				//$repo->persist($player);
				//$repo->flush();
			}
			else
				$player->setUuid('0');

			//check if password has been defined
			if($inscription->getSalt() == '0' || $inscription->getPassword() == '0'){
				$encoder = $factory->getEncoder($player);
				$password = $encoder->encodePassword($passwordUncrypt, $player->getSalt());
				$player->setSalt($salt)
					   ->setPassword($password);
			}
			else{
				$player->setSalt($inscription->getSalt())
					   ->setPassword($inscription->getPassword());
			}
				   
			$em->remove($inscription);
				   
			$em->persist($player);
			$em->flush();
			
			//Mail:
			$mailer = $this->get('mailer');
			if($player->getServer() == 3){
				$message = \Swift_Message::newInstance()
				  ->setSubject('Salut Marshmallow!')
				  ->setFrom('staff@ftmarshmallow.com')
				  ->setTo($player->getEmail())
				  ->setBody($this->renderView('FtmPlayerBundle:Moderation:accept.html.twig', array('name' => $player->getUsername(), 'password'=>$passwordUncrypt)),'text/html');
			}
			else{
				$message = \Swift_Message::newInstance()
				  ->setSubject('Salut Marshmallow!')
				  ->setFrom('staff@ftmarshmallow.com')
				  ->setTo($player->getEmail())
				  ->setBody($this->renderView('FtmPlayerBundle:Moderation:accept.html.twig', array('name' => $player->getUsername(), 'password'=>$passwordUncrypt)),'text/html');
			}

			$mailer->send($message);
			self::generateWL();
		}
		//return $this->render("FtmPlayerBundle:Moderation:list.html.twig", array('notfound'=>$notfound));
		return $this->redirect($this->generateUrl('ftm_admin_list_demands'));
		//return new Response($player->getEmail().':'.$passwordUncrypt);
    }
	
	public function listAction()
	{
		$repository = $this->getDoctrine()
		   ->getManager()
		   ->getRepository('FtmPlayerBundle:Inscription');
		   
		$inscritListCDM = $repository->findBy(array('premod'=>0, 'server'=>1));
		$inscritList = $repository->findBy(array('premod'=>0,  'server'=>0));
		$refus = $repository->findBy(array('premod'=>1));
		$nbRefus = $repository->getIgnoredCount();
		
		return $this->render("FtmPlayerBundle:Moderation:list.html.twig", array('liste'=>$inscritList, 'listeCDM'=>$inscritListCDM, 'refus'=>$refus, 'notfound'=>false, 'nbRefus'=>$nbRefus));
	}
	
	public function whitelistAction()
	{
		$repository = $this->getDoctrine()
		   ->getManager()
		   ->getRepository('FtmPlayerBundle:Player');
		   
		$inscritList = $repository->findBy(array(), array("username"=>"asc"));
		$inscritListCDM = $repository->findBy(array('server'=>3), array("username"=>"asc"));
		
		return $this->render("FtmPlayerBundle:Moderation:whitelist.html.twig", array('liste'=>$inscritList, 'listeCDM'=>$inscritListCDM, 'notfound'=>false));
	}

	public function listAjaxAction()
	{
		$repository = $this->getDoctrine()
		   ->getManager()
		   ->getRepository('FtmPlayerBundle:Inscription');
		   
		$inscritListCDM = $repository->findBy(array('premod'=>0, 'server'=>1));
		$inscritList = $repository->findBy(array('premod'=>0,  'server'=>0));
		$refus = $repository->findBy(array('premod'=>1));
		$nbRefus = $repository->getIgnoredCount();

		$response = new JsonResponse();
    	$response->setData(array(
    		'CDMList' => $inscritListCDM,
    		'VanillaList' => $inscritList,
    		'refusList' => $refus,
    		));
    	return $response;
		
		return $this->render("FtmPlayerBundle:Moderation:whitelist.html.twig", array('liste'=>$inscritList, 'listeCDM'=>$inscritListCDM, 'notfound'=>false));
	}
	
	public function generateWL()
	{
		$repository = $this->getDoctrine()
						   ->getManager()
						   ->getRepository('FtmPlayerBundle:Player');
		
		$withoutPass = $repository->findAll();
		$fichier = "white-list.txt";
		//on efface l'ancien fichier
		unlink($this->get('kernel')->getRootDir() . '/../web/'.$fichier);
		//on ouvre le nouveau
		$whitelist = fopen($this->get('kernel')->getRootDir() . '/../web/'.$fichier, 'a+');
		
		//on ajoute les utilisateurs de la base sur une nouvelle ligne a chaque fois.
		foreach($withoutPass as $player)
		{
			fputs($whitelist, strtolower($player->getUsername())."\n");
		}
		fclose($whitelist);

	}
	
	public function uploadWLAction()
	{
			self::generateWL();
			/* $ch = curl_init();
			$fichier = "white-list.txt";
			$localfile = $this->get('kernel')->getRootDir() . '/../web/'.$fichier;
			$fp = fopen($localfile, 'r');
			curl_setopt($ch, CURLOPT_UPLOAD, 1);
			curl_setopt($ch, CURLOPT_INFILE, $fp);
			curl_setopt($ch, CURLOPT_INFILESIZE, filesize($localfile));
			curl_exec ($ch);
			$error_no = curl_errno($ch);
			curl_close ($ch);
			if ($error_no == 0) {
				$this->get('session')->getFlashBag()->add('success','White-list mise a jour sur le serveur play1'); 
			} else {
				$this->get('session')->getFlashBag()->add('error','Une erreur est survenue lors de l\'upload de la white-list sur play1'); 
			}
			 */
			$ch = curl_init();
			$fichier = "white-list.txt";
			$localfile = $this->get('kernel')->getRootDir() . '/../web/'.$fichier;
			$fp = fopen($localfile, 'r');
			curl_setopt($ch, CURLOPT_UPLOAD, 1);
			curl_setopt($ch, CURLOPT_INFILE, $fp);
			curl_setopt($ch, CURLOPT_INFILESIZE, filesize($localfile));
			curl_exec ($ch);
			$error_no = curl_errno($ch);
			curl_close ($ch);
				if ($error_no == 0) {
					$this->get('session')->getFlashBag()->add('success','White-list mise a jour sur le serveur play2'); 
				} else {
					$this->get('session')->getFlashBag()->add('error','Une erreur est survenue lors de l\'upload de la white-list sur play2'); 
				}
			
			
			return $this->redirect($this->generateUrl('ftm_player_whitelist'));
	}
	
	public function getInscriptionNBAction()
	{
		$repository = $this->getDoctrine()
						   ->getManager()
						   ->getRepository('FtmPlayerBundle:Inscription');
						   
		return $this->render("FtmPlayerBundle:Moderation:number.html.twig", array('number'=>$repository->getNewCount()));
	}
}
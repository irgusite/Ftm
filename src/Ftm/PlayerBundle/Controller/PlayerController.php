<?php

namespace Ftm\PlayerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ftm\PlayerBundle\Entity\Inscription;

class PlayerController extends Controller
{
    public function inscriptionAction()
    {
		$repo = $this->getDoctrine()->getManager();
		
		$uniqid = md5("radnomshit");//random md5 key
		$validation="reussi";
		
		$player = new Inscription;
		$player->setPseudo("irgusite");
		$player->setAge(21)
			   ->setEmail("toto")
			   ->setUniqid($uniqid)
			   ->setPremod(false)
			   ->setMotivation("blabla");
			   
		$repo->persist($player);
		$repo->flush();
		
        return $this->render('FtmPlayerBundle:Default:form.html.twig', array('validation'=>$validation));
    }
}

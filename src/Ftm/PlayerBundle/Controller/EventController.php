<?php

namespace Ftm\PlayerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ftm\PlayerBundle\Entity\Instance;

class EventController extends Controller
{
    public function viewAction()
    {	
    	$instance = new Instance();

    	$liste_instance = null;
    	$liste_map = null;
    	exec("ls /home/instances", $liste_instance);
    	exec("ls /home/maps", $liste_map);

    	$form = $this->createFormBuilder($instance)
    			->add('version', 'choice', array('choices' =>$liste_instance))
    			->add('map', 'choice', array('choices'=>$liste_map))
    			->getForm();

    	$request = $this->get('request');
		
		if ($request->getMethod() == 'POST') {// Si on valide le formulaire
		 
		  $form->bind($request);//on lie les reponses
		  
		  	if ($form->isValid()){
    			exec("echo '".$liste_instance[$instance->getVersion()].":".$liste_map[$instance->getMap()]."' >> /home/event_do_not_touch/out.txt");
    		}
		}
    

        return $this->render('FtmPlayerBundle:Event:create.html.twig', array('list_maps'=>$liste_map, 'form'=> $form->createView(),));
    }

    public function createAction()
    {
    	return $this->render();
    }
}

<?php

namespace Ftm\MinecraftBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

use Ftm\PlayerBundle\Entity\Instance;

class MainController extends Controller
{
    public function serverControllAction()
    {
    	exec("sudo /etc/init.d/ftm status", $etatMod);
    	exec("sudo /etc/init.d/minecraft status", $etatVanilla);
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

        return $this->render('FtmMinecraftBundle:Main:serverControll.html.twig', array(
                'etatMod'=>$etatMod[1],
                'etatVanilla'=>$etatVanilla[1],
                'form'=>$form->createView(),
            ));    
    }

    public function ajaxCommandAction()
    {
    	$request = $this->get('request');
    	$server = $request->request->get('server');
    	$command = $request->request->get('action');

    	// extract "minecraft a demarre" or has stopped etc to return execution state
    	// change time before killing minecraft server back to 2 minutes, to long to stay on a page on probleme
    	if($server == 'minecraft' || $server == 'ftm'){
    		exec("sudo /etc/init.d/".$server." ".$command, $servResponse);
    	}

    	$response = new JsonResponse();
    	$response->setData(array(
    		'serverStatus' => $servResponse[1],
    		'server' => $server,
    		));
    	return $response;
    }

}

<?php

namespace Ftm\MinecraftBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

use Ftm\PlayerBundle\Entity\Instance;
use Ftm\PlayerBundle\Entity\Player;

class MainController extends Controller
{
    public function serverControllAction()
    {
        $servers = array("ftm1", "minecraft", "cite");
        $serverNames = array("Moddé", "Vanilla", "Cité");
        $serverStates = array();
        $serverBackups = array();

        $server1 = 'ftm1';
        $server2 = 'minecraft';

        $etatMod = '';
        $etatVanilla = '';
/*
        $count=0;
        foreach ($servers as $server) {
            //Status check
            exec("sudo /etc/init.d/".$server." status", $etat);
            $i=0;
            while(strstr($etat[$i], 'java')||strstr($etat[$i], 'jar')){
                $i++;
            }
            $serverStates[$server] = $etat[$i];

            //Backups Check
            exec("ls /home/backups/maps/".$server, $serverBackups[$server]);
            sort($serverBackups[$server]);

        }//*/

    	//*
        exec("sudo /etc/init.d/".$server1." status", $etatMod);
    	exec("sudo /etc/init.d/".$server2." status", $etatVanilla);
    	$instance = new Instance();

        $i=0;
        while(strstr($etatMod[$i], 'java')||strstr($etatMod[$i], 'jar')){
            $i++;
        }
        $etatMod = $etatMod[$i];

        $i=0;
        while(strstr($etatVanilla[$i], 'java')||strstr($etatVanilla[$i], 'jar')){
            $i++;
        }
        $etatVanilla = $etatVanilla[$i];

		$liste_instance = null;
    	$liste_map = null;
        $liste_saves = null;
    	exec("ls /home/instances", $liste_instance);
    	exec("ls /home/maps", $liste_map);
        exec("ls /home/backups/maps/cite", $liste_saves);
        //exec("ls /home/backups/maps/cite", $liste_saves);
        sort($liste_saves);
        array_reverse($liste_saves);

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
//*/
        return $this->render('FtmMinecraftBundle:Main:serverControll.html.twig', array(
                'servers'=>$servers,
                'serverState'=>$serverStates,
                'etatMod'=>$etatMod,
                'etatVanilla'=>$etatVanilla,
                'form'=>$form->createView(),
                'saves'=>$liste_saves,
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

    public function outerControllAction($server, $action, $apikey){
        $repo =$this->getDoctrine()->getManager()->getRepository('FtmPlayerBundle:Player');
        $user = new Player;
        $user = $repo->findOneByApi($apikey);
        if (in_array("ROLE_ADMIN", $user->getRoles())){
            if($server == 'minecraft' || $server == 'ftm'){
            exec("sudo /etc/init.d/".$server." ".$action, $servResponse);

            $response = new JsonResponse();
            $response->setData(array(
                'serverStatus' => $servResponse[1],
                'server' => $server,
                ));
            return $response;
        }
        }
    }

}

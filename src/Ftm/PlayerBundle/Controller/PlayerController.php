<?php

namespace Ftm\PlayerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ftm\PlayerBundle\Entity\Inscription;

class PlayerController extends Controller
{
    public function inscriptionAction()
    {		
		$uniqid = md5(microtime().rand());
		$validation=false;
		
		$player = new Inscription;
		$formBuilder = $this->createFormBuilder($player);
		
		$formBuilder
				->add('pseudo',        'text')
				->add('email',       'text')
				->add('motivation',     'textarea')
				->add('age',      'birthday');
		$form = $formBuilder->getForm();

		$request = $this->get('request');
	
		if ($request->getMethod() == 'POST') {
		 
		  $form->bind($request);
		  
		  if ($form->isValid()) {
			
			$repo = $this->getDoctrine()->getManager();
			$repo->persist($player);
			$repo->flush();
			$validation = true;
			return $this->render('FtmPlayerBundle:Default:form.html.twig', array('valid'=>$validation, 'form' => $form->createView(),));
		  }
		}
		
        return $this->render('FtmPlayerBundle:Default:form.html.twig', array('valid'=>$validation, 'form' => $form->createView(),));
    }
}

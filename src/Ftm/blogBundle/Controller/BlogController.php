<?php

// src/Sdz/BlogBundle/Controller/BlogController.php

namespace Ftm\blogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
  public function indexAction()
  {
	//Get latest news from DB and put them in the news array
	
    return $this->render("FtmblogBundle:Blog:index.html.twig", array('blabla' => 'blabla'));
  }
  public function messagesAction()
  {
	$messages=array();
	
	return $this->render("FtmblogBundle:Blog:messages.html.twig", $messages);
  }
  public function addStargateAction()
  {
		$validation=false;
		
		$player = new Inscription;
		$formBuilder = $this->createFormBuilder($player);
		
		$formBuilder
				->add('location',        'text')
				->add('adress',      'text');
		$form = $formBuilder->getForm();

		$request = $this->get('request');
	
		if ($request->getMethod() == 'POST') {
		 
		  $form->bind($request);
		  
		  if ($form->isValid()) {
			
			$repo = $this->getDoctrine()->getManager();
			$repo->persist($player);
			$repo->flush();
			$validation = true;
			return $this->render('FtmblogBundle:Page:stargate.html.twig', array('valid'=>$validation, 'form' => $form->createView(),));
		  }
		}
		
        return $this->render('FtmPlayerBundle:Default:form.html.twig', array('valid'=>$validation, 'form' => $form->createView(),));
  }
}
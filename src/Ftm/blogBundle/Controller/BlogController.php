<?php

// src/Sdz/BlogBundle/Controller/BlogController.php

namespace Ftm\blogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Ftm\blogBundle\Entity\News;
use Ftm\blogBundle\Form\NewsType;

class BlogController extends Controller
{
  public function indexAction()
  {
    $repository = $this->getDoctrine()
       ->getManager()
       ->getRepository('FtmblogBundle:News');
       
    $newsList = $repository->findLastNews();
	
    return $this->render("FtmblogBundle:Blog:index.html.twig", array('News' => $newsList));
  }

  public function addNewsAction()
  {
	$article = new News;
	$form = $this->createForm(new NewsType, $article);
	
	$request = $this->get('request');
	if ($request->getMethod() == 'POST') {
		$form->bind($request);
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($article);
			$em->flush();
			$this->get('session')->getFlashBag()->add('success', 'La news a été ajoutée');
			return $this->redirect($this->generateUrl('ftm_home'));
		}
	}
			
	return $this->render('FtmblogBundle:Blog:addNews.html.twig', array('form' => $form->createView(),));
  }
  
  public function messagesAction()
  {
	$messages=array();
	
	return $this->render("FtmblogBundle:Blog:messages.html.twig", $messages);
  }
}

<?php

// src/Sdz/BlogBundle/Controller/BlogController.php

namespace Ftm\blogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Ftm\blogBundle\Entity\News;

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

  }
  
  public function messagesAction()
  {
	$messages=array();
	
	return $this->render("FtmblogBundle:Blog:messages.html.twig", $messages);
  }
}

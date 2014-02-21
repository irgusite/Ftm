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
}
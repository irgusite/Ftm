<?php


namespace Ftm\blogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
  public function ircAction()
  {
	//Get latest news from DB and put them in the news array
	$pseudo = null;
	$adressIrc = 'irc://irc.esper.net:5555';
	//complete pseudo with logged user if logged
    return $this->render("FtmblogBundle:Page:irc.html.twig", array('pseudo'=>$pseudo, 'irc'=>$adressIrc));
  }
  public function mumbleAction()
  {
	$adressMumble = 'mumble.ftmarshmallow.com';
	return $this->render("FtmblogBundle:Page:mumble.html.twig", array('mumble'=>$adressMumble));
  }
  
  public function serverAction()
  {
	$adressMinecraft1 = 'play.ftmarshmallow.com:10395';
	$adressMinecraft2 = 'play2.ftmarshmallow.com:10395';
	
	return $this->render("FtmblogBundle:Page:server.html.twig", array('play1'=>$adressMinecraft1, 'play2'=>$adressMinecraft2));
  }
  
  public function contactAction()
  {
	return $this->render("FtmblogBundle:Page:contact.html.twig");
  }
  
  public function stargateAction()
  {
	return $this->render("FtmblogBundle:Page:stargate.html.twig");
  }
}
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
	$adressMumble = 'ts.ftmarshmallow.com';
	return $this->render("FtmblogBundle:Page:mumble.html.twig", array('mumble'=>$adressMumble));
  }
  
  public function serverAction()
  {
	$adressMinecraft1 = 'event.ftmarshmallow.com';
	$adressMinecraft2 = 'play2.ftmarshmallow.com';
	
	return $this->render("FtmblogBundle:Page:server.html.twig", array('play1'=>$adressMinecraft1, 'play2'=>$adressMinecraft2));
  }
  
  public function contactAction()
  {
	return $this->render("FtmblogBundle:Page:contact.html.twig");
  }
  
  public function stargateAction($format)
  {
	$repository = $this->getDoctrine()
		   ->getManager()
		   ->getRepository('FtmblogBundle:stargate');
		   
	$listePortes=$repository->findAll();
	
	return $this->render("FtmblogBundle:Page:stargate.".$format.".twig", array('portes'=>$listePortes));
  }
  public function downloadAction()
  {
	return $this->render("FtmblogBundle:Page:download.html.twig");
  }
  
  public function dynmapAction()
  {
	return $this->render("FtmblogBundle:Page:dynmap.html.twig");
  }
  
  public function dlFichierAction($name)
  {
	$fichier = $name;
		$chemin = "http://ftmarshmallow.com/files/"; // emplacement de votre fichier .pdf
			 
		$response = new Response();
		$response->setContent(file_get_contents($chemin.$fichier));
		$response->headers->set('Content-Type', 'application/force-download'); // modification du content-type pour forcer le téléchargement (sinon le navigateur internet essaie d'afficher le document)
		$response->headers->set('Content-disposition', 'filename='. $fichier);
			 
		return $response; 
  }
}
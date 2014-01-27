<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // ftm_moderate_player
        if (0 === strpos($pathinfo, '/moderate/accept') && preg_match('#^/moderate/accept/(?P<uniqid>[a-z0-9]{32})$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ftm_moderate_player')), array (  '_controller' => 'Ftm\\PlayerBundle\\Controller\\ModerationController::acceptAction',));
        }

        // ftm_inscription
        if ($pathinfo === '/inscription') {
            return array (  '_controller' => 'Ftm\\PlayerBundle\\Controller\\PlayerController::inscriptionAction',  '_route' => 'ftm_inscription',);
        }

        // ftm_home
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'ftm_home');
            }

            return array (  '_controller' => 'Ftm\\blogBundle\\Controller\\BlogController::indexAction',  '_route' => 'ftm_home',);
        }

        // ftm_irc
        if ($pathinfo === '/irc') {
            return array (  '_controller' => 'Ftm\\blogBundle\\Controller\\PageController::ircAction',  '_route' => 'ftm_irc',);
        }

        // ftm_mumble
        if ($pathinfo === '/mumble') {
            return array (  '_controller' => 'Ftm\\blogBundle\\Controller\\PageController::mumbleAction',  '_route' => 'ftm_mumble',);
        }

        // ftm_server
        if ($pathinfo === '/server') {
            return array (  '_controller' => 'Ftm\\blogBundle\\Controller\\PageController::serverAction',  '_route' => 'ftm_server',);
        }

        // ftm_contact
        if ($pathinfo === '/contact') {
            return array (  '_controller' => 'Ftm\\blogBundle\\Controller\\PageController::contactAction',  '_route' => 'ftm_contact',);
        }

        // ftm_stargate
        if ($pathinfo === '/stargate') {
            return array (  '_controller' => 'Ftm\\blogBundle\\Controller\\PageController::stargateAction',  '_route' => 'ftm_stargate',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}

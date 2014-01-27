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

        // ftm_player_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'ftm_player_homepage');
            }

            return array (  '_controller' => 'Ftm\\PlayerBundle\\Controller\\DefaultController::indexAction',  '_route' => 'ftm_player_homepage',);
        }

        // ftm_moderate_player
        if (0 === strpos($pathinfo, '/moderate/accept') && preg_match('#^/moderate/accept/(?P<uniqid>[a-z0-9]{32})$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ftm_moderate_player')), array (  '_controller' => 'Ftm\\PlayerBundle\\Controller\\ModerationController::acceptAction',));
        }

        // FTMHelloWorld
        if ($pathinfo === '/hello-world') {
            return array (  '_controller' => 'Ftm\\blogBundle\\Controller\\BlogController::indexAction',  '_route' => 'FTMHelloWorld',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}

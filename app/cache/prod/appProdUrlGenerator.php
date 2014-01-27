<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appProdUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRoutes = array(
        'ftm_moderate_player' => array (  0 =>   array (    0 => 'uniqid',  ),  1 =>   array (    '_controller' => 'Ftm\\PlayerBundle\\Controller\\ModerationController::acceptAction',  ),  2 =>   array (    'uniqid' => '[a-z0-9]{32}',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[a-z0-9]{32}',      3 => 'uniqid',    ),    1 =>     array (      0 => 'text',      1 => '/moderate/accept',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'ftm_inscription' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Ftm\\PlayerBundle\\Controller\\PlayerController::inscriptionAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/inscription',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'ftm_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Ftm\\blogBundle\\Controller\\BlogController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'ftm_irc' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Ftm\\blogBundle\\Controller\\PageController::ircAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/irc',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'ftm_mumble' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Ftm\\blogBundle\\Controller\\PageController::mumbleAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/mumble',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'ftm_server' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Ftm\\blogBundle\\Controller\\PageController::serverAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/server',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'ftm_contact' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Ftm\\blogBundle\\Controller\\PageController::contactAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/contact',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'ftm_stargate' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Ftm\\blogBundle\\Controller\\PageController::stargateAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/stargate',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}

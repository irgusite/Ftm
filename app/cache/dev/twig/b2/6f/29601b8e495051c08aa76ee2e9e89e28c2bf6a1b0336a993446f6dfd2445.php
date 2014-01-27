<?php

/* ::base.html.twig */
class __TwigTemplate_b26f29601b8e495051c08aa76ee2e9e89e28c2bf6a1b0336a993446f6dfd2445 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'topContainer' => array($this, 'block_topContainer'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
\t <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t
    ";
        // line 8
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 18
        echo "  </head>
  
  
    <body>
\t\t <div class=\"navbar navbar-inverse navbar-fixed-top\">
      <div class=\"navbar-inner\">
        <div class=\"container\">
          <button type=\"button\" class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".nav-collapse\">
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
          </button>
          <a class=\"brand\" href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("ftm_home");
        echo "\">Feed The marshmallow</a>
          <div class=\"nav-collapse collapse\">
            <ul class=\"nav\">
              <li class=\"active\"><a href=\"";
        // line 33
        echo $this->env->getExtension('routing')->getPath("ftm_home");
        echo "\">Home</a></li>
              <li><a href=\"";
        // line 34
        echo $this->env->getExtension('routing')->getPath("ftm_inscription");
        echo "\">Inscription</a></li>
              <li><a href=\"";
        // line 35
        echo $this->env->getExtension('routing')->getPath("ftm_contact");
        echo "\">Contact</a></li>
              <li class=\"dropdown\">
                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Serveurs <b class=\"caret\"></b></a>
                <ul class=\"dropdown-menu\">
                  <li><a href=\"";
        // line 39
        echo $this->env->getExtension('routing')->getPath("ftm_server");
        echo "\">Minecraft</a></li>
                  <li><a href=\"";
        // line 40
        echo $this->env->getExtension('routing')->getPath("ftm_irc");
        echo "\">IRC</a></li>
                  <li><a href=\"";
        // line 41
        echo $this->env->getExtension('routing')->getPath("ftm_mumble");
        echo "\">Mumble</a></li>
                  <li class=\"divider\"></li>
                  <li class=\"nav-header\">Modpack</li>
                  <li><a href=\"#\">Les mods</a></li>
                </ul>
              </li>
\t\t\t  <li class=\"dropdown\">
                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Membres <b class=\"caret\"></b></a>
                <ul class=\"dropdown-menu\">
                  <li><a href=\"\">T&eacute;l&eacute;chargements</a></li>
                  <li><a href=\"\">Soartex ressource pack</a></li>
                  <li class=\"divider\"></li>
                  <li class=\"nav-header\">Utilisateur</li>
\t\t\t\t  ";
        // line 54
        if ((1 < 2)) {
            // line 55
            echo "                  <li><a href=\"#\">Mes infos</a></li>
\t\t\t\t  ";
        }
        // line 57
        echo "                </ul>
              </li>
            </ul>
            <form class=\"navbar-form pull-right\">
              <input class=\"span2\" type=\"text\" placeholder=\"Email\">
              <input class=\"span2\" type=\"password\" placeholder=\"Password\">
              <button type=\"submit\" class=\"btn\">Sign in</button>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
\t
\t<div class=\"container\">
\t\t";
        // line 71
        $this->displayBlock('topContainer', $context, $blocks);
        // line 73
        echo "\t\t<div class=\"row\">\t
\t\t\t<div id=\"content\" class=\"span9\">
\t\t\t\t";
        // line 75
        $this->displayBlock('body', $context, $blocks);
        // line 77
        echo "\t\t\t</div>
\t\t</div>
\t\t<hr>
\t\t<footer>
\t\t\t<p>ftmarshmallow.com © 2014.</p>
\t\t</footer>
    </div>
  ";
        // line 84
        $this->displayBlock('javascripts', $context, $blocks);
        // line 88
        echo "  </body>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "Feed the Marshmallow";
    }

    // line 8
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 9
        echo "      <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\" type=\"text/css\" />
\t  <style type=\"text/css\">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
      <link rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap-responsive.css"), "html", null, true);
        echo "\" type=\"text/css\" />
    ";
    }

    // line 71
    public function block_topContainer($context, array $blocks = array())
    {
        // line 72
        echo "\t\t";
    }

    // line 75
    public function block_body($context, array $blocks = array())
    {
        // line 76
        echo "\t\t\t\t";
    }

    // line 84
    public function block_javascripts($context, array $blocks = array())
    {
        // line 85
        echo "    <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
  ";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  190 => 86,  187 => 85,  184 => 84,  180 => 76,  177 => 75,  173 => 72,  170 => 71,  164 => 16,  153 => 9,  150 => 8,  144 => 6,  138 => 88,  136 => 84,  127 => 77,  125 => 75,  121 => 73,  119 => 71,  103 => 57,  99 => 55,  97 => 54,  81 => 41,  77 => 40,  73 => 39,  66 => 35,  62 => 34,  58 => 33,  52 => 30,  38 => 18,  36 => 8,  31 => 6,  24 => 1,);
    }
}

<?php

/* ::base.html.twig */
class __TwigTemplate_a9ca69febfa818feea327b7554628f2bfd8c876b4b351524b7341cf5e8741376 extends Twig_Template
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
\t\t\t\t  <li><a href=\"";
        // line 45
        echo $this->env->getExtension('routing')->getPath("ftm_stargate");
        echo "\">Les adresse stargate</a></li>
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
        // line 55
        if ((1 < 2)) {
            // line 56
            echo "                  <li><a href=\"#\">Mes infos</a></li>
\t\t\t\t  ";
        }
        // line 58
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
        // line 72
        $this->displayBlock('topContainer', $context, $blocks);
        // line 74
        echo "\t\t<div class=\"row\">\t
\t\t\t<div id=\"content\" class=\"span9\">
\t\t\t\t";
        // line 76
        $this->displayBlock('body', $context, $blocks);
        // line 78
        echo "\t\t\t</div>
\t\t</div>
\t\t<hr>
\t\t<footer>
\t\t\t<p>ftmarshmallow.com © 2014.</p>
\t\t</footer>
    </div>
  ";
        // line 85
        $this->displayBlock('javascripts', $context, $blocks);
        // line 89
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

    // line 72
    public function block_topContainer($context, array $blocks = array())
    {
        // line 73
        echo "\t\t";
    }

    // line 76
    public function block_body($context, array $blocks = array())
    {
        // line 77
        echo "\t\t\t\t";
    }

    // line 85
    public function block_javascripts($context, array $blocks = array())
    {
        // line 86
        echo "    <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 87
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
        return array (  194 => 87,  191 => 86,  188 => 85,  184 => 77,  181 => 76,  177 => 73,  174 => 72,  168 => 16,  157 => 9,  154 => 8,  148 => 6,  142 => 89,  140 => 85,  131 => 78,  129 => 76,  125 => 74,  123 => 72,  107 => 58,  103 => 56,  101 => 55,  88 => 45,  81 => 41,  77 => 40,  73 => 39,  66 => 35,  62 => 34,  58 => 33,  52 => 30,  36 => 8,  31 => 6,  24 => 1,  56 => 16,  53 => 15,  46 => 11,  41 => 8,  38 => 18,  33 => 4,  30 => 3,);
    }
}

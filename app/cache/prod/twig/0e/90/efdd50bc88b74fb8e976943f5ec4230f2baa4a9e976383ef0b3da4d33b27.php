<?php

/* FtmblogBundle:Page:irc.html.twig */
class __TwigTemplate_0e90efdd50bc88b74fb8e976943f5ec4230f2baa4a9e976383ef0b3da4d33b27 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'topContainer' => array($this, 'block_topContainer'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "Feed the Marshmallow
";
    }

    // line 7
    public function block_topContainer($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"hero-unit\">
\t<h1>Salut Marhsmallow!</h1>
\t<p>Bienvenue sur le site du serveur Feed the Marshmallow! Le serveur est accessible sur inscription.</p>
\t<p><a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("ftm_inscription");
        echo "\" class=\"btn btn-primary btn-large\">S'inscrire &raquo;</a></p>
</div>
";
    }

    // line 15
    public function block_body($context, array $blocks = array())
    {
        // line 16
        echo "<h2>Chat IRC</h2>
<p>adresse du serveur irc: <a href=\"";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["irc"]) ? $context["irc"] : null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["irc"]) ? $context["irc"] : null), "html", null, true);
        echo "</a></p>
<iframe src=\"http://webchat.esper.net/?";
        // line 18
        if (((isset($context["pseudo"]) ? $context["pseudo"] : null) != null)) {
            echo "nick=";
            echo twig_escape_filter($this->env, (isset($context["pseudo"]) ? $context["pseudo"] : null), "html", null, true);
            echo "&";
        }
        echo "channels=ftmarshmallow&prompt=1\" width=\"647\" height=\"400\"></iframe>
";
    }

    public function getTemplateName()
    {
        return "FtmblogBundle:Page:irc.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 18,  59 => 17,  56 => 16,  53 => 15,  46 => 11,  41 => 8,  38 => 7,  33 => 4,  30 => 3,);
    }
}

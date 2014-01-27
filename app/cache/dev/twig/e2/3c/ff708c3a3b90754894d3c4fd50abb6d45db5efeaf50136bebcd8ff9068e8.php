<?php

/* FtmblogBundle:Blog:index.html.twig */
class __TwigTemplate_e23cff708c3a3b90754894d3c4fd50abb6d45db5efeaf50136bebcd8ff9068e8 extends Twig_Template
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
        <h1>Salut Marhsmallow!</h1>
        <p>Bienvenue sur le site du serveur Feed the Marshmallow! Le serveur est accessible sur inscription.</p>
        <p><a href=\"";
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
        echo "<h2>News du serveur</h2>
<p> Site en developpement.</p>
<p>Modpack 1.6.4 disponible</p>
";
    }

    public function getTemplateName()
    {
        return "FtmblogBundle:Blog:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 16,  53 => 15,  46 => 11,  41 => 8,  38 => 7,  33 => 4,  30 => 3,);
    }
}

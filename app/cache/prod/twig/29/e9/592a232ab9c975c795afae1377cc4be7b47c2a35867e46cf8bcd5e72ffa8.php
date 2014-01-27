<?php

/* FtmblogBundle:Page:stargate.html.twig */
class __TwigTemplate_29e9592a232ab9c975c795afae1377cc4be7b47c2a35867e46cf8bcd5e72ffa8 extends Twig_Template
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
        echo "<h2>Adresses des stargates</h2>
<table class=\"table table-hover\">
<thead>
\t<tr><th>Lieu</th><th>Adresse</th></tr>
</thead>
<tbody>
\t<tr><td>Spawn</td><td>TDQZMVD</td></tr>
</tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "FtmblogBundle:Page:stargate.html.twig";
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

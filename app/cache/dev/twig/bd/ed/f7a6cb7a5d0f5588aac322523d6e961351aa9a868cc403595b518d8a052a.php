<?php

/* FtmblogBundle:Page:contact.html.twig */
class __TwigTemplate_bdedf7a6cb7a5d0f5588aac322523d6e961351aa9a868cc403595b518d8a052a extends Twig_Template
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
        echo "
";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        echo "<h2>Nous contacter</h2>
<p>Vous pouvez nous contacter des manières suivantes:
<ul>
<li><a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("ftm_irc");
        echo "\">Notre IRC</a></li>
<li><a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("ftm_mumble");
        echo "\">Notre mumble</a></li>
<li>Notre mail : staff (at) ftmarshmallow (point) com</li>
</p>
";
    }

    public function getTemplateName()
    {
        return "FtmblogBundle:Page:contact.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 16,  54 => 15,  49 => 12,  46 => 11,  41 => 8,  38 => 7,  33 => 4,  30 => 3,);
    }
}

<?php

/* FtmPlayerBundle:Default:index.html.twig */
class __TwigTemplate_8e91dfdfe895b37177e62b01cb7daac6682d69a83acc3a139290666b4d72209e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
        echo "Players";
    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        echo "News du serveur";
    }

    public function getTemplateName()
    {
        return "FtmPlayerBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 4,  29 => 3,);
    }
}

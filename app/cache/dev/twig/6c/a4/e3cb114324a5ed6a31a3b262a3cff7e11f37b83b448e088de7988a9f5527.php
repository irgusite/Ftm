<?php

/* FtmPlayerBundle:Default:form.html.twig */
class __TwigTemplate_6ca4e3cb114324a5ed6a31a3b262a3cff7e11f37b83b448e088de7988a9f5527 extends Twig_Template
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
        echo "Inscriptions";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "<h2>Formulaire d'inscription</h2>
";
        // line 7
        if ((isset($context["valid"]) ? $context["valid"] : $this->getContext($context, "valid"))) {
            // line 8
            echo "<p>Votre inscription a bien &eacute;t&eacute; prise en compte</p>
";
        }
        // line 10
        echo "<div class=\"well\">
  <form method=\"post\" ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">
    ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
    <input type=\"submit\" class=\"btn btn-primary\" />
  </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "FtmPlayerBundle:Default:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 12,  50 => 11,  47 => 10,  43 => 8,  41 => 7,  38 => 6,  35 => 5,  29 => 3,);
    }
}

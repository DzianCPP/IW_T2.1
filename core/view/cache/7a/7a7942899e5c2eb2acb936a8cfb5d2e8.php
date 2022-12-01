<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* 404.html.twig */
class __TwigTemplate_d62a8092884b9690ec61022d9bbf7adc extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo twig_include($this->env, $context, "components/header.html.twig");
        echo "

    <div class=\"container-xs container-sm container-md container-xl w-100\">
        <div class=\"row w-100 mt-5\">
            <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
            <div class=\"col-xs-10 col-sm-8 col-md-6 col-xl-4\">
                <h1 class=\"h1 w-100 m-1\" id=\"main-page-h1\">404: Page Not Found</h1>
            </div>
            <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
        </div>

        <div class=\"row w-100\">
            <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
            <div class=\"col-xs-10 col-sm-8 col-md-6 col-xl-4\">
                <div><a class=\"btn btn-dark w-100\" id=\"users-link-back\" href=\"/public\">Main page</a></div>
            </div>
            <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
        </div>
    </div>

";
        // line 21
        echo twig_include($this->env, $context, "components/footer.html.twig");
    }

    public function getTemplateName()
    {
        return "404.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 21,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "404.html.twig", "/opt/lampp/htdocs/core/view/templates/404.html.twig");
    }
}

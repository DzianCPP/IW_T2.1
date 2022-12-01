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

/* main.html.twig */
class __TwigTemplate_494fafda69e5506a9f3d375c7d0a758f extends Template
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

<div class=\"container-xs container-sm container-md container-xl pt-5\">
    <div class=\"container w-100\">
        <div class=\"row w-100 mb-5 mt-5\" id=\"main-page-h1\">
            <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
            <div class=\"col-xs-10 col-sm-8 col-md-6 col-xl-4\">
                <h1 class=\"h1 w-100 m-1\">Add User App</h1>
            </div>
            <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
        </div>

        <div class=\"row w-100 mb-1\" id=\"main-link-create-div\">
            <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
            <div class=\"col-xs-10 col-sm-8 col-md-6 col-xl-4\">
                <a class=\"btn btn-dark w-100\" id=\"main-link-create\" href=\"/user/new\">Create user</a>
            </div>
            <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
        </div>

        <div class=\"row w-100 mb-1\" id=\"main-link-show-div\">
            <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
            <div class=\"col-xs-10 col-sm-8 col-md-6 col-xl-4\">
                <a class=\"btn btn-dark w-100\" id=\"main-link-show\" href=\"/users/show/1\">Show all users</a>
            </div>
            <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
        </div>

        <div class=\"row w-100 mb-1\">
            <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
            <div class=\"col-xs-10 col-sm-8 col-md-6 col-xl-4\">
                <div class=\"input-group w-100\">
                    <input type=\"text\" class=\"form-control\" id=\"main-input-userID\">
                    <button class=\"btn btn-success\" id=\"main-page-find-button\"
                            disabled>Find
                    </button>
                </div>
            </div>
            <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
        </div>

        <div class=\"row w-100\">
            <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
            <div class=\"col-xs-10 col-sm-8 col-md-6 col-xl-4\">
                <div class=\"alert alert-danger\" id=\"error-field-div\" hidden>
                    <strong id=\"main-error-field\"></strong>
                </div>
            </div>
            <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
        </div>
    </div>
</div>
</div>
</div>

<script type=\"text/javascript\" src=\"/assets/scripts/users/find.js\"></script>
<script type=\"text/javascript\" src=\"/assets/scripts/userIdValid.js\"></script>

";
        // line 59
        echo twig_include($this->env, $context, "components/footer.html.twig");
    }

    public function getTemplateName()
    {
        return "main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 59,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "main.html.twig", "/opt/lampp/htdocs/core/view/templates/main.html.twig");
    }
}

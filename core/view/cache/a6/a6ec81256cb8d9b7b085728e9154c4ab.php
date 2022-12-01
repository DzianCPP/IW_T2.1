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

/* users.html.twig */
class __TwigTemplate_4e5c49bba5b0ba61d1db13d4f3ec1cd1 extends Template
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

<div class=\"container-xs container-sm container-md container-xl pt-5 w-100\">
    ";
        // line 4
        if ((twig_length_filter($this->env, ($context["allUsers"] ?? null)) > 0)) {
            // line 5
            echo "    <div class=\"row w-auto\">
        <div class=\"col-xs-0 col-sm-0 col-md-1 col-xl-3\"></div>
        <div class=\"col-xs-12 col-sm-12 col-md-10 col-xl-6\">
            <div class=\"table-responsive\">
                    ";
            // line 9
            echo twig_include($this->env, $context, "components/usersTable.html.twig");
            echo "
            </div>
        </div>
        <div class=\"col-xs-0 col-sm-0 col-md-1 col-xl-3\"></div>
    </div>

    <div class=\"row w-100\">
        <div class=\"col-xs-0 col-sm-0 col-md-1 col-xl-3\"></div>
        <div class=\"col-xs-12 col-sm-12 col-md-10 col-xl-6\">
            <div>
                <a class=\"btn btn-success w-auto mb-1\" id=\"delete-all\" >
                    Delete selected users
                </a>
            </div>
        </div>
        <div class=\"col-xs-0 col-sm-0 col-md-1 col-xl-3\"></div>
    </div>
    
    ";
        } else {
            // line 28
            echo "    <div class=\"row w-100\">
        <div class=\"col-xs-0 col-sm-0 col-md-1 col-xl-3\"></div>
        <div class=\"col-xs-12 col-sm-12 col-md-10 col-xl-6\">
            <div>
                <h1 class=\"h1 w-100 m-1\">";
            // line 32
            echo "No user found";
            echo "</h1>
            </div>
        </div>
        <div class=\"col-xs-0 col-sm-0 col-md-1 col-xl-3\"></div>
    </div>
    ";
        }
        // line 38
        echo "    
    ";
        // line 39
        if ((($context["countUsers"] ?? null) > 1)) {
            // line 40
            echo "        ";
            echo twig_include($this->env, $context, "components/usersPagination.html.twig");
            echo "
    ";
        }
        // line 42
        echo "
    <div class=\"row w-100\">
        <div class=\"col-xs-0 col-sm-0 col-md-1 col-xl-3\"></div>
        <div class=\"col-xs-12 col-sm-12 col-md-10 col-xl-6\">
            <div>
                <a class=\"btn btn-success w-100 mb-1\" id=\"users-link-add-user\"
                    href=\"/user/new\">
                        Add user
                </a>
            </div>
            <div>
                <a class=\"btn btn-dark w-100 mb-5\" id=\"users-link-back\" href=\"/public\">
                    Main page
                </a>
            </div>
        </div>
        <div class=\"col-xs-0 col-sm-0 col-md-1 col-xl-3\"></div>
    </div>
</div>

<script type=\"text/javascript\" src=\"/assets/scripts/users/delete.js\"></script>
<script type=\"text/javascript\" src=\"/assets/scripts/users/selectAll.js\"></script>
<script type=\"text/javascript\" src=\"/assets/scripts/users/deleteAll.js\"></script>

";
        // line 66
        echo twig_include($this->env, $context, "components/footer.html.twig");
    }

    public function getTemplateName()
    {
        return "users.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 66,  99 => 42,  93 => 40,  91 => 39,  88 => 38,  79 => 32,  73 => 28,  51 => 9,  45 => 5,  43 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "users.html.twig", "/opt/lampp/htdocs/core/view/templates/users.html.twig");
    }
}

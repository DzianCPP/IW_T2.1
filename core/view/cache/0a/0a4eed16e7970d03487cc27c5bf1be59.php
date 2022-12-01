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

/* components/usersPagination.html.twig */
class __TwigTemplate_ecbe947f02429d610ac7fce1081a5dcd extends Template
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
        echo "<div class=\"row w-auto\">
    <div class=\"col-xs-0 col-sm-0 col-md-1 col-xl-3\"></div>
    <div class=\"col-xs-12 col-sm-12 col-md-10 col-xl-6\">
        <nav>
            <ul class=\"pagination justify-content-center\">
                ";
        // line 6
        if ((($context["thisPage"] ?? null) > 1)) {
            // line 7
            echo "                <li class=\"page-item\">
                ";
        } else {
            // line 9
            echo "                <li class=\"page-item disabled\">
                ";
        }
        // line 11
        echo "                    <a class=\"page-link\" href=\"/users/show/";
        echo twig_escape_filter($this->env, (($context["thisPage"] ?? null) - 1), "html", null, true);
        echo "\" aria-label=\"Previous\">
                        <span aria-hidden=\"true\">&laquo;</span>
                        <span class=\"sr-only\"></span>
                    </a>
                </li>
                ";
        // line 16
        if ((($context["thisPage"] ?? null) > 1)) {
            // line 17
            echo "                    <li class=\"page-item\"><a class=\"page-link\"
                                             href=\"/users/show/";
            // line 18
            echo twig_escape_filter($this->env, (($context["thisPage"] ?? null) - 1), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (($context["thisPage"] ?? null) - 1), "html", null, true);
            echo "</a>
                    </li>
                ";
        }
        // line 21
        echo "                <li class=\"page-item disabled\"><a class=\"page-link\"
                                         href=\"/users/show/";
        // line 22
        echo twig_escape_filter($this->env, ($context["thisPage"] ?? null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, ($context["thisPage"] ?? null), "html", null, true);
        echo "</a>
                </li>
                ";
        // line 24
        if ((($context["thisPage"] ?? null) < ($context["pages"] ?? null))) {
            // line 25
            echo "                    <li class=\"page-item\"><a class=\"page-link\"
                                             href=\"/users/show/";
            // line 26
            echo twig_escape_filter($this->env, (($context["thisPage"] ?? null) + 1), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (($context["thisPage"] ?? null) + 1), "html", null, true);
            echo "</a>
                    </li>
                ";
        }
        // line 29
        echo "
                ";
        // line 30
        if ((($context["thisPage"] ?? null) < ($context["pages"] ?? null))) {
            // line 31
            echo "                <li class=\"page-item\">
                ";
        } else {
            // line 33
            echo "                <li class=\"page-item disabled\">
                ";
        }
        // line 35
        echo "                    <a class=\"page-link\" href=\"/users/show/";
        echo twig_escape_filter($this->env, (($context["thisPage"] ?? null) + 1), "html", null, true);
        echo "\" aria-label=\"Previous\">
                        <span aria-hidden=\"true\">&raquo;</span>
                        <span class=\"sr-only\"></span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class=\"col-xs-0 col-sm-0 col-md-1 col-xl-3\"></div>
</div>";
    }

    public function getTemplateName()
    {
        return "components/usersPagination.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 35,  108 => 33,  104 => 31,  102 => 30,  99 => 29,  91 => 26,  88 => 25,  86 => 24,  79 => 22,  76 => 21,  68 => 18,  65 => 17,  63 => 16,  54 => 11,  50 => 9,  46 => 7,  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "components/usersPagination.html.twig", "/opt/lampp/htdocs/core/view/templates/components/usersPagination.html.twig");
    }
}

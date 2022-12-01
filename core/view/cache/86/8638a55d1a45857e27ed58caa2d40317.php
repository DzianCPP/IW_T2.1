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

/* new.html.twig */
class __TwigTemplate_14aba2317481fe7b87b0a4cdc243230d extends Template
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

    <div class=\"container w-100\">
        <div class=\"row w-100 mt-5\">
            <div class=\"col-sm-1\"></div>
            <div class=\"col-sm-10\">
                <h1 class=\"h1 w-100 m-1\" id=\"main-page-h1\">Add User App</h1>
            </div>
            <div class=\"col-sm-1\"></div>
        </div>

        <form class=\"form\" method=\"POST\" action=\"/user/create\">

            <div class=\"row w-auto mt-2\">
                <div class=\"col-sm-1\"></div>
                <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                        <label class=\"input-group-text w-25\" for=\"email\">E-mail</label>
                        <input
                                type=\"text\"
                                class=\"form-control w-75\"
                                name=\"email\"
                                id=\"email\"
                                placeholder=\"Enter your email\"
                                value=\"";
        // line 25
        if ((($context["email"] ?? null) != "")) {
            // line 26
            echo "                                ";
            echo twig_escape_filter($this->env, ($context["email"] ?? null), "html", null, true);
            echo "
                                ";
        }
        // line 27
        echo "\"
                        >
                    </div>
                </div>
                <div class=\"col-sm-1\"></div>
            </div>

            <div class=\"row w-auto mt-2\">
                <div class=\"col-sm-1\"></div>
                <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                        <label class=\"input-group-text w-25\" for=\"name\">Full Name</label>
                        <input
                                type=\"text\"
                                class=\"form-control w-75\"
                                name=\"fullName\"
                                id=\"name\"
                                placeholder=\"Enter your first and last name\"
                                value=\"";
        // line 45
        if ((($context["fullName"] ?? null) != "")) {
            // line 46
            echo "                                ";
            echo twig_escape_filter($this->env, ($context["fullName"] ?? null), "html", null, true);
            echo "
                                ";
        }
        // line 47
        echo "\"
                        >
                    </div>
                </div>
                <div class=\"col-sm-1\"></div>
            </div>

            <div class=\"row w-auto mt-2\">
                <div class=\"col-sm-1\"></div>
                <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                        <label class=\"input-group-text w-25\" for=\"gender\">Gender</label>
                        <select name=\"gender\" id=\"gender\" class=\"btn btn-success dropdown-toggle w-75\">
                            ";
        // line 60
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["genders"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 61
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\">
                                    ";
            // line 62
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "
                                </option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        echo "                        </select>
                    </div>
                </div>
            </div>
            <div class=\"col-sm-1\"></div>

            <div class=\"row w-auto mt-2 mb-2\">
                <div class=\"col-sm-1\"></div>
                <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                        <label class=\"input-group-text w-25\" for=\"status\">Status</label>
                        <select name=\"status\" class=\"btn btn-success dropdown-toggle w-75\" id=\"status\">
                            ";
        // line 77
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["statuses"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 78
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\">
                                ";
            // line 79
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "
                            </option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 82
        echo "                        </select>
                    </div>
                </div>
            </div>
            <div class=\"col-sm-1\"></div>

            <div class=\"row w-auto\">
                <div class=\"col-sm-3\"></div>
                <div class=\"col-sm-6\">
                    <button type=\"button\" class=\"btn btn-success w-100\" id=\"submit-button\" value=\"submit\" disabled>
                        Submit
                    </button>
                </div>
                <div class=\"col-sm-3\"></div>
            </div>

            <div class=\"row w-100\">
                <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
                <div class=\"col-xs-10 col-sm-8 col-md-6 col-xl-4\">
                    <div class=\"alert mt-1\" id=\"error-field-div\">
                        <p id=\"error-field\">
                            ";
        // line 103
        if (((($context["email"] ?? null) != "") || (($context["fullName"] ?? null) != ""))) {
            // line 104
            echo "                            ";
            echo "Not valid information!";
            echo "
                            ";
        }
        // line 106
        echo "                        </p>
                    </div>
                </div>
                <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
            </div>
        </form>
    </div>

    <script type=\"text/javascript\" src=\"/assets/scripts/formValid.js\"></script>
    <script type=\"text/javascript\" src=\"/assets/scripts/users/create.js\"></script>

    ";
        // line 117
        echo twig_include($this->env, $context, "components/footer.html.twig");
    }

    public function getTemplateName()
    {
        return "new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  209 => 117,  196 => 106,  190 => 104,  188 => 103,  165 => 82,  156 => 79,  151 => 78,  147 => 77,  133 => 65,  124 => 62,  119 => 61,  115 => 60,  100 => 47,  94 => 46,  92 => 45,  72 => 27,  66 => 26,  64 => 25,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "new.html.twig", "/opt/lampp/htdocs/core/view/templates/new.html.twig");
    }
}

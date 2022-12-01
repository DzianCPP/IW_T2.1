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

/* edit.html.twig */
class __TwigTemplate_357717e4988c3da5366933afa63bcb1f extends Template
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
        <div class=\"row w-100 mt-5\">
            <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
            <div class=\"col-xs-10 col-sm-8 col-md-6 col-xl-4\">
                <h1 class=\"h1 w-100 m-1\" id=\"main-page-h1\">Edit User</h1>
            </div>
            <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
        </div>

        <form class=\"form\">
            <div class=\"row w-auto mt-2\">
                <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
                <div class=\"col-xs-10 col-sm-8 col-md-6 col-xl-4\">
                    <div class=\"input-group\">
                        <label class=\"input-group-text w-25\" for=\"email\">E-mail</label>
                        <input type=\"text\"
                               class=\"form-control w-75\"
                               name=\"new-email\"
                               id=\"email\"
                               placeholder=\"Enter your email\"
                               value=\"";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "email", [], "any", false, false, false, 23), "html", null, true);
        echo "\">
                    </div>
                </div>
                <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
            </div>

            <div class=\"row w-auto mt-2\">
                <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
                <div class=\"col-xs-10 col-sm-8 col-md-6 col-xl-4\">
                    <div class=\"input-group\">
                        <label class=\"input-group-text w-25\" for=\"name\">Full Name</label>
                        <input
                                type=\"text\"
                                class=\"form-control w-75\"
                                name=\"new-name\"
                                id=\"name\"
                                placeholder=\"Enter your first and last name\"
                                value=\"";
        // line 40
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "fullName", [], "any", false, false, false, 40), "html", null, true);
        echo "\">
                    </div>
                </div>
                <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
            </div>

            <div class=\"row w-auto mt-2\">
                <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
                <div class=\"col-xs-10 col-sm-8 col-md-6 col-xl-4\">
                    <div class=\"input-group\">
                        <label class=\"input-group-text w-25\" for=\"gender\">Gender</label>
                        <select name=\"gender\" id=\"gender\" class=\"btn btn-success dropdown-toggle w-75\">
                            ";
        // line 52
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["genders"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 53
            echo "                                <option
                                    ";
            // line 54
            if ((twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "gender", [], "any", false, false, false, 54) == $context["key"])) {
                // line 55
                echo "                                    ";
                echo "selected=\"selected\"";
                echo "
                                    ";
            }
            // line 57
            echo "                                    value=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\">
                                    ";
            // line 58
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "
                                </option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "                        </select>
                    </div>
                </div>
            </div>
            <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>

            <div class=\"row w-auto mt-2 mb-2\">
                <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
                <div class=\"col-xs-10 col-sm-8 col-md-6 col-xl-4\">
                    <div class=\"input-group\">
                        <label class=\"input-group-text w-25\" for=\"status\">Status</label>
                        <select name=\"status\" class=\"btn btn-success dropdown-toggle w-75\" id=\"status\">
                            ";
        // line 73
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["statuses"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 74
            echo "                                <option
                                    ";
            // line 75
            if ((twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "status", [], "any", false, false, false, 75) == $context["key"])) {
                // line 76
                echo "                                    ";
                echo "selected=\"selected\"";
                echo "
                                    ";
            }
            // line 78
            echo "                                    value=\"";
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
            <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>

            <div class=\"row w-auto\">
                <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
                <div class=\"col-xs-10 col-sm-8 col-md-6 col-xl-4\">
                    <button type=\"button\" class=\"btn btn-success w-100\" id=\"submit-button\" value=\"submit\" disabled>
                        Submit
                    </button>
                </div>
                <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
            </div>

            <div>
                <input type=\"hidden\"
                       value=\"";
        // line 100
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "userID", [], "any", false, false, false, 100), "html", null, true);
        echo "\"
                       name=\"user-id\"
                       id=\"user-id\">
            </div>

            <div class=\"row w-100\">
                <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
                <div class=\"col-xs-10 col-sm-8 col-md-6 col-xl-4\">
                    <div class=\"alert mt-1\" id=\"error-field-div\">
                        <p id=\"error-field\"></p>
                    </div>
                </div>
                <div class=\"col-xs-1 col-sm-2 col-md-3 col-xl-4\"></div>
            </div>
        </form>

        <script type=\"text/javascript\" src=\"/assets/scripts/formValid.js\"></script>
        <script type=\"text/javascript\" src=\"/assets/scripts/users/edit.js\"></script>
    </div>
";
        // line 119
        echo twig_include($this->env, $context, "components/footer.html.twig");
    }

    public function getTemplateName()
    {
        return "edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  211 => 119,  189 => 100,  169 => 82,  160 => 79,  155 => 78,  149 => 76,  147 => 75,  144 => 74,  140 => 73,  126 => 61,  117 => 58,  112 => 57,  106 => 55,  104 => 54,  101 => 53,  97 => 52,  82 => 40,  62 => 23,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "edit.html.twig", "/opt/lampp/htdocs/core/view/templates/edit.html.twig");
    }
}

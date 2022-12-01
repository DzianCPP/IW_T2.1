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

/* components/usersTable.html.twig */
class __TwigTemplate_06a6d5b8d1e949e2042e5bb77058144d extends Template
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
        echo "<table class=\"table table-sm table-hover\" id=\"all-users-table\">
        <tr>
            <th scope=\"col\"><input type=\"checkbox\" id=\"check-all\"></th>
            <th scope=\"col\">ID</th>
            <th scope=\"col\">E-mail</th>
            <th scope=\"col\">Full Name</th>
            <th scope=\"col\">Gender</th>
            <th scope=\"col\">Status</th>
            <th scope=\"col\"></th>
        </tr>
    ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["allUsers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 12
            echo "        <tr>
            <td><input name=\"select-user\" type=\"checkbox\" value=\"";
            // line 13
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "userID", [], "any", false, false, false, 13), "html", null, true);
            echo "\"></td>
            <td>";
            // line 14
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "userID", [], "any", false, false, false, 14), "html", null, true);
            echo "</td>
            <td>";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 15), "html", null, true);
            echo "</td>
            <td>";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "fullName", [], "any", false, false, false, 16), "html", null, true);
            echo "</td>
            <td>
                ";
            // line 18
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["GENDERS"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 19
                echo "                ";
                if (($context["key"] == twig_get_attribute($this->env, $this->source, $context["user"], "gender", [], "any", false, false, false, 19))) {
                    // line 20
                    echo "                ";
                    echo twig_escape_filter($this->env, $context["value"], "html", null, true);
                    echo "
                ";
                }
                // line 22
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 23
            echo "            </td>
            <td>
                ";
            // line 25
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["STATUSES"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 26
                echo "                ";
                if (($context["key"] == twig_get_attribute($this->env, $this->source, $context["user"], "status", [], "any", false, false, false, 26))) {
                    // line 27
                    echo "                ";
                    echo twig_escape_filter($this->env, $context["value"], "html", null, true);
                    echo "
                ";
                }
                // line 29
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "            </td>
            <td>
                <div class=\"btn-group-vertical\">
                    <a class=\"btn btn-success\" href=\"/user/edit/";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "userID", [], "any", false, false, false, 33), "html", null, true);
            echo "\"\">Edit</a>
                    <a class=\"btn btn-dark\" id=\"";
            // line 34
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "userID", [], "any", false, false, false, 34), "html", null, true);
            echo "\" onclick=\"sendDeleteRequest(this.id)\">
                        Delete</a>
                </div>
            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "
</table>";
    }

    public function getTemplateName()
    {
        return "components/usersTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 40,  124 => 34,  120 => 33,  115 => 30,  109 => 29,  103 => 27,  100 => 26,  96 => 25,  92 => 23,  86 => 22,  80 => 20,  77 => 19,  73 => 18,  68 => 16,  64 => 15,  60 => 14,  56 => 13,  53 => 12,  49 => 11,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "components/usersTable.html.twig", "/opt/lampp/htdocs/core/view/templates/components/usersTable.html.twig");
    }
}

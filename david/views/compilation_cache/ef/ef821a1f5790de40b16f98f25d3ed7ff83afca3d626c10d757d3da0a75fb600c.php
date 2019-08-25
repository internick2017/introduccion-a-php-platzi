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

/* addJob.twig */
class __TwigTemplate_4de2094bd6d32633647455645a7fa2dce9ea5bf05ee03890fa48816bdc2ee600 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout.twig", "addJob.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "

    ";
        // line 6
        if (($context["responseMessage"] ?? null)) {
            // line 7
            echo "      <div class=\"alert alert-primary alert-dismissible fade show\" role=\"alert\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
          <span class=\"sr-only\">Close</span>
        </button>
        <strong>";
            // line 12
            echo twig_escape_filter($this->env, ($context["responseMessage"] ?? null), "html", null, true);
            echo "</strong>
      </div>
    ";
        }
        // line 15
        echo "

    <form action=\"/david/job/store\" method=\"post\" class=\"form\">
        <div class=\"form-group\">
          <label for=\"title\">Title</label>
          <input type=\"text\" class=\"form-control\" name=\"title\" id=\"title\" aria-describedby=\"input-title-description\" placeholder=\"Title\">
          <small id=\"input-title-description\" class=\"form-text text-muted\">Write your title</small>
        </div>

        <div class=\"form-group\">
          <label for=\"description\">Description</label>
          <input type=\"text\" class=\"form-control\" name=\"description\" id=\"description\" aria-describedby=\"input-description-description\" placeholder=\"Description\">
          <small id=\"input-description-description\" class=\"form-text text-muted\">Write your description</small>
        </div>

        <button type=\"submit\" class=\"btn btn-primary\">Save</button>
    </form>
";
    }

    public function getTemplateName()
    {
        return "addJob.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 15,  63 => 12,  56 => 7,  54 => 6,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout.twig\" %}

{% block content %}


    {% if responseMessage %}
      <div class=\"alert alert-primary alert-dismissible fade show\" role=\"alert\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
          <span class=\"sr-only\">Close</span>
        </button>
        <strong>{{ responseMessage }}</strong>
      </div>
    {% endif %}


    <form action=\"/david/job/store\" method=\"post\" class=\"form\">
        <div class=\"form-group\">
          <label for=\"title\">Title</label>
          <input type=\"text\" class=\"form-control\" name=\"title\" id=\"title\" aria-describedby=\"input-title-description\" placeholder=\"Title\">
          <small id=\"input-title-description\" class=\"form-text text-muted\">Write your title</small>
        </div>

        <div class=\"form-group\">
          <label for=\"description\">Description</label>
          <input type=\"text\" class=\"form-control\" name=\"description\" id=\"description\" aria-describedby=\"input-description-description\" placeholder=\"Description\">
          <small id=\"input-description-description\" class=\"form-text text-muted\">Write your description</small>
        </div>

        <button type=\"submit\" class=\"btn btn-primary\">Save</button>
    </form>
{% endblock %}
", "addJob.twig", "C:\\laragon\\www\\introduccion-a-php\\david\\views\\addJob.twig");
    }
}

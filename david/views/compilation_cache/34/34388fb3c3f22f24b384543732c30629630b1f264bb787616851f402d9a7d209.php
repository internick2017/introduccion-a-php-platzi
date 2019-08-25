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

/* admin.twig */
class __TwigTemplate_a9f3b9cddc855018b1a53a4322914f093ee4c46a9da15336e79b49e4cbccaf70 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("layout.twig", "admin.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<h1>Dashboard</h1>

<ul>
    <li><a href=\"/admin/users/add\" >Add User</a></li>
    <li><a href=\"/admin/jobs/add\" >Add Job</a></li>
    <li><a href=\"/admin/profile/changePassword\" >Change Password</a></li>
</ul>
<br><br>
<a href=\"/logout\" >Logout</a>
";
    }

    public function getTemplateName()
    {
        return "admin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout.twig\" %}

{% block content %}
<h1>Dashboard</h1>

<ul>
    <li><a href=\"/admin/users/add\" >Add User</a></li>
    <li><a href=\"/admin/jobs/add\" >Add Job</a></li>
    <li><a href=\"/admin/profile/changePassword\" >Change Password</a></li>
</ul>
<br><br>
<a href=\"/logout\" >Logout</a>
{% endblock %}", "admin.twig", "C:\\laragon\\www\\introduccion-a-php\\david\\views\\admin.twig");
    }
}

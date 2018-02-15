<?php

/* /main/index.html */
class __TwigTemplate_ec670c57795b04fda0441d4a75e482c1b90a22b887ad9298338936e883716d92 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html", "/main/index.html", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Главная страница";
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"container\">
    <div class=\"row\">
        <!-- Carousel slider -->
        <div class=\"col-sm-6 col-md-5 col-lg-6\">
            <div id=\"carousel\" class=\"carousel slide\" data-interval=\"3000\" data-ride=\"carousel\">
                <div class=\"carousel-inner\">
                    <div class=\"item active\">
                        <img src=\"template/img/slides/material-design-jpeg-1920x1080-1-.jpg\">
                    </div>
                    <div class=\"item\">
                        <img src=\"template/img/slides/material-design-jpeg-1920x1080-2-.jpg\">
                    </div>
                    <div class=\"item\">
                        <img src=\"template/img/slides/material-design-jpeg-1920x1080-3-.jpg\">
                    </div>
                    <div class=\"item\">
                        <img src=\"template/img/slides/material-design-jpeg-1920x1080-4-.jpg\">
                    </div>
                    <div class=\"item\">
                        <img src=\"template/img/slides/material-design-jpeg-1920x1080-5-.jpg\">
                    </div>
                    <div class=\"item\">
                        <img src=\"template/img/slides/material-design-jpeg-1920x1080-6-.jpg\">
                    </div>
                    <div class=\"item\">
                        <img src=\"template/img/slides/material-design-jpeg-1920x1080-7-.jpg\">
                    </div>
                    <div class=\"item\">
                        <img src=\"template/img/slides/material-design-jpeg-1920x1080-8-.jpg\">
                    </div>
                </div>
            </div>
            <div class=\"clearfix\">
                <div id=\"thumbcarousel\" class=\"carousel slide\" data-interval=\"12000\" data-ride=\"carousel\">
                    <div class=\"carousel-inner\">
                        <div class=\"item active\">
                            <div data-target=\"#carousel\" data-slide-to=\"0\" class=\"thumb\"><img src=\"template/img/slides/material-design-jpeg-1920x1080-1-.jpg\"></div>
                            <div data-target=\"#carousel\" data-slide-to=\"1\" class=\"thumb\"><img src=\"template/img/slides/material-design-jpeg-1920x1080-2-.jpg\"></div>
                            <div data-target=\"#carousel\" data-slide-to=\"2\" class=\"thumb\"><img src=\"template/img/slides/material-design-jpeg-1920x1080-3-.jpg\"></div>
                            <div data-target=\"#carousel\" data-slide-to=\"3\" class=\"thumb\"><img src=\"template/img/slides/material-design-jpeg-1920x1080-4-.jpg\"></div>
                        </div>
                        <div class=\"item\">
                            <div data-target=\"#carousel\" data-slide-to=\"4\" class=\"thumb\"><img src=\"template/img/slides/material-design-jpeg-1920x1080-5-.jpg\"></div>
                            <div data-target=\"#carousel\" data-slide-to=\"5\" class=\"thumb\"><img src=\"template/img/slides/material-design-jpeg-1920x1080-6-.jpg\"></div>
                            <div data-target=\"#carousel\" data-slide-to=\"6\" class=\"thumb\"><img src=\"template/img/slides/material-design-jpeg-1920x1080-7-.jpg\"></div>
                            <div data-target=\"#carousel\" data-slide-to=\"7\" class=\"thumb\"><img src=\"template/img/slides/material-design-jpeg-1920x1080-8-.jpg\"></div>
                        </div>
                    </div>
                    <a class=\"left carousel-control\" href=\"#thumbcarousel\" role=\"button\" data-slide=\"prev\">
                        <span class=\"glyphicon glyphicon-chevron-left\"></span>
                    </a>
                    <a class=\"right carousel-control\" href=\"#thumbcarousel\" role=\"button\" data-slide=\"next\">
                        <span class=\"glyphicon glyphicon-chevron-right\"></span>
                    </a>
                </div>
            </div>
        </div>
        <!-- end of carousel slider -->
        <div class=\"col-sm-6 col-md-5 col-md-offset-2 col-lg-6 col-lg-offset-0\">
            <div class=\"jumbotron\">
                <h1 class=\"centered\">О проекте</h1>
                <p class=\"centered\">Этот блог создается с помощью паттерна MVC с целью изучения данного паттерна.</p>
                <p class=\"centered\"><a class=\"btn btn-primary btn-lg\" role=\"button\" href=\"/about\">Узнать больше</a></p>
            </div>
        </div>
    </div>
</div>
<hr>
<div class=\"container\">
    <div class=\"row\">
        ";
        // line 74
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["articles"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 75
            echo "            <h1><i class=\"fa fa-pencil-square\"></i> <a href=\"/articles/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "title", array()), "html", null, true);
            echo "</a></h1>
            <p>Author: ";
            // line 76
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "author", array()), "html", null, true);
            echo "</p>
            <p class=\"content";
            // line 77
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "title", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "short_content", array()), "html", null, true);
            echo "</p>
            <p><a class=\"btn btn-default\" role=\"button\" href=\"/articles/";
            // line 78
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "id", array()), "html", null, true);
            echo "\">Читать дальше <i class=\"fa fa-long-arrow-right\" aria-hidden=\"true\"></i></a></p>
            <p><i class=\"fa fa-heart\"></i> ";
            // line 79
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "like_count", array()), "html", null, true);
            echo "</p>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        echo "        <p><a class=\"btn btn-primary btn-lg\" role=\"button\" href=\"/articles\">Все статьи</a></p>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "/main/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 81,  135 => 79,  131 => 78,  125 => 77,  121 => 76,  114 => 75,  110 => 74,  38 => 4,  35 => 3,  29 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "/main/index.html", "/var/www/html/mvcblog.local/view/main/index.html");
    }
}

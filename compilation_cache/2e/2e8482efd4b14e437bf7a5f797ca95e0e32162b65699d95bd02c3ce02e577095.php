<?php

/* /main/index.php */
class __TwigTemplate_ae2c9d91ceb2e5516a3bf247e0066bda5b22c1825ffb4958ce7326d89a7377d9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<?php require(ROOT . '/view/layout.php'); ?>
<?php require(ROOT . '/view/layouts/navigation.php'); ?>
<html>
    <head>
        <title>Главная страница</title>
    </head>
    <body>
        <div class=\"container\">
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
            <hr>
            <div class=\"container\">
                <div class=\"row\">
                   ";
        // line 77
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["articles"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 78
            echo "                   <h1>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "title", array()), "html", null, true);
            echo "</h1>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 80
        echo "            </div>
            <div class=\"container\">
                <hr>
                <footer>
                    <p>&copy; Ханды-Сурун 2018</p>
                </footer>
            </div>
    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "/main/index.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 80,  101 => 78,  97 => 77,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "/main/index.php", "/var/www/html/mvcblog.local/view/main/index.php");
    }
}

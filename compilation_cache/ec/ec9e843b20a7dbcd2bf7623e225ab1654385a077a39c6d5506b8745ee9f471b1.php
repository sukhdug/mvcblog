<?php

/* /layouts/navigation.php */
class __TwigTemplate_76001677b85f4b01f61994be62da34937ee0c9678c9ff054c7c3a7cd4166038e extends Twig_Template
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
        echo "<div class=\"header\">
    <div class=\"navbar navbar-inner\" role=\"navigation\">
        <div class=\"container\">
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
                <a class=\"navbar-brand\" href=\"#\"><img src=\"/template/img/logo.png\"></a>
                <a class=\"navbar-brand\" href=\"#\">SuKhDug</a>
            </div>
            <div class=\"collapse navbar-collapse\">
                <ul class=\"nav navbar-nav\">
                    <li><a href=\"/\">Главная</a></li>
                    <li class=\"dropdown\"><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Статьи <span class=\"caret\"></span></a>
                        <ul class=\"dropdown-menu\">
                            <li><a href=\"/articles\">Новые</a></li>
                            <li><a href=\"#\">Популярные</a></li>
                        </ul>
                    </li>
                    <li><a href=\"/about\">О проекте</a></li>
                    <li><a href=\"/contacts\">Контакты</a></li>
                </ul>
                <ul class=\"nav navbar-nav navbar-right\">
                    <?php if (isset(\$_SESSION['logged'])): ?>
                        <li class=\"dropdown\"><a href=\"\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Привет, <?= \$_SESSION['logged']['login']; ?>!</a>
                            <ul class=\"dropdown-menu\">
                                <?php if (\$_SESSION['logged']['admin']): ?>
                                    <li><a href=\"/admin\">Администрирование</a></li>
                                <?php endif; ?>
                                <li><a href=\"/logout\">Выйти</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li><a href=\"/login\">Войти</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "/layouts/navigation.php";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "/layouts/navigation.php", "/var/www/html/mvcblog.local/view/layouts/navigation.php");
    }
}

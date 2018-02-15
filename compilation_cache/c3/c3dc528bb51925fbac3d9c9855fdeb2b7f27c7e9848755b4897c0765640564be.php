<?php

/* base.html */
class __TwigTemplate_aad21fefde65746038508d3bef32788f66567bb88de630d5874edebca8729d10 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        ";
        // line 6
        $this->displayBlock('head', $context, $blocks);
        // line 15
        echo "    </head>
    <body>
        ";
        // line 17
        $this->loadTemplate("/layouts/navigation.php", "base.html", 17)->display($context);
        // line 18
        echo "        ";
        $this->displayBlock('body', $context, $blocks);
        // line 19
        echo "        ";
        $this->loadTemplate("/layouts/footer.php", "base.html", 19)->display($context);
        // line 20
        echo "    </body>
</html>";
    }

    // line 6
    public function block_head($context, array $blocks = array())
    {
        // line 7
        echo "        <link rel=\"stylesheet\" href=\"/template/css/bootstrap.css\" />
        <link rel=\"stylesheet\" href=\"/template/css/jasny-bootstrap.min.css\" />
        <link rel=\"stylesheet\" href=\"/template/css/font-awesome.css\" />
        <link rel=\"stylesheet\" href=\"/template/css/common-styles.css\" />
        <script src=\"/template/js/jquery.js\" type=\"text/javascript\"></script>
        <script src=\"/template/js/bootstrap.js\" type=\"text/javascript\"></script>
        <script src=\"/template/js/jasny-bootstrap.js\" type=\"text/javascript\"></script>
        ";
    }

    // line 18
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 18,  50 => 7,  47 => 6,  42 => 20,  39 => 19,  36 => 18,  34 => 17,  30 => 15,  28 => 6,  21 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "base.html", "/var/www/html/mvcblog.local/view/base.html");
    }
}

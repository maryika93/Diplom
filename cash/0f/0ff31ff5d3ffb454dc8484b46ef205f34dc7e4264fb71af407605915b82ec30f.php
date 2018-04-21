<?php

/* index.tmpl */
class __TwigTemplate_7d1f2724d51d4f796f551d09a765dfe69e8964b2a44556bed9f0fa9640bfc5d2 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang=\"en\" class=\"no-js\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel=\"stylesheet\" href=\"css/Myreset.css\">
    <link rel=\"stylesheet\" href=\"css/Mystyle.css\">
    <script src=\"js/modernizr.js\"></script>
    <title>FAQ</title>
</head>
<body>
<header>
    <h1>FAQ</h1>
</header>
<section class=\"cd-faq\">

    <div class=\"cd-faq-items\">

        <ul id=\"basics\" class=\"cd-faq-group\">
            ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cat"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["cats"]) {
            // line 23
            echo "                <li class=\"cd-faq-title\"><h2>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cats"], "category", array()), "html", null, true);
            echo "</h2></li>
                <li>
                    ";
            // line 25
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["ques"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["quess"]) {
                if ((twig_get_attribute($this->env, $this->source, $context["quess"], "id_category", array()) == twig_get_attribute($this->env, $this->source, $context["cats"], "id", array()))) {
                    // line 26
                    echo "                        <a class=\"cd-faq-trigger\" href=\"#0\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["quess"], "question", array()), "html", null, true);
                    echo "</a>
                        <div class=\"cd-faq-content\">
                            ";
                    // line 28
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["answ"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["answs"]) {
                        if ((twig_get_attribute($this->env, $this->source, $context["answs"], "id", array()) == twig_get_attribute($this->env, $this->source, $context["quess"], "id", array()))) {
                            // line 29
                            echo "                                <p>";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["answs"], "answer", array()), "html", null, true);
                            echo "</p>
                            ";
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['answs'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 31
                    echo "                        </div>
                    ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['quess'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "                </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cats'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "        </ul>
    </div>
</section>
<section class=\"form\">
    <h1 class=\"myh1\"> Хотите задать свой вопрос? </h1>
    <form>
        <br method=\"post\" action=\"index.php\" enctype=\"multipart/form-data\">
        <label>Ваше имя</label>
        <input class=\"myinp\" type=\"text\" placeholder=\"Имя\" name=\"name\"><br/>
        <label>Адрес электронной почты</label>
        <input class=\"myinp\" type=\"text\" placeholder=\"Адрес электронной почты\" name=\"email\"><br/>
        <label>Выберите категорию</label>
        <select name = 'category'>
            ";
        // line 48
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cat"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["cats"]) {
            // line 49
            echo "            <option value = \"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cats"], "category", array()), "html", null, true);
            echo "\" > ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cats"], "category", array()), "html", null, true);
            echo " </option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cats'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "        </select><br/>
        <label>Напишите свой вопрос</label>
        <input class=\"myinp\" type=\"text\" placeholder=\"Вопрос\" name=\"question\"><br/>
        <input class=\"mysubmit\" type=\"submit\" name=\"send\" value=\"Отправить\">
    </form>
</section>
<script src=\"js/jquery-2.1.1.js\"></script>
<script src=\"js/jquery.mobile.custom.min.js\"></script>
<script src=\"js/main.js\"></script>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "index.tmpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 51,  116 => 49,  112 => 48,  97 => 35,  90 => 33,  82 => 31,  72 => 29,  67 => 28,  61 => 26,  56 => 25,  50 => 23,  46 => 22,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "index.tmpl", "C:\\xampp\\htdocs\\diplom\\templates\\index.tmpl");
    }
}

<?php
require_once 'vendor/autoload.php';
require_once 'lib/connect.php';
require_once 'model/Answer.php';
require_once 'model/Category.php';
require_once 'model/Question.php';
require_once 'model/User.php';

    $loader = new Twig_Loader_Filesystem('templates');
    $twig   = new Twig_Environment($loader, array(
        'cache' => 'cache',
        'auto_reload' => true));

    $template = $twig->loadTemplate('admin_index.twig');
    echo $twig->render($template);

    if(isset($_GET['go'])) {
        if ($_GET['go'] == 'administrators') {
            header('Location: administrators.php');
        }
        if ($_GET['go'] == 'categories') {
            header('Location: categories.php');
        }
        if ($_GET['go'] == 'editCategory') {
            header('Location: editCategory.php');
        }
}


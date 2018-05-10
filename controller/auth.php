<?php
require_once 'vendor/autoload.php';
require_once 'model/User.php';
require_once 'lib/connect.php';

try {
    $db = db();
    if (!empty($_POST)) {
        if (isset($_POST['inp'])) {
            if (isset($_POST['login'])) {
                $login = $_POST['login'];
            }
            if (isset($_POST['password'])) {
                $password = md5($_POST['password']);
            }

            $data = selectUser($login);

            if (empty($data[0]['pass'])) {
                $err = "Извините, введённый вами логин или пароль неверный";
            } else {
                if ($data[0]['pass'] === $password) {
                    $_SESSION['login'] = $data[0]['login'];
                    $_SESSION['id']    = $data[0]['id'];
                } else {
                    $err = "Извините, введённый вами логин или пароль неверный";
                }
            }
        }
    }

    if ((isset($_SESSION['login'])) || ((isset($_GET['c'])) && (($_GET['c'] == 'back')))) {
        $loader   = new Twig_Loader_Filesystem('templates');
        $twig     = new Twig_Environment($loader, array(
            'cache' => 'cache',
            'auto_reload' => true));
        $template = $twig->loadTemplate('admin_index.twig');
        echo $twig->render($template);
    } else {
        $loader   = new Twig_Loader_Filesystem('templates');
        $twig     = new Twig_Environment($loader, array(
            'cache' => 'cash',
            'auto_reload' => true));
        $err      = "";
        $template = $twig->loadTemplate('admin.twig');
        echo $twig->render($template, array('err' => $err));
    }
}
catch(PDOException $e)
{
    die("Error: " . $e->getMessage());
}
?>
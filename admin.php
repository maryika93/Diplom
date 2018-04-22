<?php
require_once 'vendor/autoload.php';
require_once 'model/User.php';
require_once 'lib/connect.php';

try {
    $db = db();
    $loader = new Twig_Loader_Filesystem('templates');
    $twig   = new Twig_Environment($loader, array(
        'cache' => 'cash',
        'auto_reload' => true));

    $template = $twig->loadTemplate('admin.tmpl');
    echo $twig->render($template);

    if (!empty($_POST)) {
        if (isset($_POST['inp'])) {
            if (isset($_POST['login'])) {
                $login = $_POST['login'];
            }
            if (isset($_POST['password'])) {
                $password = md5($_POST['password']);
            }
            if (empty($login) or empty($password))
            {
                exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
            }
            $data = selectAllUsers($login);
            foreach ($data as $rows) {
                if (empty($rows['pass'])) {
                    exit ("Извините, введённый вами логин или пароль неверный. </br></br></br> <a href='reg.php'>Вернуться</a>");
                }
                else {
                    if ($rows['pass'] == $password) {
                        $_SESSION['login'] = $rows['login'];
                        $_SESSION['id']    = $rows['id'];
                        header('Location: admin_index.php');
                    } else {
                        exit ("Извините, введённый вами логин или пароль неверный. </br></br></br> <a href='reg.php'>Вернуться</a>");
                    }
                }
            }
        }
    }
}

catch(PDOException $e)
{
    die("Error: " . $e->getMessage());
}
?>
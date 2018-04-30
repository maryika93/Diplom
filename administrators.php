<?php
require_once 'vendor/autoload.php';
require_once 'lib/connect.php';
require_once 'model/User.php';

$loader = new Twig_Loader_Filesystem('templates');
$twig   = new Twig_Environment($loader, array(
    'cache' => 'cache',
    'auto_reload' => true));

$template = $twig->loadTemplate('administrators.twig');

$db = db();

$err = "";
$users  = selectUsers();

echo $twig->render($template, array('users' => $users));

if (!empty($_POST)) {

    if (isset($_POST['registrate'])) {

        if (!empty($_POST['login'])) {
            $login = $_POST['login'];
            $data  = selectAllUsers($login);
        }
        if (!empty($_POST['password'])) {
            $password = md5($_POST['password']);
        }

        if (!empty($data[0]['id'])) {
            $err = "Извините, введённый вами логин уже зарегистрирован. Введите другой логин";
        } else {
            if (isset($login) & isset($password)) {
                $result = insertUser($login, $password);
            } else {
                $err = "Введите желаемый логин и пароль";
            }
        }
    }

    if (isset($_POST['change'])) {
        $newpassword = md5($_POST['newpassword']);
        $newlogin    = $_POST['admins'];
        $datadone    = updateUser($newpassword, $newlogin);
        die;
    }

    if (isset($_POST['deleteadmin'])) {
        $login   = $_POST['admins'];
        $datadel = deleteUser($login);
        die;
    }
}

if (!empty($_GET)) {

    if (isset($_GET['deleteuser'])) {
        $del     = $_GET['deleteuser'];
        $datadel = deleteUsersQuestionID($del);
    }
}
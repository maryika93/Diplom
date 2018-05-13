<?php
require_once 'model/User.php';

$twig   = twig();
$db = db();
$User = new User();
$err = "";

$users  = $User -> selectUsers();

if (!empty($_POST)) {

    if (isset($_POST['registrate'])) {

        if (!empty($_POST['login'])) {
            $login = $_POST['login'];
            $data  = $User -> selectUser($login);
        }
        if (!empty($_POST['password'])) {
            $password = md5($_POST['password']);
        }

        if (!empty($data[0]['id'])) {
            $err = "Извините, введённый вами логин уже зарегистрирован. Введите другой логин";
        } else {
            if (isset($login) & isset($password)) {
                $result = $User -> insertUser($login, $password);
            } else {
                $err = "Введите желаемый логин и пароль";
            }
        }
    }

    if (isset($_POST['change'])) {
        $newpassword = md5($_POST['newpassword']);
        $newlogin    = $_POST['admins'];
        $datadone    = $User -> updateUser($newpassword, $newlogin);
    }

    if (isset($_POST['deleteadmin'])) {
        $login   = $_POST['admins'];
        $datadel = $User -> deleteUser($login);
    }
}
echo $twig->render('administrators.twig', array('users' => $users, 'err' => $err));
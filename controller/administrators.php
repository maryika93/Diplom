<?php
require_once 'model/User.php';

$twig   = twig();
$db = db();
$user = new User();
$err = "";

$users  = $user->selectUsers();

if (!empty($_POST)) {

    if (isset($_POST['registrate'])) {

        if (!empty($_POST['login'])) {
            $login = $_POST['login'];
            $data  = $user->selectUser($login);
        }
        if (!empty($_POST['password'])) {
            $password = md5($_POST['password']);
        }

        if (!empty($data[0]['id'])) {
            $err = "Извините, введённый вами логин уже зарегистрирован. Введите другой логин";
        } else {
            if (isset($login) & isset($password)) {
                $result = $user->insertUser($login, $password);
            } else {
                $err = "Введите желаемый логин и пароль";
            }
        }
    }

    if (isset($_POST['change'])) {
        $newpassword = md5($_POST['newpassword']);
        $newlogin    = $_POST['admins'];
        $datadone    = $user->updateUser($newpassword, $newlogin);
    }

    if (isset($_POST['deleteadmin'])) {
        $login   = $_POST['admins'];
        $datadel = $user->deleteUser($login);
    }
}
echo $twig->render('administrators.twig', array('users' => $users, 'err' => $err));
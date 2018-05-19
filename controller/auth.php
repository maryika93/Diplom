<?php
include 'model/User.php';

    if (!empty($_POST)) {
        $user = new User();
        $err      = "";
        if (isset($_POST['inp'])) {
            if (isset($_POST['login'])) {
                $login = $_POST['login'];
            }
            if (isset($_POST['password'])) {
                $password = md5($_POST['password']);
            }

            $data = $user->selectUser($login);

            if (empty($data['pass'])) {
                $err = "Извините, введённый вами логин или пароль неверный";
            } else {
                if ($data['pass'] === $password) {
                    $_SESSION['login'] = $data['login'];
                    $_SESSION['id']    = $data['id'];
                    header('Location: admin.php');
                    exit;
                } else {
                    $err = "Извините, введённый вами логин или пароль неверный";
                }
            }
        }
    }
    $twig     = twig();
    echo $twig->render('admin.twig', array('err' => $err));

?>
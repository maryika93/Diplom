<?php
include 'model/User.php';

try {
    $db = db();
    $User = new User();
    if (!empty($_POST)) {
        if (isset($_POST['inp'])) {
            if (isset($_POST['login'])) {
                $login = $_POST['login'];
            }
            if (isset($_POST['password'])) {
                $password = md5($_POST['password']);
            }

            $data = $User -> selectUser($login);

            if (empty($data[0]['pass'])) {
                $err = "Извините, введённый вами логин или пароль неверный";
            } else {
                if ($data[0]['pass'] === $password) {
                    $_SESSION['login'] = $data[0]['login'];
                    $_SESSION['id']    = $data[0]['id'];
                    header('Location: admin.php');
                    exit;
                } else {
                    $err = "Извините, введённый вами логин или пароль неверный";
                }
            }
        }
    }
    $err      = "";
    $twig     = twig();
    echo $twig->render('admin.twig', array('err' => $err));
}
catch(PDOException $e)
{
    die("Error: " . $e->getMessage());
}
?>
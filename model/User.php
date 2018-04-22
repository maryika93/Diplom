<?php

function selectUs()
{
    $db = db();
    $users  = $db->query('SELECT * FROM users')->fetchAll();
    return $users;
}

function deleteUs($log)
{
    $db = db();
    $datadel = $db->prepare('DELETE FROM `users` WHERE login = :login');
    $datadel->bindParam(':login', $log);
    $datadel->execute();
    return $datadel;
}

function insertUs($login, $password)
{
    $db = db();
    $result = $db->prepare('INSERT INTO `users`(`login`, `pass`) VALUES (:log, :pass)');
    $result->bindParam(':log', $login);
    $result->bindParam(':pass', $password);
    $result->execute();
    return $result;
}

function selectAllUs($login)
{
    $db = db();
    $data = $db->query("SELECT * FROM `users` WHERE login = '$login'");
    return $data;
}

function updateUs($newpassword, $newlog)
{
    $db = db();
    $datadone = $db->prepare('UPDATE `users` SET `pass`=:newpass WHERE login = :login');
    $datadone->bindParam(':newpass', $newpassword);
    $datadone->bindParam(':login', $newlog);
    $datadone->execute();
    return $datadone;
}

?>
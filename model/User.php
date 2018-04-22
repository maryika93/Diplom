<?php

function selectUsers()
{
    $db = db();
    $users  = $db->query('SELECT id, login, pass, role FROM users')->fetchAll();
    return $users;
}

function deleteUser($log)
{
    $db = db();
    $datadel = $db->prepare('DELETE FROM `users` WHERE login = :login');
    $datadel->bindParam(':login', $log);
    $datadel->execute();
    return $datadel;
}

function insertUser($login, $password)
{
    $db = db();
    $result = $db->prepare('INSERT INTO `users`(`login`, `pass`) VALUES (:log, :pass)');
    $result->bindParam(':log', $login);
    $result->bindParam(':pass', $password);
    $result->execute();
    return $result;
}

function selectAllUsers($login)
{
    $db = db();
    $data = $db->prepare("SELECT id, login, pass, role FROM `users` WHERE login = :login");
    $data->bindParam(':login', $login);
    $data->execute();
    return $data;
}

function updateUser($newpassword, $newlog)
{
    $db = db();
    $datadone = $db->prepare('UPDATE `users` SET `pass`=:newpass WHERE login = :login');
    $datadone->bindParam(':newpass', $newpassword);
    $datadone->bindParam(':login', $newlog);
    $datadone->execute();
    return $datadone;
}

?>
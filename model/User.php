<?php

class User
{
    public function selectUsers()
    {
        $db    = db();
        $users = $db->query('SELECT id, login, pass, role FROM users')->fetchAll();
        return $users;
    }

    public function deleteUser($login)
    {
        $db      = db();
        $datadel = $db->prepare('DELETE FROM `users` WHERE login = :login');
        $datadel->bindParam(':login', $login);
        $datadel->execute();
        return $datadel;
    }

    public function insertUser($login, $password)
    {
        $db     = db();
        $result = $db->prepare('INSERT INTO `users`(`login`, `pass`) VALUES (:log, :pass)');
        $result->bindParam(':log', $login);
        $result->bindParam(':pass', $password);
        $result->execute();
        return $result;
    }

    public function selectUser($login)
    {
        $db   = db();
        $data = $db->prepare("SELECT id, login, pass, role FROM `users` WHERE login = :login");
        $data->bindParam(':login', $login);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateUser($newpassword, $newlogin)
    {
        $db       = db();
        $datadone = $db->prepare('UPDATE `users` SET `pass`=:newpass WHERE login = :login');
        $datadone->bindParam(':newpass', $newpassword);
        $datadone->bindParam(':login', $newlogin);
        $datadone->execute();
        return $datadone;
    }
}

?>
<?php
require_once 'connectDB.php';
require_once 'CategoriesDB.php';

function insertUsQues()
{
    $db = db();
    $question = $db->prepare('INSERT INTO `users_questions`(`user`, `email`, `category`, `question`, `date`) VALUES (:user, :email, :category, :question, :date)');
    $idcat = selectIDCat();

    foreach ($idcat as $cat){
        $question->bindParam(':category', $cat['id']);
    }
    $question->bindParam(':user', $_GET['name']);
    $question->bindParam(':email', $_GET['email']);
    $question->bindParam(':question', $_GET['question']);
    $question->bindParam(':date', date("y.m.d.H:i:s"));

    $question->execute();
    return $question;
}

function selectAllUsQues($idcat)
{
    $db = db();
    $userques = $db->query("SELECT * FROM users_questions WHERE category = '$idcat'")->fetchAll();
    return $userques;
}

function selectIDUsQues($idcat)
{
    $db = db();
    $userquestions = count($db->query("SELECT id FROM users_questions WHERE category = '$idcat'")->fetchAll());
    return $userquestions;
}

function deleteUsQues($idcat)
{
    $db = db();
    $uquesdel = $db->prepare('DELETE FROM `users_questions` WHERE category = :ucategory');
    $uquesdel->bindParam(':ucategory', $idcat);
    $uquesdel->execute();
    return $uquesdel;
}

function updateUsQues($newname, $b)
{
    $db = db();
    $datadone = $db->prepare('UPDATE `users_questions` SET `user`=:user WHERE id = :id');
    $datadone->bindParam(':user', $newname);
    $datadone->bindParam(':id', $b);
    $datadone->execute();
    return $datadone;
}

function updateUsQuesQ($newquest, $a)
{
    $db = db();
    $updques  = $db->prepare('UPDATE `users_questions` SET `question`=:quest WHERE id = :id');
    $updques->bindParam(':quest', $newquest);
    $updques->bindParam(':id', $a);
    $updques->execute();
    return $updques;
}

function deleteUsQuesID($del)
{
    $db = db();
    $datadel = $db->prepare('DELETE FROM `users_questions` WHERE id = :id');
    $datadel->bindParam(':id', $del);
    $datadel->execute();
    return $datadel;
}

function updateUsQuesLog($newname, $author)
{
    $db = db();
    $datadone = $db->prepare('UPDATE `users_questions` SET `user`=:user WHERE login = :login');
    $datadone->bindParam(':user', $newname);
    $datadone->bindParam(':login', $author);
    $datadone->execute();
    return $datadone;
}


?>
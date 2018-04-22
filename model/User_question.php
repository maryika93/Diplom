<?php

function insertUsersQuestion($name, $email, $ques, $date, $categoryID)
{
    $db = db();
    $question = $db->prepare('INSERT INTO `users_questions`(`user`, `email`, `category`, `question`, `date`) VALUES (:user, :email, :category, :question, :date)');
    $question->bindParam(':user', $name);
    $question->bindParam(':category', $categoryID);
    $question->bindParam(':email', $email);
    $question->bindParam(':question', $ques);
    $question->bindParam(':date', $date);
    $question->execute();
    return $question;
}

function selectAllUsersQuestions($idcat)
{
    $db = db();
    $userques = $db->prepare("SELECT id, user, email, category, question, date FROM users_questions WHERE category = :category");
    $userques->bindParam(':category', $idcat);
    $userques->execute();
    return $userques;
}

function selectIDUsersQuestion($idcat)
{
    $db = db();
    $userquestions = $db->prepare("SELECT COUNT(*) FROM users_questions WHERE category = :categoryId");
    $userquestions->bindParam(':categoryId', $idcat);
    $userquestions->execute();
    $countVariable = $userquestions->fetch(PDO::FETCH_NUM);
    return $countVariable[0];
}

/*function deleteUsersQuestion($idcat)
{
    $db = db();
    $uquesdel = $db->prepare('DELETE FROM `users_questions` WHERE category = :ucategory');
    $uquesdel->bindParam(':ucategory', $idcat);
    $uquesdel->execute();
    return $uquesdel;
}*/

function updateUsersQuestion($newname, $b)
{
    $db = db();
    $datadone = $db->prepare('UPDATE `users_questions` SET `user`=:user WHERE id = :id');
    $datadone->bindParam(':user', $newname);
    $datadone->bindParam(':id', $b);
    $datadone->execute();
    return $datadone;
}

function updateUsersQuestionQ($newquest, $a)
{
    $db = db();
    $updques  = $db->prepare('UPDATE `users_questions` SET `question`=:quest WHERE id = :id');
    $updques->bindParam(':quest', $newquest);
    $updques->bindParam(':id', $a);
    $updques->execute();
    return $updques;
}

function deleteUsersQuestionID($del)
{
    $db = db();
    $datadel = $db->prepare('DELETE FROM `users_questions` WHERE id = :id');
    $datadel->bindParam(':id', $del);
    $datadel->execute();
    return $datadel;
}

function updateUsersQuestionAuthor($newname, $author)
{
    $db = db();
    $datadone = $db->prepare('UPDATE `users_questions` SET `user`=:user WHERE login = :login');
    $datadone->bindParam(':user', $newname);
    $datadone->bindParam(':login', $author);
    $datadone->execute();
    return $datadone;
}


?>
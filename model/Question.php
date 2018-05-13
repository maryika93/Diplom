<?php

class Question
{
    public function selectQuestions()
    {
        $db   = db();
        $ques = $db->query('SELECT id, name, id_category, date, status, user, email FROM questions')->fetchAll();
        return $ques;
    }

    public function selectAllQuestions($categoryID)
    {
        $db       = db();
        $answques = $db->prepare("SELECT id, name, id_category, date, status, user, email FROM questions WHERE id_category = :qcategory");
        $answques->bindParam(':qcategory', $categoryID);
        $answques->execute();
        $result = $answques->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function selectIDQuestion($categoryID)
    {
        $db            = db();
        $answquestions = $db->prepare("SELECT COUNT(*) FROM questions WHERE id_category = :categoryId");
        $answquestions->bindParam(':categoryId', $categoryID);
        $answquestions->execute();
        $countVariable = $answquestions->fetch();
        return $countVariable[0];
    }

    public function deleteQuestionInCategory($idcat)
    {
        $db      = db();
        $quesdel = $db->prepare('DELETE FROM `questions` WHERE 	id_category = :qcategory');
        $quesdel->bindParam(':qcategory', $idcat);
        $quesdel->execute();
        return $quesdel;
    }

    public function deleteQuestionByID($del)
    {
        $db      = db();
        $datadel = $db->prepare('DELETE FROM `questions` WHERE id = :id');
        $datadel->bindParam(':id', $del);
        $datadel->execute();
        return $datadel;
    }

    public function deleteUsersQuestionByID($del)
    {
        $db      = db();
        $datadel = $db->prepare('DELETE FROM `users_questions` WHERE id = :id');
        $datadel->bindParam(':id', $del);
        $datadel->execute();
        return $datadel;
    }

    public function insertUsersQuestion($name, $email, $ques, $date, $categoryID)
    {
        $db       = db();
        $question = $db->prepare('INSERT INTO `users_questions`(`user`, `email`, `categoryID`, `question`, `date`) VALUES (:user, :email, :category, :question, :date)');
        $question->bindParam(':user', $name);
        $question->bindParam(':category', $categoryID);
        $question->bindParam(':email', $email);
        $question->bindParam(':question', $ques);
        $question->bindParam(':date', $date);
        $question->execute();
        return $question;
    }

    public function selectAllUsersQuestions($categoryID)
    {
        $db       = db();
        $userques = $db->prepare("SELECT id, user, email, categoryID, question,status, answer, date FROM users_questions WHERE categoryID = :categoryId");
        $userques->bindParam(':categoryId', $categoryID);
        $userques->execute();
        $result = $userques->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function selectIDUsersQuestion($categoryID)
    {
        $db            = db();
        $userquestions = $db->prepare("SELECT COUNT(*) FROM users_questions WHERE categoryID = :categoryId");
        $userquestions->bindParam(':categoryId', $categoryID);
        $userquestions->execute();
        $countVariable = $userquestions->fetch(PDO::FETCH_NUM);
        return $countVariable[0];
    }

    public function updateUsersQuestion($newname, $b)
    {
        $db       = db();
        $datadone = $db->prepare('UPDATE `users_questions` SET `user`=:user WHERE id = :id');
        $datadone->bindParam(':user', $newname);
        $datadone->bindParam(':id', $b);
        $datadone->execute();
        return $datadone;
    }

    public function updateAnsweredQuestion($newname, $b)
    {
        $db       = db();
        $datadone = $db->prepare('UPDATE `questions` SET `user`=:user WHERE id = :id');
        $datadone->bindParam(':user', $newname);
        $datadone->bindParam(':id', $b);
        $datadone->execute();
        return $datadone;
    }

    public function updateAnsweredQuestionCategory($newcat, $b)
    {
        $db       = db();
        $datadone = $db->prepare('UPDATE `questions` SET `id_category`=:category WHERE id = :id');
        $datadone->bindParam(':category', $newcat);
        $datadone->bindParam(':id', $b);
        $datadone->execute();
        return $datadone;
    }

    public function updateUsersQuestionQ($newquest, $a)
    {
        $db      = db();
        $updques = $db->prepare('UPDATE `users_questions` SET `question`=:quest WHERE id = :id');
        $updques->bindParam(':quest', $newquest);
        $updques->bindParam(':id', $a);
        $updques->execute();
        return $updques;
    }

    public function updateUsersQuestionCategory($newcat, $b)
    {
        $db       = db();
        $datadone = $db->prepare('UPDATE `users_questions` SET `categoryID`=:category WHERE id = :id');
        $datadone->bindParam(':category', $newcat);
        $datadone->bindParam(':id', $b);
        $datadone->execute();
        return $datadone;
    }

    public function updateUsersQuestionQAnswered($newquest, $a)
    {
        $db      = db();
        $updques = $db->prepare('UPDATE `questions` SET `name`=:quest WHERE id = :id');
        $updques->bindParam(':quest', $newquest);
        $updques->bindParam(':id', $a);
        $updques->execute();
        return $updques;
    }

    public function deleteUsersQuestionID($del)
    {
        $db      = db();
        $datadel = $db->prepare('DELETE FROM `users_questions` WHERE id = :id');
        $datadel->bindParam(':id', $del);
        $datadel->execute();
        return $datadel;
    }

    public function updateUsersQuestionAuthor($newname, $author)
    {
        $db       = db();
        $datadone = $db->prepare('UPDATE `users_questions` SET `user`=:user WHERE login = :login');
        $datadone->bindParam(':user', $newname);
        $datadone->bindParam(':login', $author);
        $datadone->execute();
        return $datadone;
    }
}
?>
<?php

class Question
{
    public function selectQuestions()
    {
        $db   = db();
        $ques = $db->query('SELECT id, question, id_category, date, status, name, email, hide FROM questions')->fetchAll();
        return $ques;
    }

    public function selectAllQuestions($id_category)
    {
        $db       = db();
        $answques = $db->prepare("SELECT id, question, id_category, date, status, name, email, hide, answer FROM questions WHERE id_category = :qcategory");
        $answques->bindParam(':qcategory', $id_category);
        $answques->execute();
        $result = $answques->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function selectIDQuestion($id_category)
    {
        $db            = db();
        $answquestions = $db->prepare("SELECT COUNT(*) FROM questions WHERE id_category = :id_category AND hide = 0");
        $answquestions->bindParam(':id_category', $id_category);
        $answquestions->execute();
        $countVariable = $answquestions->fetch();
        return $countVariable[0];
    }

    public function selectIDUsersQuestion($id_category){
        $db            = db();
        $answquestions = $db->prepare("SELECT COUNT(*) FROM questions WHERE id_category = :id_category AND hide = 1");
        $answquestions->bindParam(':id_category', $id_category);
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

    public function insertUsersQuestion($name, $email, $ques, $date, $id_category, $status, $hide)
    {
        $db       = db();
        $question = $db->prepare('INSERT INTO `questions`(`id_category`, `name`, `email`, `question`, `date`, `status`, hide) VALUES (:category, :name, :email, :question, :date, :status, :hide)');
        $question->bindParam(':name', $name);
        $question->bindParam(':category', $id_category);
        $question->bindParam(':email', $email);
        $question->bindParam(':question', $ques);
        $question->bindParam(':date', $date);
        $question->bindParam(':status', $status);
        $question->bindParam(':hide', $hide);
        $question->execute();
        return $question;
    }

    public function updateUsersQuestion($newname, $b)
    {
        $db       = db();
        $datadone = $db->prepare('UPDATE `questions` SET `name`=:name WHERE id = :id');
        $datadone->bindParam(':name', $newname);
        $datadone->bindParam(':id', $b);
        $datadone->execute();
        return $datadone;
    }

    public function updateUsersQuestionQ($newquest, $a)
    {
        $db      = db();
        $updques = $db->prepare('UPDATE `questions` SET `question`=:quest WHERE id = :id');
        $updques->bindParam(':quest', $newquest);
        $updques->bindParam(':id', $a);
        $updques->execute();
        return $updques;
    }

    public function updateUsersQuestionCategory($newcat, $b)
    {
        $db       = db();
        $datadone = $db->prepare('UPDATE `questions` SET `id_category`=:category WHERE id = :id');
        $datadone->bindParam(':category', $newcat);
        $datadone->bindParam(':id', $b);
        $datadone->execute();
        return $datadone;
    }

    public function hideUserQuestionAuthor($hide)
    {
        $db      = db();
        $datahide = $db->prepare('UPDATE `questions` SET `hide`= 1, `status`= :stat WHERE id = :id');
        $datahide->bindParam(':id', $hide);
        $stat = "Ожидает публикации";
        $datahide->bindParam(':stat', $stat);
        $datahide->execute();
        return $datahide;
    }

    public function showUserQuestionAuthor($show)
    {
        $db      = db();
        $datashow = $db->prepare('UPDATE `questions` SET `hide`= 0, `status`= :stat WHERE id = :id');
        $datashow->bindParam(':id', $show);
        $stat = "Оубликован";
        $datashow->bindParam(':stat', $stat);
        $datashow->execute();
        return $datashow;
    }

    public function updateUsersQuestionAuthor($newname, $author)
    {
        $db       = db();
        $datadone = $db->prepare('UPDATE `questions` SET `name`=:name WHERE login = :login');
        $datadone->bindParam(':name', $newname);
        $datadone->bindParam(':login', $author);
        $datadone->execute();
        return $datadone;
    }
}
?>
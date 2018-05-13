<?php

class Answer
{
    public function selectAnswers()
    {
        $db = db();
        $answers = $db->query('SELECT id, name, id_question, hide FROM answers')->fetchAll();
        return $answers;
    }
    public function updateAnswer($newname, $b)
    {
        $db = db();
        $datadone = $db->prepare('UPDATE `answers` SET `name`=:name WHERE id = :id');
        $datadone->bindParam(':name', $newname);
        $datadone->bindParam(':id', $b);
        $datadone->execute();
        return $datadone;
    }

    public function updateAnswerUser($newname, $b)
    {
        $db = db();
        $datadone = $db->prepare('UPDATE `users_questions` SET `answer`=:answer WHERE id = :id');
        $datadone->bindParam(':answer', $newname);
        $datadone->bindParam(':id', $b);
        $datadone->execute();
        return $datadone;
    }
}

?>

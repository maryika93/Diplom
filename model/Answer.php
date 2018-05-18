<?php

class Answer
{
    public function selectAnswers()
    {
        $db = db();
        $answers = $db->query('SELECT id, answer, hide FROM questions')->fetchAll();
        return $answers;
    }
    public function updateAnswer($newname, $b)
    {
        $db = db();
        $datadone = $db->prepare('UPDATE `questions` SET `answer`=:answer WHERE id = :id');
        $datadone->bindParam(':answer', $newname);
        $datadone->bindParam(':id', $b);
        $datadone->execute();
        return $datadone;
    }
}

?>

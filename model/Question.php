<?php

function selectQuestions()
{
    $db = db();
    $ques = $db->query('SELECT id, question, id_category, date, status FROM questions')->fetchAll();
    return $ques;
}

function selectAllQuestions($idcat)
{
    $db = db();
    $answques = $db->prepare("SELECT id, question, id_category, date, status FROM questions WHERE id_category = :qcategory");
    $answques->bindParam(':qcategory', $idcat);
    $answques->execute();
    return $answques;
}

function selectIDQuestion($idcat)
{
    $db = db();
    $answquestions = $db->prepare("SELECT COUNT(*) FROM questions WHERE id_category = :categoryId");
    $answquestions->bindParam(':categoryId', $idcat);
    $answquestions->execute();
    $countVariable = $answquestions->fetch();
    return $countVariable[0];
}

function deleteQuestionInCategory($idcat)
{
    $db = db();
    $quesdel = $db->prepare('DELETE FROM `questions` WHERE 	id_category = :qcategory');
    $quesdel->bindParam(':qcategory', $idcat);
    $quesdel->execute();
    return $quesdel;
}

function deleteQuestionByID($del)
{
    $db = db();
    $datadel = $db->prepare('DELETE FROM `questions` WHERE id = :id');
    $datadel->bindParam(':id', $del);
    $datadel->execute();
    return $datadel;
}
?>
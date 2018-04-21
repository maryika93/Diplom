<?php
require_once 'connectDB.php';

function selectQues()
{
    $db = db();
    $ques = $db->query('SELECT * FROM questions')->fetchAll();
    return $ques;
}

function selectAllQues($idcat)
{
    $db = db();
    $answques = $db->query("SELECT * FROM questions WHERE id_category = '$idcat'")->fetchAll();
    return $answques;
}

function selectIDQues($idcat)
{
    $db = db();
    $answquestions = count($db->query("SELECT id FROM questions WHERE id_category = '$idcat'")->fetchAll());
    return $answquestions;
}

function deleteQues($idcat)
{
    $db = db();
    $quesdel = $db->prepare('DELETE FROM `questions` WHERE 	id_category = :qcategory');
    $quesdel->bindParam(':qcategory', $idcat);
    $quesdel->execute();
    return $quesdel;
}

function deleteQuesID($del)
{
    $db = db();
    $datadel = $db->prepare('DELETE FROM `questions` WHERE id = :id');
    $datadel->bindParam(':id', $del);
    $datadel->execute();
    return $datadel;
}
?>
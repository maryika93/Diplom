<?php

function selectAnswers()
{
    $db = db();
    $answers = $db->query('SELECT id, name, id_question FROM answers')->fetchAll();
    return $answers;
}
?>
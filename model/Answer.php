<?php

function selectAnswers()
{
    $db = db();
    $answ = $db->query('SELECT id, answer, id_question FROM answers')->fetchAll();
    return $answ;
}
?>
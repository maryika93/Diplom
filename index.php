<?php
require_once 'vendor/autoload.php';
require_once 'model/connectDB.php';
require_once 'model/AnswersDB.php';
require_once 'model/CategoriesDB.php';
require_once 'model/QuestiomsDB.php';
require_once 'model/UsersDB.php';
require_once 'model/UsersQuestionsDB.php';

$loader = new Twig_Loader_Filesystem('templates');
$twig   = new Twig_Environment($loader, array(
    'cache' => 'cash',
    'auto_reload' => true));

$template = $twig->loadTemplate('index.tmpl');

$db = db();

$cat  = selectCat();
$ques = selectQues();
$answ = selectAnsw();

echo $twig->render($template, array('cat' => $cat, 'ques' => $ques, 'answ' => $answ));

if(!empty($_GET['send'])){
    $question = insertUsQues();
}

?>
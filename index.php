<?php
require_once 'vendor/autoload.php';
require_once 'lib/connect.php';
require_once 'model/Answer.php';
require_once 'model/Category.php';
require_once 'model/Question.php';
require_once 'model/User.php';
require_once 'model/User_question.php';

$loader = new Twig_Loader_Filesystem('templates');
$twig   = new Twig_Environment($loader, array(
    'cache' => 'cash',
    'auto_reload' => true));

$template = $twig->loadTemplate('index.twig');

$db = db();

$cat  = selectCategories();
$ques = selectQuestions();
$answ = selectAnswers();

echo $twig->render($template, array('cat' => $cat, 'ques' => $ques, 'answ' => $answ));

if(!empty($_GET['send'])){
    $name = $_GET['name'];
    $email = $_GET['email'];
    $ques = $_GET['question'];
    $date = date("y.m.d.H:i:s");
    $categ = $_GET['category'];
    $idcat = selectIDCategory($categ);

    foreach ($idcat as $cat){
        $categoryID = $cat['id'];
    }

    $question = insertUsersQuestion($name, $email, $ques, $date, $categoryID);
}

?>


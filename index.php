<?php
require_once 'vendor/autoload.php';
require_once 'lib/connect.php';
require_once 'model/Answer.php';
require_once 'model/Category.php';
require_once 'model/Question.php';
require_once 'model/User.php';

$loader = new Twig_Loader_Filesystem('templates');
$twig   = new Twig_Environment($loader, array(
    'cache' => 'cache',
    'auto_reload' => true));

$template = $twig->loadTemplate('index.twig');

$db = db();

$categories  = selectCategories();
$questions = selectQuestions();
$answers = selectAnswers();

echo $twig->render($template, array('categories' => $categories, 'questions' => $questions, 'answers' => $answers));

if(!empty($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $questions = $_POST['question'];
    $date = date("y.m.d.H:i:s");
    $category = $_POST['categoryID'];
    $question = insertUsersQuestion($name, $email, $questions, $date, $category);
}

?>


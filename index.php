<?php
require_once 'vendor/autoload.php';
require_once 'lib/connect.php';
require_once 'model/Answer.php';
require_once 'model/Category.php';
require_once 'model/Question.php';
require_once 'model/User.php';
require_once 'lib/twig.php';

$twig = twig();
$db = db();

$categories  = selectCategories();
$questions = selectQuestions();
$answers = selectAnswers();

echo $twig->render('index.twig', array('categories' => $categories, 'questions' => $questions, 'answers' => $answers));

if(!empty($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $questions = $_POST['question'];
    $date = date("y.m.d.H:i:s");
    $category = $_POST['categoryID'];
    $question = insertUsersQuestion($name, $email, $questions, $date, $category);
}

?>


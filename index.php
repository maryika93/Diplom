<?php
include 'lib/load.php';

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


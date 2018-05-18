<?php
include 'model/Answer.php';
include 'model/Category.php';
include 'model/Question.php';
include 'model/User.php';

$twig = twig();
$db = db();
$answer = new Answer();
$category = new Category();
$question = new Question();
$categories  = $category->selectCategories();
$questions = $question->selectQuestions();
$answers = $answer->selectAnswers();

echo $twig->render('index.twig', array('categories' => $categories, 'questions' => $questions, 'answers' => $answers));

if(!empty($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $questions = $_POST['question'];
    $date = date("y.m.d.H:i:s");
    $category = $_POST['id_category'];
    $status = "Ожидает публикации";
    $hide = 1;
    $question = $question->insertUsersQuestion($name, $email, $questions, $date, $category, $status, $hide);
}
<?php
include 'model/Answer.php';
include 'model/Category.php';
include 'model/Question.php';

$twig   = twig();
$answer = new Answer();
$category = new Category();
$question = new Question();
$categories  = $category->selectCategories();
$answers = $answer->selectAnswers();

if(isset($_POST['seequestions'])){

    $id_category = $_POST['id_category'];
    $answeredQuestions = $question->selectIDQuestion($id_category);
    $userQuestions = $question->selectIDUsersQuestion($id_category);
    $numberquestions = $answeredQuestions + $userQuestions;

    $allAnsweredQuestions = $question->selectAllQuestions($id_category);
}
else{
    $answeredQuestions = null;
    $userQuestions = null;
    $numberquestions = null;
    $allAnsweredQuestions = null;
}
if (!empty($_POST)) {

    if (isset($_POST['updateAuthor'])) {
        $b        = $_POST['updateAuthor']; //id
        $newname  = $_POST['authorName'][$b];
        $datadone = $question->updateUsersQuestion($newname, $b);
    }
    if (isset($_POST['updateQuestion'])) {
        $a        = $_POST['updateQuestion']; //id
        $newquest = $_POST['newquestion'][$a];
        $updques  = $question->updateUsersQuestionQ($newquest, $a);
    }

    if (isset($_POST['changeCategory'])) {
        $a        = $_POST['changeCategory']; //id
        $newcat = $_POST['newid_category'][$a];
        $datadone = $question->updateUsersQuestionCategory($newcat, $a);
    }

    if (isset($_POST['updateAnswer'])) {
        $a        = $_POST['updateAnswer']; //id
        $newname = $_POST['answer'][$a];
        $answer->updateAnswer($newname, $a);
    }
}

if (!empty($_GET)) {

    if (isset($_GET['deleteAnsweredQuestion'])) {
        $del     = $_GET['deleteAnsweredQuestion'];
        $datadel = $question->deleteQuestionByID($del);
    }

    if(isset($_GET['changeauthor'])){
        $author = $_GET['changeauthor'];
        $newname = $_POST['authorname'];
        $datadone = $question->updateUsersQuestionAuthor($newname, $author);
    }

    if(isset($_GET['hideQuestion'])){
        $hide = $_GET['hideQuestion'];
        $datadone = $question->hideUserQuestionAuthor($hide);
    }

    if(isset($_GET['showQuestion'])){
        $show = $_GET['showQuestion'];
        $datadone = $question->showUserQuestionAuthor($show);
    }

    echo $twig->render('editCategory.twig', array('categories' => $categories, 'answers' => $answers, 'answeredQuestions' => $answeredQuestions, 'userQuestions' => $userQuestions, 'numberquestions' => $numberquestions,
        'allAnsweredQuestions' => $allAnsweredQuestions));
}
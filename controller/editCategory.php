<?php
include 'model/Answer.php';
include 'model/Category.php';
include 'model/Question.php';

$twig   = twig();
$db = db();
$answer = new Answer();
$category = new Category();
$Question = new Question();
$categories  = $category -> selectCategories();
$answers = $answer -> selectAnswers();

if(isset($_POST['seequestions'])){

    $categoryID = $_POST['categoryID'];
    $answeredQuestions = $Question -> selectIDQuestion($categoryID);
    $userQuestions = $Question -> selectIDUsersQuestion($categoryID);
    $numberquestions = $answeredQuestions + $userQuestions;

    $allAnsweredQuestions = $Question -> selectAllQuestions($categoryID);
    $allUsersQuestions = $Question -> selectAllUsersQuestions($categoryID);
}
else{
    $answeredQuestions = null;
    $userQuestions = null;
    $numberquestions = null;
    $allAnsweredQuestions = null;
    $allUsersQuestions = null;
}
echo $twig->render('editCategory.twig', array('categories' => $categories, 'answers' => $answers, 'answeredQuestions' => $answeredQuestions, 'userQuestions' => $userQuestions, 'numberquestions' => $numberquestions,
    'allAnsweredQuestions' => $allAnsweredQuestions, 'allUsersQuestions' => $allUsersQuestions));
if (!empty($_POST)) {


    if (isset($_POST['updateAuthor'])) {
        $b        = $_POST['updateAuthor']; //id
        $newname  = $_POST['authorName'][$b];
        $datadone = $Question -> updateUsersQuestion($newname, $b);
    }
    if (isset($_POST['updateAuthorAnswered'])) {
        $b        = $_POST['updateAuthorAnswered']; //id
        $newname  = $_POST['authorNameAnswered'][$b];
        $datadone = $Question -> updateAnsweredQuestion($newname, $b);
    }

    if (isset($_POST['updateQuestion'])) {
        $a        = $_POST['updateQuestion']; //id
        $newquest = $_POST['newquestion'][$a];
        $updques  = $Question -> updateUsersQuestionQ($newquest, $a);
    }

    if (isset($_POST['updateQuestionAnswered'])) {
        $a        = $_POST['updateQuestionAnswered']; //id
        $newquest = $_POST['newquestionAnswered'][$a];
        $updques  = $Question -> updateUsersQuestionQAnswered($newquest, $a);
    }

    if (isset($_POST['changeCategory'])) {
        $a        = $_POST['changeCategory']; //id
        $newcat = $_POST['newCategoryID'][$a];
        $datadone = $Question -> updateAnsweredQuestionCategory($newcat, $a);
    }

    if (isset($_POST['changeCategoryUsers'])) {
        $a        = $_POST['changeCategoryUsers']; //id
        $newcat = $_POST['newCategoryIDUsers'][$a];
        $datadone = $Question -> updateUsersQuestionCategory($newcat, $a);
    }

    if (isset($_POST['updateAnswer'])) {
        $a        = $_POST['updateAnswer']; //id
        $newname = $_POST['answer'][$a];
        $answer -> updateAnswer($newname, $a);
    }

    if (isset($_POST['updateAnswerUser'])) {
        $a        = $_POST['updateAnswerUser']; //id
        $newname = $_POST['answerUser'][$a];
        $answer -> updateAnswerUser($newname, $a);
    }
}

if (!empty($_GET)) {

    if (isset($_GET['deleteAnsweredQuestion'])) {
        $del     = $_GET['deleteAnsweredQuestion'];
        $datadel = $Question -> deleteQuestionByID($del);
    }
    if (isset($_GET['deleteQuestion'])) {
        $delete    = $_GET['deleteQuestion'];
        $datadelete = $Question -> deleteUsersQuestionByID($delete);
    }

    if(isset($_GET['changeauthor'])){
        $author = $_GET['changeauthor'];
        $newname = $_POST['authorname'];
        $datadone = $Question -> updateUsersQuestionAuthor($newname, $author);
    }
}
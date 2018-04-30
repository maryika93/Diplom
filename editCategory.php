<?php
require_once 'vendor/autoload.php';
require_once 'lib/connect.php';
require_once 'model/Answer.php';
require_once 'model/Category.php';
require_once 'model/Question.php';

$loader = new Twig_Loader_Filesystem('templates');
$twig   = new Twig_Environment($loader, array(
    'cache' => 'cache',
    'auto_reload' => true));

$template = $twig->loadTemplate('editCategory.twig');

$db = db();
$categories  = selectCategories();

if(isset($_POST['seequestions'])){

    $categoryID = $_POST['categoryID'];
    $answeredQuestions = selectIDQuestion($categoryID);
    $userQuestions = selectIDUsersQuestion($categoryID);
    $numberquestions = $answeredQuestions + $userQuestions;

    $allAnsweredQuestions = selectAllQuestions($categoryID);
    $allUsersQuestions = selectAllUsersQuestions($categoryID);

}
else{
    $answeredQuestions = null;
    $userQuestions = null;
    $numberquestions = null;
    $allAnsweredQuestions = null;
    $allUsersQuestions = null;
}
echo $twig->render($template, array('categories' => $categories,'answeredQuestions' => $answeredQuestions, 'userQuestions' => $userQuestions, 'numberquestions' => $numberquestions,
    'allAnsweredQuestions' => $allAnsweredQuestions, 'allUsersQuestions' => $allUsersQuestions));
if (!empty($_POST)) {


    if (isset($_POST['updateAuthor'])) {
        $b        = $_POST['updateAuthor']; //id
        $newname  = $_POST['authorName'][$b];
        $datadone = updateUsersQuestion($newname, $b);
    }
    if (isset($_POST['updateAuthorAnswered'])) {
        $b        = $_POST['updateAuthorAnswered']; //id
        $newname  = $_POST['authorNameAnswered'][$b];
        $datadone = updateAnsweredQuestion($newname, $b);
    }

    if (isset($_POST['updateQuestion'])) {
        $a        = $_POST['updateQuestion']; //id
        $newquest = $_POST['newquestion'][$a];
        $updques  = updateUsersQuestionQ($newquest, $a);
    }

    if (isset($_POST['updateQuestionAnswered'])) {
        $a        = $_POST['updateQuestionAnswered']; //id
        $newquest = $_POST['newquestionAnswered'][$a];
        $updques  = updateUsersQuestionQAnswered($newquest, $a);
    }

    if (isset($_POST['changeCategory'])) {
        $a        = $_POST['changeCategory']; //id
        $newcat = $_POST['newCategoryID'][$a];
        $datadone = updateAnsweredQuestionCategory($newcat, $a);
    }

    if (isset($_POST['changeCategoryUsers'])) {
        $a        = $_POST['changeCategoryUsers']; //id
        $newcat = $_POST['newCategoryIDUsers'][$a];
        $datadone = updateUsersQuestionCategory($newcat, $a);
    }
}

if (!empty($_GET)) {

    if (isset($_GET['deleteAnsweredQuestion'])) {
        $del     = $_GET['deleteAnsweredQuestion'];
        $datadel = deleteQuestionByID($del);
    }
    if (isset($_GET['deleteQuestion'])) {
        $del     = $_GET['deleteQuestion'];
        $datadel = deleteUsersQuestionByID($del);
    }

    if(isset($_GET['changeauthor'])){
        $author = $_GET['changeauthor'];
        $newname = $_POST['authorname'];
        $datadone = updateUsersQuestionAuthor($newname, $author);
        die;
    }
}
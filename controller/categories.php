<?php
include 'lib/load.php';
include 'model/Answer.php';
include 'model/Category.php';
include 'model/Question.php';

$twig   = twig();
$db = db();
$categories  = selectCategories();$categories  = selectCategories();

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

echo $twig->render('categories.twig', array('categories' => $categories, 'answeredQuestions' => $answeredQuestions, 'userQuestions' => $userQuestions, 'numberquestions' => $numberquestions,
    'allAnsweredQuestions' => $allAnsweredQuestions, 'allUsersQuestions' => $allUsersQuestions));

if(isset($_POST['deletecat'])){
    $delcat = $_POST['categoryID'];
    $catdel = deleteCategory($delcat);
    $categ = $_POST['categoryID'];
    $uquesdel = deleteQuestionInCategory($categ);
    die;
}
    if(isset($_POST['createnewcat'])) {
        $newcategory = $_POST['newcat'];
        $newcat = insertCategory($newcategory);
        die;

}

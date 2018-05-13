<?php
include 'model/Category.php';
include 'model/Question.php';

$twig   = twig();
$db = db();
$category = new Category();
$Question = new Question();
$categories = $category -> selectCategories();

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

echo $twig->render('categories.twig', array('categories' => $categories, 'answeredQuestions' => $answeredQuestions, 'userQuestions' => $userQuestions, 'numberquestions' => $numberquestions,
    'allAnsweredQuestions' => $allAnsweredQuestions, 'allUsersQuestions' => $allUsersQuestions));

if(isset($_POST['deletecat'])){
    $delcat = $_POST['categoryID'];
    $catdel = $category -> deleteCategory($delcat);
    $categ = $_POST['categoryID'];
    $uquesdel = $Question -> deleteQuestionInCategory($categ);
    die;
}
    if(isset($_POST['createnewcat'])) {
        $newcategory = $_POST['newcat'];
        $newcat = $category -> insertCategory($newcategory);
        die;

}

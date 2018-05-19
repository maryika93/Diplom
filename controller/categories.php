<?php
include 'model/Category.php';
include 'model/Question.php';

$twig   = twig();
$category = new Category();
$question = new Question();
$categories = $category->selectCategories();

if(isset($_POST['seequestions'])){

    $categoryID = $_POST['categoryID'];
    $answeredQuestions = $question->selectIDQuestion($categoryID);
    $userQuestions = $question->selectIDUsersQuestion($categoryID);
    $numberquestions = $answeredQuestions + $userQuestions;
    $allAnsweredQuestions = $question->selectAllQuestions($categoryID);

} else{
    $answeredQuestions = null;
    $userQuestions = null;
    $numberquestions = null;
    $allAnsweredQuestions = null;
}

if(isset($_POST['deletecat'])){
    $delcat = $_POST['categoryID'];
    $catdel = $category->deleteCategory($delcat);
    $categ = $_POST['categoryID'];
    $uquesdel = $question->deleteQuestionInCategory($categ);
    die;
}
    if(isset($_POST['createnewcat'])) {
        $newcategory = $_POST['newcat'];
        $newcat = $category->insertCategory($newcategory);
        die;

}
echo $twig->render('categories.twig', array('categories' => $categories, 'answeredQuestions' => $answeredQuestions, 'userQuestions' => $userQuestions, 'numberquestions' => $numberquestions,
    'allAnsweredQuestions' => $allAnsweredQuestions));
header('Location: categories.php');

?>

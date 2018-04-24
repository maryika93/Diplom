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

    $template = $twig->loadTemplate('admin_index.twig');

    $db = db();

    $err = "";
    $users  = selectUsers();
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

    if (!empty($_POST)) {

        if (isset($_POST['registrate'])) {

            if (!empty($_POST['login'])) {
                $login = $_POST['login'];
                $data = selectAllUsers($login);
            }
            if (!empty($_POST['password'])) {
                $password = md5($_POST['password']);
            }

                if (!empty($data[0]['id'])) {
                    $err = "Извините, введённый вами логин уже зарегистрирован. Введите другой логин";
                }
                else{
                if(isset($login) & isset($password)){
                    $result = insertUser($login, $password);
                }
                else{
                    $err = "Введите желаемый логин и пароль";
                }
                }
        }

        if(isset($_POST['change'])){
            $newpassword = md5($_POST['newpassword']);
            $newlogin = $_POST['admins'];
            $datadone = updateUser($newpassword, $newlogin);
            die;
        }

        if(isset($_POST['deleteadmin'])){
            $login = $_POST['admins'];
            $datadel = deleteUser($login);
            die;
        }

        if(isset($_POST['createnewcat'])) {
            $newcategory = $_POST['newcat'];
            $newcat = insertCategory($newcategory);
            die;
        }

        if(isset($_POST['deletecat'])){
            $delcat = $_POST['categories'];
            $catdel = deleteCategory($delcat);
            $categ = $_POST['categoryID'];
            $uquesdel = deleteQuestionInCategory($categ);
            die;
        }

        if (isset($_POST['updateAuthor'])) {
            $b        = $_POST['updateAuthor']; //id
            $newname  = $_POST['authorName'];
            $datadone = updateUsersQuestion($newname, $b);
        }

        if (isset($_POST['updateQuestion'])) {
            $newquest = $_POST['newquestion'];
            $a        = $_POST['updateQuestion']; //id
            $updques  = updateUsersQuestionQ($newquest, $a);
        }
    }

if (!empty($_GET)) {

    if (isset($_GET['deleteuser'])) {
        $del     = $_GET['deleteuser'];
        $datadel = deleteUsersQuestionID($del);
    }

    if (isset($_GET['deleteansw'])) {
        $del     = $_GET['deleteansw'];
        $datadel = deleteQuestionByID($del);
    }

    if(isset($_GET['changeauthor'])){
        $author = $_GET['changeauthor'];
        $newname = $_POST['authorname'];
        $datadone = updateUsersQuestionAuthor($newname, $author);
        die;
    }
}

echo $twig->render($template, array('users' => $users, 'categories' => $categories, 'answeredQuestions' => $answeredQuestions, 'userQuestions' => $userQuestions, 'numberquestions' => $numberquestions,
    'allAnsweredQuestions' => $allAnsweredQuestions, 'allUsersQuestions' => $allUsersQuestions, 'err' => $err));
<?php
require_once 'vendor/autoload.php';
require_once 'lib/connect.php';
require_once 'model/Answer.php';
require_once 'model/Category.php';
require_once 'model/Question.php';
require_once 'model/User.php';
require_once 'model/User_question.php';


    $loader = new Twig_Loader_Filesystem('templates');
    $twig   = new Twig_Environment($loader, array(
        'cache' => 'cash',
        'auto_reload' => true));

    $template = $twig->loadTemplate('admin_index.twig');

    $db = db();

    $users  = selectUsers();
    $cats  = selectCategories();

    if(isset($_POST['seeques'])){

        $categ = $_POST['categories'];
        foreach ($cats as $cat){
            if ($cat['category'] == $categ){
                $idcat = $cat['id'];
            }
        }
        $answquestions = selectIDQuestion($idcat);
        $userquestions = selectIDUsersQuestion($idcat);
        $numberquestions = $answquestions + $userquestions;

        $answques = selectAllQuestions($idcat);
        $userques = selectAllUsersQuestions($idcat);

    }
    else{
        $answquestions = null;
        $userquestions = null;
        $numberquestions = null;
        $answques = null;
        $userques = null;
    }


    echo $twig->render($template, array('users' => $users, 'cats' => $cats, 'answquestions' => $answquestions, 'userquestions' => $userquestions, 'numberquestions' => $numberquestions,
        'answques' => $answques, 'userques' => $userques));




    if (!empty($_POST)) {

        if (isset($_POST['reg'])) {

            if (isset($_POST['login'])) {
                $login = $_POST['login'];
            }
            if (isset($_POST['password'])) {
                $password = md5($_POST['password']);
            }
            $data = selectAllUsers($login);
            foreach ($data as $rows) {
                if (!empty($rows['id'])) {
                    exit("Извините, введённый вами логин уже зарегистрирован. Введите другой логин. </br></br></br> <a href='reg.php'>Вернуться</a>");
                }
            }
            $result = insertUser($login, $password);
            die;
        }

        if(isset($_POST['change'])){
            $newpassword = md5($_POST['newpassword']);
            $newlog = $_POST['admins'];
            $datadone = updateUser($newpassword, $newlog);
            die;
        }

        if(isset($_POST['deleteadmin'])){
            $log = $_POST['admins'];
            $datadel = deleteUser($log);
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

            $categ = $_POST['categories'];
            foreach ($cats as $cat){
                if ($cat['category'] == $categ){
                    $idcat = $cat['id'];
                }
            }
            $uquesdel = deleteQuestionInCategory($idcat);
            die;
        }
        foreach ($_POST as $key => $value){
            if($key[0] === 'b' && $value !== '') {
                if (isset($_POST['authorname'])) {
                    $b        = substr($key, 1); //id
                    $newname  = $_POST['authorname'];
                    $datadone = updateUsersQuestion($newname, $b);
                }
            }
            if($key[0] === 'a' && $value !== ''){
                if (isset($_POST['questext'])) {
                    $newquest = $_POST['questext'];
                    $a        = substr($key, 1); //id
                    $updques  = updateUsersQuestionQ($newquest, $a);
                }
            }
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
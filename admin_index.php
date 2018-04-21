<?php
require_once 'vendor/autoload.php';
require_once 'model/connectDB.php';
require_once 'model/AnswersDB.php';
require_once 'model/CategoriesDB.php';
require_once 'model/QuestiomsDB.php';
require_once 'model/UsersDB.php';
require_once 'model/UsersQuestionsDB.php';


    $loader = new Twig_Loader_Filesystem('templates');
    $twig   = new Twig_Environment($loader, array(
        'cache' => 'cash',
        'auto_reload' => true));

    $template = $twig->loadTemplate('admin_index.tmpl');

    $db = db();

    $users  = selectUs();
    $cats  = selectCat();

    if(isset($_POST['seeques'])){

        $categ = $_POST['categories'];
        foreach ($cats as $cat){
            if ($cat['category'] == $categ){
                $idcat = $cat['id'];
            }
        }
        $answquestions = selectIDQues($idcat);
        $userquestions = selectIDUsQues($idcat);
        $numberquestions = $answquestions + $userquestions;

        $answques = selectAllQues($idcat);
        $userques = selectAllUsQues($idcat);

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
            $data = selectAllUs($login);
            foreach ($data as $rows) {
                if (!empty($rows['id'])) {
                    exit("Извините, введённый вами логин уже зарегистрирован. Введите другой логин. </br></br></br> <a href='reg.php'>Вернуться</a>");
                }
            }
            $result = insertUs($login, $password);
            die;
        }

        if(isset($_POST['change'])){
            $newpassword = md5($_POST['newpassword']);
            $newlog = $_POST['admins'];
            $datadone = updateUs($newpassword, $newlog);
            die;
        }

        if(isset($_POST['deleteadmin'])){
            $log = $_POST['admins'];
            $datadel = deleteUs($log);
            die;
        }

        if(isset($_POST['createnewcat'])) {
            $newcategory = $_POST['newcat'];
            $newcat = insertCat($newcategory);
            die;
        }

        if(isset($_POST['deletecat'])){
            $delcat = $_POST['categories'];
            $catdel = deleteCat($delcat);

            $categ = $_POST['categories'];
            foreach ($cats as $cat){
                if ($cat['category'] == $categ){
                    $idcat = $cat['id'];
                }
            }
            $uquesdel = deleteQues($idcat);
            die;
        }
        foreach ($_POST as $key => $value){
            if($key[0] === 'b' && $value !== '') {
                if (isset($_POST['authorname'])) {
                    $b        = substr($key, 1); //id
                    $newname  = $_POST['authorname'];
                    $datadone = updateUsQues($newname, $b);
                }
            }
            if($key[0] === 'a' && $value !== ''){
                if (isset($_POST['questext'])) {
                    $newquest = $_POST['questext'];
                    $a        = substr($key, 1); //id
                    $updques  = updateUsQuesQ($newquest, $a);
                }
            }
        }
    }

if (!empty($_GET)) {

    if (isset($_GET['deleteuser'])) {
        $del     = $_GET['deleteuser'];
        $datadel = deleteUsQuesID($del);
    }

    if (isset($_GET['deleteansw'])) {
        $del     = $_GET['deleteansw'];
        $datadel = deleteQuesID($del);
    }

    if(isset($_GET['changeauthor'])){
        $author = $_GET['changeauthor'];
        $newname = $_POST['authorname'];
        $datadone = updateUsQuesLog($newname, $author);
        die;
    }
}
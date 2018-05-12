<?php
include 'lib/load.php';

if (!isset($_SESSION['login'])){
    include 'controller/auth.php';
    exit;
}

if (isset($_GET['c'])) {
    if ($_GET['c'] == 'administrators') {
        include 'controller/administrators.php';
    }
    if ($_GET['c'] == 'categories') {
        include 'controller/categories.php';
    }
    if ($_GET['c'] == 'editCategory') {
        include 'controller/editCategory.php';
    }
    if ($_GET['c'] == 'logout') {
        include 'controller/logout.php';
    }
}   else {
    include 'controller/adminIndex.php';
}

?>
<?php
require_once 'vendor/autoload.php';
require_once 'model/User.php';
require_once 'lib/connect.php';

if (!isset($_POST['inp'])) {
    include 'controller/auth.php';
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
        }
?>
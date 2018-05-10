<?php
require_once 'vendor/autoload.php';
require_once 'lib/twig.php';

$err      = "";
$twig = twig();
echo $twig->render('admin_index.twig', array('err' => $err));

?>
<?php
require_once 'vendor/autoload.php';

$loader   = new Twig_Loader_Filesystem('templates');
$twig     = new Twig_Environment($loader, array(
    'cache' => 'cash',
    'auto_reload' => true));
$err      = "";
$template = $twig->loadTemplate('admin_index.twig');
echo $twig->render($template, array('err' => $err));

?>
<?php

$err      = "";
$twig = twig();
echo $twig->render('admin_index.twig', array('err' => $err));

?>
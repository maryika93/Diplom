<?php

function twig() {
$loader   = new Twig_Loader_Filesystem('templates');
        $twig     = new Twig_Environment($loader, array(
            'cache' => 'cache',
            'auto_reload' => true));
return $twig;
}
?>
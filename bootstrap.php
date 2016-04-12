<?php

// include autoloader
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$twigLoader = new Twig_Loader_Filesystem(__DIR__.'/views');
$twig = new Twig_Environment($twigLoader, [
    'cache' => __DIR__.'/cache',
]);

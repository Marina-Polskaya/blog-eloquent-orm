<?php
include '../src/config.php';
include '../vendor/autoload.php';
include '../src/eloquent.php';

$route = new \Base\Route();


$app = new \Base\Application();
$app->run();

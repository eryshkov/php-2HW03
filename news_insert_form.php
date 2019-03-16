<?php
require __DIR__ . '/autoload.php';

$view = new \App\View();
$view->display(__DIR__ . '/templates/news_create.php');

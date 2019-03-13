<?php

require __DIR__ . '/autoload.php';

$view = new \App\View();

if (isset($_GET['info'])) {
    $view->info = $_GET['info'];
}

$view->articles = \App\Models\Article::getAllLast();

$view->display(__DIR__ . '/templates/news_admin.php');

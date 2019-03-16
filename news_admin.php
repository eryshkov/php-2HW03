<?php
require __DIR__ . '/autoload.php';

$view = new \App\View();
$view->articles = \App\Models\Article::getAllLast();
$view->display(__DIR__ . '/templates/news_admin.php');

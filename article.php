<?php

require __DIR__ . '/autoload.php';

$view = new \App\View();
$view->article = \App\Models\Article::findById((int)$_GET['id']);

$view->display(__DIR__ . '/templates/article.php');

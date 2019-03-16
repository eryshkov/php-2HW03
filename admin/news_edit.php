<?php
require __DIR__ . '/../autoload.php';

$view = new \App\View();

if (isset($_GET['id'])) {
    $view->article = \App\Models\Article::findById($_GET['id']);
    if (false === $view->article) {
        header('Location:' . '/admin/news_admin.php');
        exit();
    }
}

$view->display(__DIR__ . '/../templates/news_edit.php');

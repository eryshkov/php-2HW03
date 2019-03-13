<?php

require __DIR__ . '/autoload.php';

$view = new \App\View();

if (isset($_GET['id'])) {
    $view->article = \App\Models\Article::findById($_GET['id']);
    if (false === $view->article) {
        header('Location:' . '/news_admin.php?info=find_err');
        exit();
    }
}

if (isset($_POST['title'], $_POST['content'], $_POST['id'])) {
    $article = \App\Models\Article::findById($_POST['id']);
    if (false === $article) {
        header('Location:' . '/news_admin.php?info=edit_err');
        exit();
    }

    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->update();

    header('Location:' . '/news_admin.php');
    exit();
}

$view->display(__DIR__ . '/templates/news_edit.php');

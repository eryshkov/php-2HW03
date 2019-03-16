<?php
require __DIR__ . '/../autoload.php';

if (isset($_POST['title'], $_POST['content'])) {
    $article = new \App\Models\Article();

    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->insert();

    header('Location:' . '/admin/news_admin.php');
    exit();
}

$view = new \App\View();
$view->display(__DIR__ . '/../templates/news_create.php');

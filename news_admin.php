<?php

require __DIR__ . '/autoload.php';

if (isset($_GET['info'])) {
    $info = $_GET['info'];
}

$articles = \App\Models\Article::getAllLast();

include __DIR__ . '/templates/news_admin.php';

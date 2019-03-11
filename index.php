<?php

require __DIR__ . '/autoload.php';

$articles = \App\Models\Article::getAllLast(3);

include __DIR__ . '/templates/news.php';

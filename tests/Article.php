<?php

use App\Models\Article;

require __DIR__ . '/../autoload.php';

$id = '1';
$article = Article::findById($id);
assert($article instanceof Article);
assert($id === $article->id);

$id = '80';
$article = Article::findById($id);
assert(is_bool($article));
assert(false === $article);

$limit = 3;
$articles = Article::getAllLast($limit);
assert($limit === count($articles));

$article = Article::findById(1);
assert($article->update());

$article = Article::findById(1);

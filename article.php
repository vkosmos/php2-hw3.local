<?php

use App\Models\Article;

require __DIR__ . '/App/autoload.php';

$view = new \App\View();
$id = (int)$_GET['id'];
$view->article = Article::findById($id);
$view->display( __DIR__ . '/templates/article.php' );

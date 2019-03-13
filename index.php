<?php

use App\Models\Article;

require __DIR__ . '/App/autoload.php';

$view = new \App\View();
$view->news = Article::findN(3);
$view->display(__DIR__ . '/templates/index.php');
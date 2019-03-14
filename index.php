<?php

use App\Models\Article;

require __DIR__ . '/App/autoload.php';

$view = new \App\View();
$view->news = Article::findN(3);
//$view->display(__DIR__ . '/templates/index.php');

$view->authors = \App\Models\Author::findAll();
$view->users = \App\Models\User::findAll();

foreach ($view as $key => $value){

    var_dump($key, $value);
    echo "\n";

}




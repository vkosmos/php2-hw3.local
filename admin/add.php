<?php

include __DIR__ . '/../App/autoload.php';

if ('POST' === $_SERVER['REQUEST_METHOD']){

    $article = new \App\Models\Article();
    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->save();

    header('Location: ' . '/admin/');
}

$view = new \App\View();
$view->display( __DIR__ . '/../templates/admin/add.php' );

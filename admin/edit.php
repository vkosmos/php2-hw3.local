<?php

include __DIR__ . '/../App/autoload.php';

use App\Models\Article;

if ('POST' === $_SERVER['REQUEST_METHOD']){

    $article = Article::findById($_POST['id']);
    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->save();

    header('Location: ' . '/admin/');
}

$id = (int)$_GET['id'];
$view = new \App\View();
$view->article = Article::findById($id);
$view->display( __DIR__ . '/../templates/admin/edit.php' );

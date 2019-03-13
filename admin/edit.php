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

$id = $_GET['id'];
$article = Article::findById($id);

include __DIR__ . '/../templates/admin/edit.php';

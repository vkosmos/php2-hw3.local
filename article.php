<?php

use App\Models\Article;

require __DIR__ . '/App/autoload.php';

$article = null;

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $article = Article::findById($id);
}

include __DIR__ . '/templates/article.php';

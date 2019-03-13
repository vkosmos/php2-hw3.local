<?php

use App\Models\Article;

require __DIR__ . '/../App/autoload.php';

$data = Article::findAll();
include __DIR__ . '/../templates/admin/index.php';
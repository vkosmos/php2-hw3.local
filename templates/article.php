<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="/templates/css/style.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>HW1. Новость подробно</title>
</head>
<body>
<h1>Новость подробно</h1>

<p>
    <a class="button" href="index.php">Вернуться к списку новостей</a>
</p>


<?php
    if (false === $article){
?>
        <p>
            Такой новости не существует.
        </p>
        <a href="index.php">Вернуться к списку новостей</a>
<?php
        die;
    }
?>

    <article class="article">
        <h2><?=$article->title;?></h2>
        <p><?=$article->content;?></p>
    </article>


</body>
</html>
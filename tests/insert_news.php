<?php

use App\Db;

require __DIR__ . '/../autoload.php';
require __DIR__ . '/../lib.php';

$dbh = new Db();

$sql = 'INSERT INTO news (title, content) VALUES (:t, :c)';

$title = random_str(100);
$content = random_str(1000);
$params = [':t' => $title, ':c' => $content];

if ( $dbh->execute($sql, $params) ) {
    echo 'Новая случайная новость успешно добавлена. Проверьте таблицу news.';
}
else {
    echo('Ошибка при добавлении новой случайной новости.');
}

?>
    <p><a href="/tests/">В список тестов</a></p>
    <p><a href="/">На главную</a></p>

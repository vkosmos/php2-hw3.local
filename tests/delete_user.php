<?php

use App\Db;

require __DIR__ . '/../autoload.php';
require __DIR__ . '/../lib.php';

$dbh = new Db();

$sql = 'DELETE FROM news WHERE id = (SELECT x.id FROM (SELECT MAX(news.id) AS id FROM news) x)';
$params = [];

if ( $dbh->execute($sql, $params) ) {
    echo 'Последняя добавленная новость была успешно удалена.';
}
else{
    echo('Ошибка при удалении последней новости.');
}

?>
    <p><a href="/tests/">В список тестов</a></p>
    <p><a href="/">На главную</a></p>

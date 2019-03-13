<?php

use App\Db;

require __DIR__ . '/../autoload.php';
require __DIR__ . '/../lib.php';

$dbh = new Db();

$sql = 'DELETE FROM users WHERE id = (SELECT x.id FROM (SELECT MAX(users.id) AS id FROM users) x)';
$params = [];

if ( $dbh->execute($sql, $params) ) {
    echo 'Последний добавленный пользователь был успешно удален.';
}
else{
    echo('Ошибка при удалении последнего пользователя.');
}

?>
    <p><a href="/tests/">В список тестов</a></p>
    <p><a href="/">На главную</a></p>

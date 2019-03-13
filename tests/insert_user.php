<?php

use App\Db;

require __DIR__ . '/../autoload.php';
require __DIR__ . '/../lib.php';

$dbh = new Db();

$sql = 'INSERT INTO users (email, password) VALUES (:e, :p)';

$email = random_str(5) . '@' . random_str(5) . '.com';
$password = random_str(10);
$params = [':e' => $email, ':p' => $password];

if ( $dbh->execute($sql, $params) ) {
    echo 'Новый случайный пользователь успешно добавлен. Проверьте таблицу users.';
}
else {
    echo('Ошибка при добавлении нового случайного пользователя.');
}

?>
    <p><a href="/tests/">В список тестов</a></p>
    <p><a href="/">На главную</a></p>

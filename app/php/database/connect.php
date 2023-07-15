<?php
$driver = 'mysql';
$host = 'localhost';
$db_name = 'm300xt_amis';
$db_user = 'YULIA';
$db_pass = '1111';
$charset = 'utf8mb4';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

TRY{
    $pdo = new PDO(
    "$driver:host=$host;dbname=$db_name;charset=$charset",
    $db_user, $db_pass, $options
);
}catch (PDOException $i){
    die("Ошибка подключения к БД");
}
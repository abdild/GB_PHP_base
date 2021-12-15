<?php
include('../configs/config_vars.php'); // Переменные
include('../configs/config_db.php'); // Конфигурации подключения к БД
include('../manage/models/QueriesToDB.php'); // Запросы к БД

// Разбираем пришедшие из формы данные
$name = filter_var($_POST["name"], FILTER_SANITIZE_STRING); // Имя комментирующего
$text = filter_var($_POST["text"], FILTER_SANITIZE_STRING);  // Текст комментария
$id = filter_var((int)$_GET["id"], FILTER_SANITIZE_NUMBER_INT);; // id карточки
// $time = strtotime('now'); // Текущее время
$date = date('Y.m.d');
$time = date('H:i');

setReview ($conn, $id, $date, $time, $name, $text);

header ("location: {$_SERVER['HTTP_REFERER']}");
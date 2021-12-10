<?php

// include('../../configs/config_vars.php'); // Переменные
// include("$dir_root/configs/config_db.php"); // Конфигурации подключения к БД
include($_SERVER["DOCUMENT_ROOT"] . "/shop/configs/config_vars.php"); // Переменные
include($_SERVER["DOCUMENT_ROOT"] . "/shop/configs/config_db.php"); // Переменные
include($_SERVER["DOCUMENT_ROOT"] . "/shop/manage/models/QueriesToDB.php"); // Переменные
// include('../models/QueriesToDB.php'); // Запросы к БД

$id = (int) $_GET["id"];
if (deleteItem($conn, $id)) {
    $result = "success";
    $message = "Элемент удален.";
} else {
    $result = "danger";
    $message = "Ошибка при удалении элемента.";
}

// Возврат на основную страницу
header("Location: ../index.php?result=$result&message=$message");

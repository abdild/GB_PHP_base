<?php
// Создаем переменную для определения папки, в которой находится данный файл.
$GLOBALS["ROOT"] = __DIR__;
$dirRoot = $GLOBALS["ROOT"];

include($_SERVER["DOCUMENT_ROOT"] . "/shop/configs/config_vars.php"); // Переменные
include($_SERVER["DOCUMENT_ROOT"] . "/shop/configs/config_db.php"); // Конфигурации подключения к БД
include($_SERVER["DOCUMENT_ROOT"] . "/shop/manage/models/QueriesToDB.php"); // Запросы к БД
include('views/layout.php');
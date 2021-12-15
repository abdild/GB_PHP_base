<?php
// Создаем переменную для определения папки, в которой находится данный файл.
$GLOBALS["ROOT"] = __DIR__;
$dirManage = $GLOBALS["ROOT"];

// session_start();
require_once('../configs/config_vars.php'); // Подключение переменных
require_once('../configs/config_db.php'); // Конфигурации подключения к БД
require_once('models/QueriesToDB.php'); // Запросы к БД


require_once('views/layout_admin.php');
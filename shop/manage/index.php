<?php
// session_start();
include('../configs/config_vars.php'); //
include("$dir_root/configs/config_db.php"); // Конфигурации подключения к БД
include('models/QueriesToDB.php'); // Запросы к БД

include('views/layout_admin.php');
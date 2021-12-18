<?php

// include('configs/config_vars.php'); // Переменные
// include('configs/config_db.php'); // Конфигурации подключения к БД
// include('manage/models/QueriesToDB.php'); // Запросы к БД

$user = getUser($conn, $_SESSION['id'])
?>
<h1>Личный кабинет</h1>
<h2>Привет, <?= $user['email']; ?></h2>
<?php

$host = "localhost"; // Адрес сайта
$database = "events"; // Название базы данных
$username = "root"; // Имя пользователя базы данных
$password = ""; // Пароль пользователя базы данных

// Создаем соединение
$conn = mysqli_connect($host, $username, $password, $database);
// Проверяем соединение
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} // else echo "Connected!";
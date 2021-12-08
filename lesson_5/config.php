<?php

$host = "localhost";
$database = "gbphp";
$username = "root";
$password = "";
// Создаем соединение
$conn = mysqli_connect($host, $username, $password, $database);
// Проверяем соединение
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
// mysqli_close($conn);
// die();
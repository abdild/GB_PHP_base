<?php
$image_ext = ['jpg', 'jpeg', 'png']; // Массив разрешенных расширений.
$max_size_image = 10485760; // Максимальный размер загружаемого изображения - 10Mb.
$img_dir_full = "img/img_full"; // Директория для загрузки полноразмерных изображений.
$img_dir_short = "img/img_short"; // Директория для загрузки превью изображений. 
$width_new = 160; // Ширина превью.
$root_dir = "project";

$host = "localhost";
$database = "events";
$username = "root";
$password = "";
// Создаем соединение
$conn = mysqli_connect($host, $username, $password, $database);
// Проверяем соединение
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
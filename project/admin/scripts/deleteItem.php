<?php
session_start();

// print_r($_SESSION);

include("config.php");

$id = (int) $_GET["id"];

$query_img = "SELECT * FROM events WHERE id = $id";
$img = mysqli_query($conn, $query_img);
$img = mysqli_fetch_assoc($img);

// Получаем адрес изображения в массиве
$img_arr = explode("/", $img["image"]);

// Формируем ссылки на изображение и миниатюру
$img_full = $_SERVER["DOCUMENT_ROOT"] . "/project/$img_dir_full/$img_arr[2]";
$img_short = $_SERVER["DOCUMENT_ROOT"] . "/project/$img_dir_short/$img_arr[2]";

// Удаляем элемент из базы данных
$query = "DELETE FROM events WHERE id = $id";
mysqli_query($conn, $query);
// $res = mysqli_query($conn, $query);
// $event = mysqli_fetch_assoc($res);

// Удаляем изображение и миниатюры
unlink($img_full);
unlink($img_short);

header ("Location: ../index.php");

// $img_dir_full
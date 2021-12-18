<?php
session_start();

include('../configs/config_vars.php'); // Переменные
include('../configs/config_db.php'); // Конфигурации подключения к БД
include('../manage/models/QueriesToDB.php'); // Запросы к БД

if (!$_POST or $_POST['email'] == '' or $_POST['password'] == '') {
    if ($_GET['feedback']) {
        header("location: {$_SERVER['HTTP_REFERER']}&");
    } else {
        header("location: {$_SERVER['HTTP_REFERER']}&feedback=inputnone");
    }
}



// Разбираем пришедшие из формы данные
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL); // Имя комментирующего
$password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);  // Текст комментария
// $id = filter_var((int)$_GET["id"], FILTER_SANITIZE_NUMBER_INT);; // id карточки

$password = md5($password);

$user = (checkAuth($conn, $email, $password));

// print_r($user);
// echo "<br>" . $email . "<br>" . $password . "<br>" . $dir_root . "<br>";
// die();

if ($user == []) {
    header("location: {$_SERVER['HTTP_REFERER']}&feedback=emailnone");
} else {
    if ($user['email'] == $email and $user['password'] != $password) {
        header("location: {$_SERVER['HTTP_REFERER']}&feedback=passwordnone");
    } else {
        if ($user['email'] == $email and $user['password'] == $password) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            if ($_SESSION['role'] == 1) {
                header("location: /shop/manage/index.php");
            } else {
                header("location: {$_SERVER['HTTP_REFERER']}&action=authok");
            }
            // header("location: {$_SERVER['HTTP_REFERER']}&action=authok");
        }
    }
}

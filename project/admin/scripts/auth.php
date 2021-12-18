<?php
session_start();
require_once('config.php');

// Разбираем пришедшие из формы данные
$login = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$password = md5(filter_var($_POST["password"], FILTER_SANITIZE_STRING));

$query = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
$res = mysqli_query($conn, $query) or die("Error: ".mysqli_error($conn));
$user = mysqli_fetch_assoc($res);

if(mysqli_num_rows($res) == 1 AND $user["role"] == 1) {
    $_SESSION['id'] = $user["id"];
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    $_SESSION['role'] = $user["role"];
    header("Location: ../index.php?session=true");
} else header("Location: /$root_dir/index.php");
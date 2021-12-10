<?php

include($_SERVER["DOCUMENT_ROOT"] . "/shop/configs/config_vars.php"); // Переменные
include("$dir_root/configs/config_db.php"); // Конфигурации подключения к БД

// Все элементы
function getAllItems($conn)
{
    $query = "SELECT * FROM events";
    $res = mysqli_query($conn, $query);

    return mysqli_fetch_all($res);
}

// Список городов
function getAllCities($conn)
{
    $query = "SELECT * FROM cities WHERE visibility = 1 ORDER BY city";
    $res = mysqli_query($conn, $query);

    return mysqli_fetch_all($res);
}

// Список категорий
function getAllCategories($conn)
{
    $query = "SELECT * FROM categories";
    $res = mysqli_query($conn, $query);

    return mysqli_fetch_all($res);
}

// Список локаций
function getAllLocation($conn)
{
    $query = "SELECT * FROM locations WHERE visibility = 1 ORDER BY location";
    $res = mysqli_query($conn, $query);

    return mysqli_fetch_all($res);
}

// Добавление нового элемента
function setNewItem($conn, $item)
{
    // Сообщение от БД
    $messageFromDB = "";

    // Распарсивание массива нового элемента
    $DB_name = $item[0]['event']['name'];
    $DB_description = $item[0]['event']['description'];
    $DB_category = $item[0]['event']['category'];
    $DB_date = $item[0]['event']['session']['date'];
    $DB_time = $item[0]['event']['session']['time'];
    $DB_price = $item[0]['event']['session']['price'];
    $DB_location = $item[0]['place']['location'];
    $DB_image = $item[0]['event']['image'];

    // Добавление нового элемента в БД
    $query = "INSERT INTO `events`(`name`, `description`, `category`, `date`, `time`, `price`, `location`, `image`) VALUES ('$DB_name', '$DB_description', '$DB_category', '$DB_date', '$DB_time ', '$DB_price', '$DB_location', '$DB_image')";
    if (mysqli_query($conn, $query)) {
        return $messageFromDB = "Элемент добавлен.";
    } else return $messageFromDB = "Ошибка добавления элемента.";
}

// Удаление элемента
function deleteItem($conn, $id)
{
    // Выбираем изображение в БД
    $query = "SELECT * FROM events WHERE id = $id";
    $img = mysqli_query($conn, $query);
    $img = mysqli_fetch_assoc($img);

    $img_full = $_SERVER["DOCUMENT_ROOT"] . "/shop/uploads/img_full/".$img['image'];
    $img_short = $_SERVER["DOCUMENT_ROOT"] . "/shop/uploads/img_short/".$img['image'];
    unlink($img_full);
    unlink($img_short);

    // Удаляем элемент из базы данных
    $query = "DELETE FROM events WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        return "true";
    } else return "false";
}

// // Удаление изображения
// function deleteImage($conn, $id)
// {
//     // Выбираем изображение в БД
//     $query = "SELECT * FROM events WHERE id = $id";
//     $img = mysqli_query($conn, $query);
//     $img = mysqli_fetch_assoc($img);

//     // Получаем адрес изображения в массиве
//     // $img_arr = explode("/", $img["image"]);

//     // Удаление пустых значений массива
//     // $img_arr = array_values(array_filter($img_arr));

//     // $img_full = $img_arr[0] . "/img_full/" . $img_arr[2];
//     // $img_short = $img_arr[0] . "/img_short/" . $img_arr[2];

//     // echo $img_full . "<br>" . $img_short;

//     // $img_full = $_SERVER["DOCUMENT_ROOT"] . "/shop/uploads/img_full/$img_arr[2]";
//     // $img_short = $_SERVER["DOCUMENT_ROOT"] . "/shop/uploads/img_short/$img_arr[2]";
    
//     $img_full = $_SERVER["DOCUMENT_ROOT"] . "/shop/uploads/img_full/".$img['image'];
//     $img_short = $_SERVER["DOCUMENT_ROOT"] . "/shop/uploads/img_short/".$img['image'];
//     unlink($img_full);
//     unlink($img_short);
// }

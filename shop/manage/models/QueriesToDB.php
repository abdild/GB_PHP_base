<?php

include($_SERVER["DOCUMENT_ROOT"] . "/shop/configs/config_vars.php"); // Переменные
include($_SERVER["DOCUMENT_ROOT"] . "/shop/configs/config_db.php"); // Конфигурации подключения к БД


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
    $res = mysqli_fetch_all($res);

    $items  = [];
    foreach ($res as $item) {
        $items[$item[0]] = $item[1];
    };

    return $items;
}

// Поиск города по id
function getCity($conn, $id)
{
    $query = "SELECT city FROM cities WHERE id = $id";
    $res = mysqli_query($conn, $query);
    $res = mysqli_fetch_assoc($res);

    return $res;
}

// Список категорий
function getAllCategories($conn)
{
    $query = "SELECT * FROM categories";
    $res = mysqli_query($conn, $query);
    $res = mysqli_fetch_all($res);

    $items  = [];
    foreach ($res as $item) {
        $items[$item[0]] = $item[1];
    };

    return $items;
}

// Поиск категории по id
function getCategory($conn, $id)
{
    $query = "SELECT category FROM categories WHERE id = $id";
    $res = mysqli_query($conn, $query);
    $res = mysqli_fetch_assoc($res);

    return $res;
}

// Список локаций
function getAllLocation($conn)
{
    $query = "SELECT * FROM locations WHERE visibility = 1 ORDER BY location";
    $res = mysqli_query($conn, $query);
    $res = mysqli_fetch_all($res);

    $items  = [];
    foreach ($res as $item) {
        $items[$item[0]] = $item[2];
    };

    return $items;
}

// Поиск локации по id
function getLocation($conn, $id)
{
    $query = "SELECT location FROM locations WHERE id = $id";
    $res = mysqli_query($conn, $query);
    $res = mysqli_fetch_assoc($res);

    return $res;
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
    $DB_city = $item[0]['place']['city'];
    $DB_location = $item[0]['place']['location'];
    $DB_image = $item[0]['event']['image'];

    // Добавление нового элемента в БД
    $query = "INSERT INTO `events`(`name`, `description`, `category`, `date`, `time`, `price`, `city`, `location`, `image`) VALUES ('$DB_name', '$DB_description', '$DB_category', '$DB_date', '$DB_time ', '$DB_price', '$DB_city', '$DB_location', '$DB_image')";
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

    // Определяем ссылки на удаляемые изображения (полное и миниатюру)
    $img_full = $_SERVER["DOCUMENT_ROOT"] . "/shop/uploads/img_full/" . $img['image'];
    $img_short = $_SERVER["DOCUMENT_ROOT"] . "/shop/uploads/img_short/" . $img['image'];

    // Удаляем файлы изображений
    unlink($img_full);
    unlink($img_short);

    // Удаляем элемент из БД
    $query = "DELETE FROM events WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        return "true";
    } else return "false";
}

// Получение элемента по id
function getItem($conn, $id)
{
    $query = "SELECT * FROM events WHERE id = $id";
    $item = mysqli_query($conn, $query);

    return mysqli_fetch_assoc($item);
}

// Редактирование элемента
function editItem($conn, $item, $id)
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
    $DB_city = $item[0]['place']['city'];
    $DB_location = $item[0]['place']['location'];
    $DB_image = $item[0]['event']['image'];

    // Обновление элемента в БД
    $query = "UPDATE `events` SET `name`='$DB_name',`description`='$DB_description',`category`=$DB_category,`date`='$DB_date',`time`='$DB_time',`price`=$DB_price,`city`=$DB_city,`location`=$DB_location,`image`='$DB_image' WHERE `id`=$id";
    if (mysqli_query($conn, $query)) {
        return $messageFromDB = "Элемент обновлен.";
    } else return $messageFromDB = "Ошибка обновления элемента.";
}

// Получение всех id элементов, имеющихся в БД
function getIDs($conn)
{
    $query = "SELECT id FROM events";
    $res = mysqli_query($conn, $query);
    $res = mysqli_fetch_all($res);

    $IDs = [];

    foreach ($res as $item) {
        array_push($IDs, $item[0]);
    };

    return $IDs;
}

// Запись отзыва в БД
function setReview($conn, $id, $date, $time, $name, $text)
{

    // Добавление нового элемента в БД
    $query = "INSERT INTO `reviews`(`events_id`, `date`, `time`, `name`, `text`) VALUES ('$id', '$date', '$time', '$name', '$text ')";
    if (mysqli_query($conn, $query)) {
        return $messageFromDB = "Отзыв добавлен.";
    } else return $messageFromDB = "Ошибка добавления отзыва.";
}

// Получение комментария из БД
function getReview($conn, $id)
{
    $query = "SELECT * FROM reviews WHERE events_id = $id";
    $item = mysqli_query($conn, $query);

    return mysqli_fetch_all($item);
}

// Поиск пользователя при авторизации
function checkAuth($conn, $email, $password)
{
    // $password = md5($password);
    $query = "SELECT * FROM users WHERE `email` = '$email'";
    $user = mysqli_query($conn, $query);

    return mysqli_fetch_assoc($user);
}

// Поиск пользователя по id
function getUser($conn, $id) {
    $query = "SELECT * FROM users WHERE id = $id";
    $user = mysqli_query($conn, $query);

    return mysqli_fetch_assoc($user);
}

<?php

include('../../configs/config_vars.php'); // Переменные
include("$dir_root/configs/config_db.php"); // Конфигурации подключения к БД
include('../models/QueriesToDB.php'); // Запросы к БД
include('../models/SimpleImage.php'); // Уменьшение изображения
include('../models/TranslitText.php'); // Транслитерация

if (isset($_POST)) {
    // Разбираем пришедшие из формы данные
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING); // Название товара
    $description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);  // Описание товара
    $price = filter_var((int)$_POST["price"], FILTER_SANITIZE_NUMBER_INT);; // Цена товара

    if (isset($_FILES)) {
        // Разбираем пришедший из формы файл
        $file_name = $_FILES["image"]["name"]; // Название файла
        $file_type = explode("/", $_FILES["image"]["type"]); // Тип файла
        $file_name_tmp = $_FILES["image"]["tmp_name"]; // Название временного загруженного файла
        $file_size = $_FILES["image"]["size"]; // Размер файла
        $file_loaded = []; // Массив с загруженными файлами

        // Именование файла с добавлением времени с целью исключения дублирования названий добавляемых файлов
        $file_name = pathinfo($file_name);
        $file_name = $file_name['filename'] . '-' . time() . '.' . $file_name['extension'];

        // Проверка расширения файла
        if ($file_type[0] === "image" and in_array($file_type[1], $image_ext)) {
            // Проверка размера файла
            if ($file_size <= $max_size_image) {
                // $files_loaded = scandir($_SERVER["DOCUMENT_ROOT"] . "/$root_dir/" . $img_dir_full);
                $file_name_loaded = new TranslitText();
                $file_name_loaded = $file_name_loaded->translit($file_name);
                // Проверка загрузился ли файл
                if (move_uploaded_file($file_name_tmp, "$dir_root/$dir_uploads/$dir_img_full/$file_name_loaded")) {
                    // Уменьшение изображения
                    $thumbnail = new SimpleImage();
                    $thumbnail->load("$dir_root/$dir_uploads/$dir_img_full/$file_name_loaded");
                    $thumbnail->resizeToWidth($width_new);
                    $thumbnail->save("$dir_root/$dir_uploads/$dir_img_short/$file_name_loaded");

                    // Формирование массива нового элемента
                    $item = [];
                    $item = [
                        [
                            "place" => [
                                "city" => $_POST['city'],
                                "location" => $_POST['location'],
                                "address" => "",
                                "metro" => "",
                                "coordinates" => [
                                    "lat" => "",
                                    "lon" => ""
                                ]
                            ],
                            "event" => [
                                "name" => $_POST['name'],
                                "description" => $_POST['description'],
                                "category" => $_POST['category'],
                                "session" => [
                                    "date" => explode('T', $_POST['date_time'])[0],
                                    "time" => explode('T', $_POST['date_time'])[1],
                                    "price" => $_POST['price']
                                ],
                                "image" => "$file_name_loaded"
                            ]
                        ]
                    ];

                    // Запись в БД и запись сообщения
                    $message = editItem($conn, $item, $_GET['id']);
                    $result = "success";
                } else {
                    $result = "danger";
                    $message = "Ошибка при загрузке файла.";
                }
            } else {
                $result = "warning";
                $message = "Размер файла превышает допустимый." . " Допустимый размер файла: " . floor($max_size_image / 1024) . " Кб." . " Размер вашего файла: " . floor($file_size / 1024) . " Кб";
            }
        } else {
            $result = "danger";
            $message = "Некорректный формат данных." . " Допустимые форматы изображений: " . implode(', ', $image_ext);
        }
    }
}

// Возврат на основную страницу
header("Location: ../index.php?result=$result&message=$message");
?>




<?php

// $root = $GLOBALS["ROOT"];

// include($_SERVER["DOCUMENT_ROOT"] . "/shop/configs/config_vars.php"); // Переменные
// include($_SERVER["DOCUMENT_ROOT"] . "/shop/configs/config_db.php"); // Переменные
// include_once($root."/models/QueriesToDB.php"); // Переменные
// include($_SERVER["DOCUMENT_ROOT"] . "/shop/manage/models/SimpleImage.php"); // Уменьшение изображения
// include($_SERVER["DOCUMENT_ROOT"] . "/shop/manage/models/TranslitText.php"); // Транслитерация

// $id = (int) $_GET["id"];
?>

<!-- <pre>
    <? //print_r(editItem($conn, $id)); ?>
</pre> -->


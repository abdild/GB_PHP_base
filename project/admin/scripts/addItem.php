<?php
require_once('config.php');
include($_SERVER["DOCUMENT_ROOT"] . "/$root_dir/admin/classes/TranslitText.php");
include($_SERVER["DOCUMENT_ROOT"] . "/$root_dir/admin/classes/SimpleImage.php");

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

        if ($file_type[0] === "image" and in_array($file_type[1], $image_ext)) {
            if ($file_size <= $max_size_image) {
                $files_loaded = scandir($_SERVER["DOCUMENT_ROOT"] . "/$root_dir/" . $img_dir_full);
                $file_name_loaded = new TranslitText();
                $file_name_loaded = $file_name_loaded->translit($file_name);

                if (move_uploaded_file($file_name_tmp, $_SERVER["DOCUMENT_ROOT"] . "/$root_dir/$img_dir_full/$file_name_loaded")) {
                    // Уменьшение изображения
                    $thumbnail = new SimpleImage();
                    $thumbnail->load($_SERVER["DOCUMENT_ROOT"] . "/$root_dir/$img_dir_full/$file_name_loaded");
                    $thumbnail->resizeToWidth(300);
                    $thumbnail->save($_SERVER['DOCUMENT_ROOT'] . "/$root_dir/$img_dir_short/$file_name_loaded");

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
                                "image" => "$img_dir_full/$file_name_loaded"
                            ]
                        ]
                    ];

                    // $item = json_encode($item);


                    $DB_name = $item[0]['event']['name'];
                    $DB_description = $item[0]['event']['description'];
                    $DB_category = $item[0]['event']['category'];
                    $DB_date = $item[0]['event']['session']['date'];
                    $DB_time = $item[0]['event']['session']['time'];
                    $DB_price = $item[0]['event']['session']['price'];
                    $DB_location = $item[0]['place']['location'];
                    $DB_image = $item[0]['event']['image'];

                    // echo $DB_name."<br>";
                    // echo $DB_description."<br>";
                    // echo $DB_category."<br>";

                    // $query = "INSERT INTO `events`(`name`, `description`, `category`, `date`, `time`, `price`, `location`, `image`) VALUES ('tgyrt')";
                    $query = "INSERT INTO `events`(`name`, `description`, `category`, `date`, `time`, `price`, `location`, `image`) VALUES ('$DB_name', '$DB_description', '$DB_category', '$DB_date', '$DB_time ', '$DB_price', '$DB_location', '$DB_image')";
                    mysqli_query($conn, $query);


                    header("Location: ../index.php");

                    // $link_referer = $_SERVER["DOCUMENT_ROOT"] . "/project/admin/scripts/config.php";
?>
                    <!-- <h3>Информация добавлена успешно</h3>
                    <br>
                    <a href="<?= $_SERVER["HTTP_REFERER"]; ?>">Назад</a> -->

<?php


                    // $query = "INSERT INTO `catalog`(`name`, `size`, `path`) VALUES ('$name','$size','$image')";
                    // mysqli_query($conn, $query);

                    // header("Location: index.php");
                } else {
                    echo "Размер файла превышает допустимый." . "<br>" . "Допустимый размер файла: " . floor($max_size_image / 1024) . " Кб<br>" . "Размер вашего файла: " . floor($file_size / 1024) . " Кб";
                }
            } else {
                echo "Некорректный формат данных." . "<br>" . "Допустимые форматы изображений: " . implode(', ', $image_ext);
            }
        }
    }
}

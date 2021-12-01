<?php
require_once('config.php');

$image = "images/{$_FILES["img"]["name"]}";

$image_ext = ['jpg', 'jpeg', 'png'];

$type = explode("/", $_FILES["img"]["type"]);

$name = $_FILES["img"]["name"];
$size = $_FILES["img"]["size"];


if ($type[0] == "image" && in_array($type[1], $image_ext)) {
    if ($_FILES["img"]["size"] < 100000) {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $image)) {
            // echo $name." ".$size." ".$image;
            $query = "INSERT INTO `catalog`(`name`, `size`, `path`) VALUES ('$name','$size','$image')";
            mysqli_query($conn, $query);

            header("Location: index.php");
        }
        echo "Ошибка загрузки файла" . "<br>";
    ?>
        <a href="<?= $_SERVER["HTTP_REFERER"]; ?>">Назад</a>
    <?php

    } else {
        echo "Превышен максимальный размер файла" . "<br>";
    ?>
        <a href="<?= $_SERVER["HTTP_REFERER"]; ?>">Назад</a>

<?php
    }
} else {
    echo "Некорректный формат файла";
?>
    <a href="<?= $_SERVER["HTTP_REFERER"]; ?>">Назад</a>
    <?php
}
?>

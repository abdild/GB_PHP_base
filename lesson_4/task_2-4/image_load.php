<?php
define('SIZE_IMAGE', 100000); // Допустимый размер загружаемых файлов.
$images_ext = ['jpg', 'jpeg', 'png']; // Допустимые форматы загружаемых файлов.
$image_dir_full = "images/images_full"; // Директория для загрузки полноразмерных изображений.
$image_dir_short = "images/images_short"; // Директория для загрузки превью изображений. 
$width_new = 160; // Ширина превью.

// Транслитерация
function translit($text)
{
    $converter = array(
        'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
        'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
        'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
        'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
        'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
        'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
        'э' => 'e',    'ю' => 'yu',   'я' => 'ya',
    );

    $text = strtr(mb_strtolower($text), $converter); // Перевод текста в нижний регистр и транлитерация.
    $text = str_replace(' ', '_', $text); // Замена всех пробелов на "_".
    return $text;
};

// Изменение размера изображения
// Код взят отсюда https://myrusakov.ru/php-resize-image.html
function resize($image, $w_o = false, $h_o = false)
{
    if (($w_o < 0) || ($h_o < 0)) {
        echo "Некорректные входные параметры";
        return false;
    }
    list($w_i, $h_i, $type) = getimagesize($image); // Получаем размеры и тип изображения (число)
    $types = array("", "gif", "jpeg", "png"); // Массив с типами изображений
    $ext = $types[$type]; // Зная "числовой" тип изображения, узнаём название типа
    if ($ext) {
        $func = 'imagecreatefrom' . $ext; // Получаем название функции, соответствующую типу, для создания изображения
        $img_i = $func($image); // Создаём дескриптор для работы с исходным изображением
    } else {
        echo 'Некорректное изображение'; // Выводим ошибку, если формат изображения недопустимый
        return false;
    }
    /* Если указать только 1 параметр, то второй подстроится пропорционально */
    if (!$h_o) $h_o = $w_o / ($w_i / $h_i);
    if (!$w_o) $w_o = $h_o / ($h_i / $w_i);
    $img_o = imagecreatetruecolor($w_o, $h_o); // Создаём дескриптор для выходного изображения
    imagecopyresampled($img_o, $img_i, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i); // Переносим изображение из исходного в выходное, масштабируя его
    $func = 'image' . $ext; // Получаем функция для сохранения результата
    return $func($img_o, $image); // Сохраняем изображение в тот же файл, что и исходное, возвращая результат этой операции
}

$type = explode("/", $_FILES['photo']['type']);

if ($type[0] == 'image' and in_array($type[1], $images_ext)) {
    if ($_FILES['photo']['size'] <= SIZE_IMAGE) {
        $images_loaded = scandir('images/images_full'); // Создание массива загруженных файлов.
        $file_name = translit($_FILES['photo']['name']); // Переименование файла с транслитерацией.

        // Проверка на существование данного файла в списке загруженных
        if (in_array($file_name, $images_loaded)) {
            echo "Файл с таким названием уже загружен." . "<br>";
?>
            <a href="<?= $_SERVER["HTTP_REFERER"]; ?>">Назад</a>
        <?php
        } else {
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $image_dir_full . "/$file_name")) {
                copy("$image_dir_full/$file_name", "$image_dir_short/$file_name");
                resize("$image_dir_short/$file_name", $width_new);

                header('Location: index.php');
            }
        }
    } else {
        echo "Размер файла превышает допустимый." . "<br>" . "Допустимый размер файла: " . floor(SIZE_IMAGE / 1024) . " Кб<br>" . "Размер вашего файла: " . floor($_FILES['photo']['size'] / 1024) . " Кб<br>";
        ?>
        <a href="<?= $_SERVER["HTTP_REFERER"]; ?>">Назад</a>
    <?php
    }
} else {
    echo "Некорректный формат данных." . "<br>" . "Допустимые форматы изображений: " . implode(', ', $images_ext) . "<br>";
    ?>
    <a href="<?= $_SERVER["HTTP_REFERER"]; ?>">Назад</a>
<?php
}
?>
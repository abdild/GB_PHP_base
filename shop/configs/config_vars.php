<?php

$image_ext = ['jpg', 'jpeg', 'png']; // Массив разрешенных расширений.
$max_size_image = 10485760; // Максимальный размер загружаемого изображения - 10Mb.

$dir_root = $_SERVER['DOCUMENT_ROOT'] . "/shop";
$dir_uploads = "/uploads";
$dir_img_full = "/img_full"; // Директория для загрузки полноразмерных изображений.
$dir_img_short = "/img_short"; // Директория для загрузки превью изображений. 
$width_new = 360; // Ширина превью.
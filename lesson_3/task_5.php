<?php
// 5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.

function changeSpace($text) {
    $text = str_replace(" ", "_", $text);
    return $text;
}

echo changeSpace("Текст с пробелами.");
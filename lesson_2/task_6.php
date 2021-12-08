<?php
// 6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.

echo '6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.'."<br>"."<br>";

function power($val, $pow) {
    if ($pow == 1) {
        return;
    }
    $val *= VAL;
    echo $val."<br>";
    power($val, $pow-1);
};

$val = $_GET["val"];
$pow = $_GET["pow"];

define("VAL", $val);
power($val, $pow);
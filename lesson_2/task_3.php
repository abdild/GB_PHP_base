<?php
// 3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.

function add($a, $b) {
    return $a + $b;
}

function sub($a, $b) {
    return $a - $b;
}

function div($a, $b) {
    return $a / $b;
}

function mult($a, $b) {
    return $a * $b;
}

echo add(3,9)."<br>";
echo sub(3,9)."<br>";
echo div(3,9)."<br>";
echo mult(3,9)."<br>";
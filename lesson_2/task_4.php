<?php
// 4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).

function add($a, $b)
{
    return $a + $b;
}

function sub($a, $b)
{
    return $a - $b;
}

function div($a, $b)
{
    return $a / $b;
}

function mult($a, $b)
{
    return $a * $b;
}

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case "add":
            echo add($arg1, $arg2);
            break;
        case "sub":
            echo sub($arg1, $arg2);
            break;
        case "div":
            echo div($arg1, $arg2);
            break;
        case "mult":
            echo mult($arg1, $arg2);
            break;
        default:
            echo "Error";
    }
}

$arg1 = $_GET["arg1"];
$arg2 = $_GET["arg2"];
$operation = $_GET["operation"];

mathOperation($arg1, $arg2, $operation);
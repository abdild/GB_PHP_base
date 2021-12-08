<?php
// 2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15.

$a = rand(0, 15);

function print_dig($a)
{
    echo $a . "<br>";
    if ($a == 15) {
        return;
    }
    print_dig($a + 1);
}

switch ($a) {
    case 0:
        print_dig(0);
        break;
    case 1:
        print_dig(1);
        break;
    case 2:
        print_dig(2);
        break;
    case 3:
        print_dig(3);
        break;
    case 4:
        print_dig(4);
        break;
    case 5:
        print_dig(5);
        break;
    case 6:
        print_dig(6);
        break;
    case 7:
        print_dig(7);
        break;
    case 8:
        print_dig(8);
        break;
    case 9:
        print_dig(9);
        break;
    case 10:
        print_dig(10);
        break;
    case 11:
        print_dig(11);
        break;
    case 12:
        print_dig(12);
        break;
    case 13:
        print_dig(13);
        break;
    case 14:
        print_dig(14);
        break;
    case 15:
        print_dig(15);
        break;
    default:
        echo "Error";
}

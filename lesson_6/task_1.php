<!-- 1. Создать форму-калькулятор с операциями: сложение, вычитание, умножение, деление. Не забыть обработать деление на ноль! Выбор операции можно осуществлять с помощью тега <select>. -->


<?php
$res = "";
// print_r($_POST);
$arg1 = (int)$_POST["digit1"];
$arg2 = (int)$_POST["digit2"];
$oper = $_POST["operations"];
$error = "";

switch ($oper) {
    case "+":
        $res = $arg1 + $arg2;
        break;
    case "-":
        $res = $arg1 - $arg2;
        break;
    case "*":
        $res = $arg1 * $arg2;
        break;
    case "/":
        if ($arg2 == 0) {
            $error = "Делить на ноль нельзя";
            break;
        } else $res = round($arg1 / $arg2, 2);
        break;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .form_calc {
            display: flex;
            flex-wrap: nowrap;
            gap: 10px;
            height: 30px;
            align-items: center;
        }

        input {
            width: 50px;
        }

        select {
            width: 50px;
        }

        .button {
            width: 80px;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <div class="form_calc">
            <input type="text" name="digit1" placeholder="<?= $arg1; ?>">
            <select name="operations" id="operations">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>
            <input type="text" name="digit2" placeholder="<?= $arg2; ?>">
            <p>=</p>
            <h2><?= $res; ?></h2>
        </div>
        <input class="button" type="submit" value="РЕШИТЬ">
    </form>
    <p style="color: red;"><?= $error; ?></p>
</body>

</html>
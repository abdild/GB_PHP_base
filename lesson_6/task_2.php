<!-- 2. Создать калькулятор, который будет определять тип выбранной пользователем операции, ориентируясь на нажатую кнопку. -->

<?php
$res = "";
// print_r($_POST);
$arg1 = (int)$_POST["digit1"];
$arg2 = (int)$_POST["digit2"];
$oper = $_POST["operation"];
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
        } else $res =  round($arg1 / $arg2, 2);
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
            width: 20px;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <div class="form_calc">
            <input type="text" name="digit1" placeholder="<?= $arg1; ?>">
            <input type="text" name="digit2" placeholder="<?= $arg2; ?>">
            <p>=</p>
            <h2><?= $res; ?></h2>
        </div>
        <input class="button" type="submit" name="operation" value="+">
        <input class="button" type="submit" name="operation" value="-">
        <input class="button" type="submit" name="operation" value="*">
        <input class="button" type="submit" name="operation" value="/">
    </form>
    <p style="color: red;"><?= $error; ?></p>
</body>

</html>
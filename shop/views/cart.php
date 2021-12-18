<?php
if (getUser($conn, $_SESSION['id']) != 'false') {
    $user = getUser($conn, $_SESSION['id'])['email'];
} else {
    $_SESSION['id'] = session_id();
    $user = "Незнакомец(ка)";
}
?>

<h1>Корзина</h1>
<h2>Твои заказы <?= $user; ?></h2>
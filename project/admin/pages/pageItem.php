<?php
include($_SERVER["DOCUMENT_ROOT"] . "/project/admin/scripts/config.php");

$id = (int) $_GET["id"];
$query = "SELECT * FROM events WHERE id = $id";
$res = mysqli_query($conn, $query);
// $event = mysqli_fetch_assoc($res);



?>
<pre>
    <?= print_r($event); ?>
</pre>

<a href="../../index.php">Назад</a>

<h1>Заголовок</h1>
<div class="cards">
    <img class="card_img" src="<?= $event[8]; ?>" alt="<?= $event[1]; ?>">
    <div class="card_content">
        <div class="card_title"><?= $event[1]; ?></div>
        <div class="card_description"><?= $event[2]; ?></div>
        <div class="card_footer">
            <?php
            $date = date_create($event[4]);
            $date = date_format($date, "d.m.Y");
            $time =  substr($event[5], 0, -3);
            ?>
            <div class="card_date"><?= $date . ", " . $time; ?></div>
            <div class="card_price"><?= $event[6]; ?> руб.</div>
        </div>
        </a>
    </div>
</div>
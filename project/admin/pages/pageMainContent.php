<?php
include($_SERVER["DOCUMENT_ROOT"] . "/project/admin/scripts/config.php");
$query = "SELECT * FROM events";
$res = mysqli_query($conn, $query);
$events = mysqli_fetch_all($res);

// $name = $item[0]['event']['name'];
// $description = $item[0]['event']['description'];
// $category = $item[0]['event']['category'];
// $date = $item[0]['event']['session']['date'];
// $time = $item[0]['event']['session']['time'];
// $price = $item[0]['event']['session']['price'];
// $location = $item[0]['place']['location'];
// $image = $item[0]['event']['image'];

?>

<h1>Заголовок</h1>
<div class="cards">
    <?php foreach ($events as $event) {; ?>
        <a href="item.php?id=<?= $event[0]; ?>" class="card">
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
            </div>
        </a>
    <?php
    }
    ?>
</div>
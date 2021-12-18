<h1>Мероприятия</h1>
<div class="cards">
    <?php
    $items = getAllItems($conn);
    foreach ($items as $item) {; ?>
        <a href="index.php?action=page&id=<?= $item[0]; ?>" class="card">
            <img class="card_img" src="<?= 'uploads/img_short/' . $item[9]; ?>" alt="<?= $item[1]; ?>">
            <div class="card_content">
                <div class="card_title"><?= $item[1]; ?></div>
                <div class="card_description"><?= $item[2]; ?></div>
                <div class="card_footer">
                    <?php
                    $date = date_create($item[4]);
                    $date = date_format($date, "d.m.Y");
                    $time =  substr($item[5], 0, -3);
                    ?>
                    <div class="card_date"><?= $date . ", " . $time; ?></div>
                    <div class="card_price"><?= $item[6]; ?> руб.</div>
                </div>
            </div>
        </a>
    <?php
    }
    ?>
</div>
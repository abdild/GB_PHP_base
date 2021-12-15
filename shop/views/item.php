<?php
$item = getItem($conn, $id); // Получаем элемент
$reviews = getReview($conn, $id); // Получаем отзывы
// print_r($reviews);
?>

<a class="breadcrumbs" href="index.php">
    <svg width="14" height="14" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 19L3 12M3 12L10 5M3 12H21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
    Назад
</a>

<div class="item_block">
    <div class="item_image">
        <img class="" src="<?= 'uploads/img_full/' . $item['image']; ?>" alt="<?= $item['image']; ?>">
        <div class="reviews_form">
            <h2>Отправить отзыв</h2>
            <form action="controllers/addReviews.php?id=<?= $id; ?>" method="POST">
                <?php //$dirRoot . '/controllers/addReviews.php'; 
                ?>
                <div class="reviews_form_item">
                    <!-- <label for="name" class="">Имя</label> -->
                    <input type="name" name="name" class="form_item" placeholder="Введите ваше имя" id="name" required>
                </div>
                <div class="reviews_form_item">
                    <!-- <label for="text" class="">Отзыв</label> -->
                    <textarea name="text" class="form_item" placeholder="Введите отзыв" id="text" rows="8" required></textarea>
                </div>
                <input type="submit" value="Отправить" class="button btn_primary secondary">
            </form>
        </div>
    </div>
    <div class="item_content">
        <h1 class="item_title"><?= $item['name']; ?></h1>
        <div class="item_secondary"><?= $item['date'] . ", " . substr($item['time'], 0, -3); ?></div>
        <div class="item_text"><?= $item['description']; ?></div>
        <button class="button btn_primary primary">В корзину</button>
        <div class="reviews_block">
            <h3>Отзывы</h3>
            <?php
            if ($reviews) {
                foreach ($reviews as $item) {
            ?>
                    <div class="review_item">
                        <div class="review_name"><?= $item[4]; ?></div>
                        <div class="review_time"><?= $item[2] . ", " . $item[3]; ?></div>
                        <p><?= $item[5]; ?></p>
                    </div>

            <?php
                }
            } else {?>
            <p>В настоящее время нет отзывов. Твой отзыв может быть первым.</p>
            <?php
            }
            ?>
        </div>
    </div>
</div>
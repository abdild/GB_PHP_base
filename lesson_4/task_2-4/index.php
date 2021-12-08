<!-- https://fancyapps.com/ -->

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>Фотогалерея</title>
</head>

<body>
    <div class="wrapper">
        <h1 style="padding-bottom: 10px">Загрузка фотографий</h1>
        <form action="task_2-4/image_load.php" method="post" enctype="multipart/form-data">
            <label for="photo">Выберите фотографию</label><br>
            <input type="file" name="photo" id="photo"><br>
            <input type="submit" value="Загрузить">
        </form>

        <h2 style="padding-top: 20px">Фотогалерея</h2>
        <?php
        $images = scandir("images/images_full");
        ?>
        <div class="listImage">
            <?php
            for ($i = 2; $i < count($images); $i++) { ?>
                <div class="card">
                    <a href="images/images_full/<?= $images[$i]; ?>" data-fancybox="gallery" data-caption="Optional caption">
                        <img src="images/images_short/<?= $images[$i]; ?>" alt="<?= $images[$i]; ?>">
                    </a>
                </div>
            <?php
            };
            ?>
        </div>
    </div>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
</body>

</html>
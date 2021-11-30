<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css" type="text/css" />
    <title>Фотогалерея</title>
</head>

<body>
    <div class="wrapper">

        <h1>Загрузка изображений</h1>
        <form action="load_image.php" method="post" enctype="multipart/form-data">
            <label for="img">Выберите файл для загрузки</label><br>
            <input type="file" name="img" id="img"><br>
            <input type="submit" value="Загрузить">
        </form>

        <h2 style="padding-top: 50px;">Фотогалерея</h2>
        <?php
        $images = scandir("images");
        // print_r($images);
        ?>
        <div class="listImage">
            <?php
            for ($i = 2; $i < count($images); $i++) { ?>
                <div class="card">
                    <a href="full_image.php?image=<?= $images[$i]; ?>"><img width="100" src="images/<?= $images[$i]; ?>" alt="<?= $images[$i]; ?>"></a>
                </div>
            <?php
            };
            ?>
        </div>

    </div>

</body>

</html>
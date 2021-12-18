<?php
require_once('config.php');

$query = "SELECT * FROM catalog ORDER BY count DESC";
$res = mysqli_query($conn, $query);
$data = mysqli_fetch_all($res);
// foreach ($data as $item) {
//     print_r($item);
// }

// die();

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css" />
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

        <div class="listImage">
            <?php
            foreach ($data as $item) { ?>
                <div class="card">
                    <a href="full_image.php?id=<?= $item[0]; ?>"><img width="100" src="<?= $item[3]; ?>" alt="<?= $item[1]; ?>"></a>
                    <div class="view">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.1213 14.1213C14.6839 13.5587 15 12.7956 15 12C15 11.2044 14.6839 10.4413 14.1213 9.87868C13.5587 9.31607 12.7956 9 12 9C11.2044 9 10.4413 9.31607 9.87868 9.87868C9.31607 10.4413 9 11.2044 9 12C9 12.7956 9.31607 13.5587 9.87868 14.1213C10.4413 14.6839 11.2044 15 12 15C12.7956 15 13.5587 14.6839 14.1213 14.1213Z" stroke="#3F3F46" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M2.45801 12C3.73201 7.943 7.52301 5 12 5C16.478 5 20.268 7.943 21.542 12C20.268 16.057 16.478 19 12 19C7.52301 19 3.73201 16.057 2.45801 12Z" stroke="#3F3F46" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <?= $item[4]; ?>
                    </div>
                </div>
            <?php
            };
            ?>
        </div>

    </div>

</body>

</html>
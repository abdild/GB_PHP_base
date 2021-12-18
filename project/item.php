<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/project/admin/scripts/config.php");

$id = $_GET["id"];
$query = "SELECT * FROM events WHERE id = $id";
$res = mysqli_query($conn, $query);
$event = mysqli_fetch_assoc($res);

$name = $event['name'];
$description = $event['description'];
$category = $event['category'];
$date = $event['date'];

$date = date_create($date);
$date = date_format($date, "d.m.Y");

$time =  substr($event['time'], 0, -3);
$price = $event['price'];
$location = $event['location'];
$image = $event['image'];

// echo $name."<br>";
// echo $description."<br>";
// echo $category."<br>";
// echo $date."<br>";
// echo $time."<br>";
// echo $price."<br>";
// echo $location."<br>";
// echo $image."<br>";

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>Главная страница</title>
</head>

<body>
    <header>
        <div class="wrapper">
            <ul class="header_menu">
                <li class="logo_container">
                    <a href="index.php">Логотип</a>
                </li>
                <li>
                    <form action="" class="search_block">
                        <input type="search" id="searchPlace" name="fullsearch" placeholder="Поиск...">
                        <button type="submit" id="searchButton">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 21L15 15M17 10C17 10.9193 16.8189 11.8295 16.4672 12.6788C16.1154 13.5281 15.5998 14.2997 14.9497 14.9497C14.2997 15.5998 13.5281 16.1154 12.6788 16.4672C11.8295 16.8189 10.9193 17 10 17C9.08075 17 8.1705 16.8189 7.32122 16.4672C6.47194 16.1154 5.70026 15.5998 5.05025 14.9497C4.40024 14.2997 3.88463 13.5281 3.53284 12.6788C3.18106 11.8295 3 10.9193 3 10C3 8.14348 3.7375 6.36301 5.05025 5.05025C6.36301 3.7375 8.14348 3 10 3C11.8565 3 13.637 3.7375 14.9497 5.05025C16.2625 6.36301 17 8.14348 17 10Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </form>
                </li>
                <li>
                    <a href="admin/index.php" class="button btn_primary primary">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.357 8.19036C12.9821 7.56523 13.3333 6.71739 13.3333 5.83333C13.3333 4.94928 12.9821 4.10143 12.357 3.47631C11.7319 2.85119 10.884 2.5 9.99999 2.5C9.11594 2.5 8.26809 2.85119 7.64297 3.47631C7.01785 4.10143 6.66666 4.94928 6.66666 5.83333C6.66666 6.71739 7.01785 7.56523 7.64297 8.19036C8.26809 8.81548 9.11594 9.16667 9.99999 9.16667C10.884 9.16667 11.7319 8.81548 12.357 8.19036Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M5.8752 13.3752C6.96916 12.2812 8.45289 11.6667 9.99999 11.6667C11.5471 11.6667 13.0308 12.2812 14.1248 13.3752C15.2187 14.4692 15.8333 15.9529 15.8333 17.5H4.16666C4.16666 15.9529 4.78124 14.4692 5.8752 13.3752Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span>Войти</span>
                    </a>
                </li>
                <li>
                    <button class="button btn_primary secondary">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.5 2.5H4.16667L4.5 4.16667M4.5 4.16667H17.5L14.1667 10.8333H5.83333M4.5 4.16667L5.83333 10.8333M5.83333 10.8333L3.9225 12.7442C3.3975 13.2692 3.76917 14.1667 4.51167 14.1667H14.1667M14.1667 14.1667C13.7246 14.1667 13.3007 14.3423 12.9882 14.6548C12.6756 14.9674 12.5 15.3913 12.5 15.8333C12.5 16.2754 12.6756 16.6993 12.9882 17.0118C13.3007 17.3244 13.7246 17.5 14.1667 17.5C14.6087 17.5 15.0326 17.3244 15.3452 17.0118C15.6577 16.6993 15.8333 16.2754 15.8333 15.8333C15.8333 15.3913 15.6577 14.9674 15.3452 14.6548C15.0326 14.3423 14.6087 14.1667 14.1667 14.1667ZM7.5 15.8333C7.5 16.2754 7.3244 16.6993 7.01184 17.0118C6.69928 17.3244 6.27536 17.5 5.83333 17.5C5.39131 17.5 4.96738 17.3244 4.65482 17.0118C4.34226 16.6993 4.16667 16.2754 4.16667 15.8333C4.16667 15.3913 4.34226 14.9674 4.65482 14.6548C4.96738 14.3423 5.39131 14.1667 5.83333 14.1667C6.27536 14.1667 6.69928 14.3423 7.01184 14.6548C7.3244 14.9674 7.5 15.3913 7.5 15.8333Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span>Корзина</span>
                    </button>
                </li>
            </ul>
        </div>
    </header>
    <main>
        <div class="wrapper">
            <div class="container">
                <a class="breadcrumbs" href="index.php">
                    <svg width="14" height="14" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 19L3 12M3 12L10 5M3 12H21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Назад
                </a>

                <div class="item_block">
                    <div class="item_image">
                        <img class="" src="<?= $image; ?>" alt="<?= $image; ?>">
                        <button class="button btn_primary primary">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 3H5L5.4 5M5.4 5H21L17 13H7M5.4 5L7 13M7 13L4.707 15.293C4.077 15.923 4.523 17 5.414 17H17M17 17C16.4696 17 15.9609 17.2107 15.5858 17.5858C15.2107 17.9609 15 18.4696 15 19C15 19.5304 15.2107 20.0391 15.5858 20.4142C15.9609 20.7893 16.4696 21 17 21C17.5304 21 18.0391 20.7893 18.4142 20.4142C18.7893 20.0391 19 19.5304 19 19C19 18.4696 18.7893 17.9609 18.4142 17.5858C18.0391 17.2107 17.5304 17 17 17ZM9 19C9 19.5304 8.78929 20.0391 8.41421 20.4142C8.03914 20.7893 7.53043 21 7 21C6.46957 21 5.96086 20.7893 5.58579 20.4142C5.21071 20.0391 5 19.5304 5 19C5 18.4696 5.21071 17.9609 5.58579 17.5858C5.96086 17.2107 6.46957 17 7 17C7.53043 17 8.03914 17.2107 8.41421 17.5858C8.78929 17.9609 9 18.4696 9 19Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span>Купить</span>
                        </button>
                    </div>
                    <div class="item_content">
                        <h1 class="item_title"><?= $name; ?></h1>
                        <div class="item_secondary"><?= $date . ", " . $time; ?></div>
                        <div class="item_text"><?= $description; ?></div>
                    </div>
                </div>


            </div>
        </div>
    </main>
</body>
<?php
session_start();
include('scripts/config.php');

?>

<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Administration</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Favicons -->
    <!-- <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico"> -->
    <!-- <meta name="theme-color" content="#7952b3"> -->

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <!-- <link href="../css/style.css" rel="stylesheet"> -->
    <style>
        .auth_form {
            width: 300px;
            margin: 0 auto;
            padding-top: 100px;
        }

        .breadcrumbs {
            text-decoration: none;
            color: #0EA5E9;
            stroke: #0EA5E9;
            display: flex;
            align-items: center;
            gap: 1rem;
        }
    </style>
</head>

<body>
    <?php
    if ($_SESSION["login"] and $_SESSION["role"] == 1) {
    ?>

        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a href="<?= '/'.$root_dir.'/index.php'; ?>" class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                    <a class="nav-link px-3" href="#">Выход</a>
                </div>
            </div>
        </header>

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home" aria-hidden="true">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                    Мероприятия
                                </a>
                            </li>
                            <li class="nav-item">

                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <?php
                    include($_SERVER['DOCUMENT_ROOT'] . "/$root_dir/admin/pages/pageAddItem.php"); ?>

                </main>
            </div>
        </div>

    <?php
    } else {
    ?>
        <div class="container-fluid">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 auth_form">
                <a class="breadcrumbs" href="../index.php">
                    <svg width="14" height="14" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 19L3 12M3 12L10 5M3 12H21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Назад
                </a>
                <h1>Вход</h1>
                <form class="row g-3" method="post" action="scripts/auth.php">
                    <div class="col-12">
                        <label for="email" class="form-label">Логин</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Введите свой email" required>
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label">Пароль</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Введите свой пароль" required>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input name="check" class="form-check-input" type="checkbox" id="check">
                            <label class="form-check-label" for="check">Запомнить меня</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <input class="btn btn-dark" type="submit" value="Войти"></input>
                    </div>
                </form>
            </main>
        </div>
    <?php
    }
    ?>

    <script src="js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
</body>

</html>
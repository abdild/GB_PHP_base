<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Панель администрирования</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Собственные стили для админки -->
    <link href="css/style_admin.css" rel="stylesheet">
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a href="<?= "../index.php"; ?>" class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">На сайт</a>
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
                                Главная
                            </a>
                        </li>
                        <li class="nav-item">

                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div style="display: <?php
                                        if ($_GET['message']) {
                                            echo "inline-block";
                                        } else {
                                            echo "none";
                                        };
                                        ?>; z-index: $zindex-modal; margin-top: 10px;" class="alert <?php if ($_GET['result'] == "success") {
                                                                                                        echo "alert-success ";
                                                                                                    } elseif ($_GET['result'] == "warning") {
                                                                                                        echo "alert-warning ";
                                                                                                    } elseif ($_GET['result'] == "danger") {
                                                                                                        echo "alert-danger ";
                                                                                                    }; ?> alert-dismissible fade show position-absolute end-0" role="alert">
                    <?= $_GET['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <?php
                if (!$_GET['action']) {
                    $pageTitleSub = "Добавление";
                    include('addItemForm.php');
                } else {
                    switch ($_GET['action']) {
                        case "edit":
                            // Проверяем наличие id и того, что этот id существует в БД
                            if (!(int) $_GET['id'] or !in_array((int) $_GET['id'], getIDs($conn))) {
                                $pageTitleSub = "Добавление"; // Заголовок блока
                                $items = []; // Обнуляем ранее переданный элемент
                                include('addItemForm.php');
                            } else {
                                $id = $_GET['id'];
                                $pageTitleSub = "Редактирование"; // Заголовок блока
                                $item = getItem($conn, $id); // Получаем элемент с id
                                include('addItemForm.php');
                            }
                            break;
                        default:
                            $pageTitleSub = "Добавление"; // Заголовок блока
                            $items = []; // Обнуляем ранее переданный элемент
                            include('addItemForm.php');
                    }
                }

                ?>
                <?php include('items.php'); ?>
            </main>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
</body>

</html>
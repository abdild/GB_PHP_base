<a class="breadcrumbs" href="index.php">
    <svg width="14" height="14" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 19L3 12M3 12L10 5M3 12H21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
    Назад
</a>

<form class="auth" action="controllers/auth.php" method="POST">
    <h1>Вход</h1>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="">
    <label for="password">Пароль</label>
    <input type="password" name="password" id="password">
    <span class="serverFeedback" style="color: #EF4444;">
        <?php
        // if ($_GET['feedback']) {
        //     echo "Не все поля заполнены";
        // };
        switch ($_GET['feedback']) {
            case 'inputnone':
                echo "Не все поля заполнены";
                break;
            case 'emailnone':
                echo "Пользователь не существует.";
                break;
            case 'passwordnone':
                echo "Пароль указан не верно.";
                break;
            case 'ok':
                echo "Вы авторизовались!";
                break;
        }
        ?>
    </span>
    <button type="submit" class="button btn_primary primary">Войти</button>
</form>
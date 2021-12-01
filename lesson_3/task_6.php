<?php
// 6. В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP. Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.

$title = "Название сайта";
$h1 = "Заголовок H1";

$mainMenu = ["Главная", "Архив", "Контакты"];
$subMenu = [
    "1" => [
        "1.1",
        "1.2",
        "1.3" => [
            "1.3.1",
            "1.3.2",
            "1.3.3",
            "1.3.4",
            "1.3.5"
        ]
    ],
    "2" => [
        "2.1",
        "2.2",
        "2.3"
    ],
    "3" => [
        "3.1",
        "3.2",
        "3.3",
        "3.4",
        "3.5",
        "3.6"
    ]
]

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="author" content="Luka Cvrk (www.solucija.com)" />
    <link rel="stylesheet" href="css/main.css" type="text/css" />
    <title><?= $title; ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font: .8em Georgia, "Times New Roman", Serif;
            background: #fff;
            color: #777;
        }

        a {
            color: #D40000;
            text-decoration: none;
        }

        a:hover {
            color: #8F0000;
        }

        p {
            line-height: 1.7em;
            margin: 0 0 15px;
        }

        .x {
            clear: both;
        }

        h1 {
            float: left;
            font-size: 2em;
            font-weight: normal;
            font-style: italic;
            padding: 0 0 25px 10px;
            margin: 0 0 10px;
        }

        h2 {
            font-weight: normal;
            font-size: 2.6em;
            padding: 0 0 10px;
            margin: 0 0 15px;
        }

        h3 {
            font-size: 1.7em;
            font-weight: normal;
            margin: 0 0 20px;
        }

        h3 a {
            color: #222;
        }

        #content {
            width: 960px;
            margin: 40px auto;
        }

        #menu {
            float: right;
            margin: 10px 10px 0 0;
        }

        #menu li {
            display: inline;
            list-style: none;
        }

        #menu li a {
            float: left;
            margin: 0 0 0 20px;
            color: #888;
        }

        #menu li a:hover {
            color: #555;
        }

        .post {
            clear: both;
            padding: 30px 10px;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            margin: 0 0 40px;
        }

        .post .details {
            float: left;
            width: 250px;
        }

        .post .details .info {
            font-size: .9em;
            color: #999;
        }

        .post .details .info a {
            color: #777;
            border-bottom: 1px dotted #999;
            padding: 3px 1px;
        }

        .post .body {
            float: right;
            width: 618px;
            padding: 0 0 0 30px;
            border-left: 1px solid #ddd;
        }

        .col {
            width: 290px;
            margin: 0 40px 30px 0;
            float: left;
            font-size: .9em;
        }

        .col.last {
            margin-right: 0;
        }

        #footer {
            clear: both;
            border-top: 1px solid #ddd;
            padding: 20px 0;
            font-size: .9em;
            color: #999;
        }
    </style>
</head>

<body>
    <div id="content">
        <h1><?= $h1; ?></h1>

        <!-- <ul id="menu">
            <li><a href="#">home</a></li>
            <li><a href="#">archive</a></li>
            <li><a href="#">contact</a></li>
        </ul> -->

        <ul id="menu">
            <?php
            foreach ($mainMenu as $item) : ?>
                <li><a href="#"><?= $item; ?></a></li>
            <?php
            endforeach;
            ?>
        </ul>

        <div class="post">
            <div class="details">
                <h2><a href="#">Nunc commodo euismod massa quis vestibulum</a></h2>
                <p class="info">posted 3 hours ago in <a href="#">general</a></p>

            </div>
            <div class="body">
                <p>Nunc eget nunc libero. Nunc commodo euismod massa quis vestibulum. Proin mi nibh, dignissim a pellentesque at, ultricies sit amet sapien. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel lorem eu libero laoreet facilisis. Aenean placerat, ligula quis placerat iaculis, mi magna luctus nibh, adipiscing pretium erat neque vitae augue. Quisque consectetur odio ut sem semper commodo. Maecenas iaculis leo a ligula euismod condimentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut enim risus, rhoncus sit amet ultricies vel, aliquet ut dolor. Duis iaculis urna vel massa ultricies suscipit. Phasellus diam sapien, fermentum a eleifend non, luctus non augue. Quisque scelerisque purus quis eros sollicitudin gravida. Aliquam erat volutpat. Donec a sem consequat tortor posuere dignissim sit amet at ipsum.</p>
            </div>
            <div class="x"></div>
        </div>

        <div>
            <?php
            // function menu($menu)
            // {
            //     foreach ($menu as $key => $value) {
            //         if (!is_array($value)) {
            //             echo $value . "<br>";
            //         } else {
            //             echo $key . "<br>";
            //             menu($value);
            //         }
            //     }
            // };
            function menu($menu)
            {
            ?>
                <ul>
                    <?php
                    foreach ($menu as $key => $value) {
                        if (!is_array($value)) { ?>
                            <li><a href="#"><?= $value; ?></a></li>
                        <?php
                        } else { ?>
                            <li>
                                <a href="#"><?= $key; ?></a>
                                <?php
                                menu($value);
                                ?>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            <?php
            };
            menu($subMenu);
            ?>
        </div>

        <div class="col">
            <h3><a href="#">Ut enim risus rhoncus</a></h3>
            <p>Quisque consectetur odio ut sem semper commodo. Maecenas iaculis leo a ligula euismod condimentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut enim risus, rhoncus sit amet ultricies vel, aliquet ut dolor. Duis iaculis urna vel massa ultricies suscipit. Phasellus diam sapien, fermentum a eleifend non, luctus non augue. Quisque scelerisque purus quis eros sollicitudin gravida. Aliquam erat volutpat. Donec a sem consequat tortor posuere dignissim sit amet at.</p>
            <p>&not; <a href="#">read more</a></p>
        </div>
        <div class="col">
            <h3><a href="#">Maecenas iaculis leo</a></h3>
            <p>Quisque consectetur odio ut sem semper commodo. Maecenas iaculis leo a ligula euismod condimentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut enim risus, rhoncus sit amet ultricies vel, aliquet ut dolor. Duis iaculis urna vel massa ultricies suscipit. Phasellus diam sapien, fermentum a eleifend non, luctus non augue. Quisque scelerisque purus quis eros sollicitudin gravida. Aliquam erat volutpat. Donec a sem consequat tortor posuere dignissim sit amet at.</p>
            <p>&not; <a href="#">read more</a></p>
        </div>
        <div class="col last">
            <h3><a href="#">Quisque consectetur odio</a></h3>
            <p>Quisque consectetur odio ut sem semper commodo. Maecenas iaculis leo a ligula euismod condimentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut enim risus, rhoncus sit amet ultricies vel, aliquet ut dolor. Duis iaculis urna vel massa ultricies suscipit. Phasellus diam sapien, fermentum a eleifend non, luctus non augue. Quisque scelerisque purus quis eros sollicitudin gravida. Aliquam erat volutpat. Donec a sem consequat tortor posuere dignissim sit amet at.</p>
            <p>&not; <a href="#">read more</a></p>
        </div>

        <div id="footer">
            <p><?= date("Y"); ?> Copyright &copy; <em>minimalistica</em> &middot; Design: Luka Cvrk, <a href="http://www.solucija.com/" title="Free CSS Templates">Solucija</a></p>
        </div>
    </div>
</body>

</html>
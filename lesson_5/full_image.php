<?php

require_once('config.php');
$id = $_GET['id'];

$count = "UPDATE catalog SET count = count + 1 WHERE id = $id";
mysqli_query($conn, $count);

$query = "SELECT * FROM catalog WHERE id = $id";
$res = mysqli_query($conn, $query);
$data = mysqli_fetch_all($res);

?>

<img width="300" src="<?= $data[0][3] ;?>" alt="<?= $data[0][1]; ?>"><br>
<h3>Количество просмотров: <?= $data[0][4] ;?></h3>
<br>
<a href="<?= $_SERVER["HTTP_REFERER"];?>">Назад</a>
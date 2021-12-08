<?php
include($_SERVER["DOCUMENT_ROOT"] . "/project/admin/scripts/config.php");

// Список городов
$query = "SELECT * FROM cities WHERE visibility = 1 ORDER BY city";
$res = mysqli_query($conn, $query);
$cities = mysqli_fetch_all($res);

// Список категорий
$query = "SELECT * FROM categories";
$res = mysqli_query($conn, $query);
$categories = mysqli_fetch_all($res);



// Список локаций
$query = "SELECT * FROM locations WHERE visibility = 1 ORDER BY location";
$res = mysqli_query($conn, $query);
$locations = mysqli_fetch_all($res);

?>

<pre>
<?php
// print_r($locations);
?>
</pre>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить элемент</h1>
</div>

<form class="row" action="scripts/addItem.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="mb-3">
                <label for="name" class="form-label">Название</label>
                <input type="name" name="name" class="form-control" placeholder="Введите название" id="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <textarea name="description" class="form-control" placeholder="Введите описание" id="description" rows="8" required></textarea>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="mb-3">
                <label for="category" class="form-label">Категория</label>
                <select name="category" id="category" class="form-select" required>
                    <option value="">Выберите категорию</option>
                    <?php
                    foreach ($categories as $value) { ?>
                        <option value="<?= $value[0]; ?>"><?= $value[1]; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Город</label>
                <select name="city" id="city" class="form-select" required>
                    <option value="">Выберите город</option>
                    <?php
                    foreach ($cities as $value) { ?>
                        <option value="<?= $value[0]; ?>"><?= $value[1]; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Место</label>
                <select name="location" id="location" class="form-select" required>
                    <option value="">Выберите место</option>
                    <?php
                    foreach ($locations as $value) { ?>
                        <option value="<?= $value[0]; ?>"><?= $value[2]; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Изображение</label>
                <input name="image" class="form-control" type="file" id="image" required>
            </div>

        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="date_time" class="form-label">Дата и время</label>
                    <input type="datetime-local" name="date_time" class="form-control" id="date_time" required>
                </div>
                <div class="col-4 mb-3">
                    <label for="price" class="form-label">Цена</label>
                    <input type="number" min="0" name="price" class="form-control" placeholder="Введите цену" id="price" required>
                </div>
                <div class="col-2 mb-3">
                    <label for="add" class="form-label">Еще</label>
                    <input class="btn btn-dark" type="button" id="add" value="+"></input>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <input class="btn btn-dark" type="submit" value="Добавить"></input>
    </div>
    <p><small><?= $error_form; ?></small></p>
</form>

<?php
include($_SERVER['DOCUMENT_ROOT'] . "/$root_dir/admin/pages/pageItems.php");
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Мероприятия</h1>
</div>

<h4><?= $pageTitleSub; ?></h4>
<form class="row" action="<?php
                            if (!$item) {
                                echo '../manage/controllers/addItem.php';
                            } else {
                                echo '../manage/controllers/editItem.php?id=' . $item['id'];
                            }
                            ?>" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="mb-3">
                <label for="name" class="form-label">Название</label>
                <input type="name" name="name" class="form-control" placeholder="Название" id="name" required value="<?= $item['name']; ?>">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <textarea name="description" class="form-control" placeholder="Описание" id="description" rows="8" required><?= $item['description']; ?></textarea>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="mb-3">
                <label for="category" class="form-label">Категория</label>
                <select name="category" id="category" class="form-select" required>
                    <?php
                    if ($item) {
                    ?>
                        <option value="<?= $item['category']; ?>" selected><?= getCategory($conn, $item['category'])['category']; ?></option>
                    <?php
                    } else {
                    ?>
                        <option value="">Выберите категорию</option>
                    <?php
                    }
                    ?>
                    <?php
                    $categories = getAllCategories($conn);
                    foreach ($categories as $key => $value) { ?>
                        <option value="<?= $key; ?>"><?= $value; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Город</label>
                <select name="city" id="city" class="form-select" required>
                    <?php
                    if ($item) {
                    ?>
                        <option value="<?= $item['city']; ?>" selected><?= getCity($conn, $item['city'])['city']; ?></option>
                    <?php
                    } else {
                    ?>
                        <option value="">Выберите город</option>
                    <?php
                    }
                    ?>
                    <?php
                    $cities = getAllCities($conn);
                    foreach ($cities as $key => $value) { ?>
                        <option value="<?= $key; ?>"><?= $value; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Место</label>
                <select name="location" id="location" class="form-select" required>
                    <?php
                    if ($item) {
                    ?>
                        <option value="<?= $item['location']; ?>" selected><?= getLocation($conn, $item['location'])['location']; ?></option>
                    <?php
                    } else {
                    ?>
                        <option value="">Выберите место</option>
                    <?php
                    }
                    ?>
                    <?php
                    $locations = getAllLocation($conn);
                    foreach ($locations as $key => $value) { ?>
                        <option value="<?= $key; ?>"><?= $value; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="mb-3">
                <label for="image" class="form-label">Изображение</label>
                <?php
                if ($item) {
                ?>
                    <input name="image" class="form-control" type="file" id="image" value="<?= $item['image']; ?>">
                    <img class="edit" src="<?= '../uploads/img_short/' . $item['image']; ?>" alt="<?= $item['image']; ?>">
                <?php
                } else {
                ?>
                    <input name="image" class="form-control" type="file" id="image" required>
                <?php
                }
                ?>
            </div>
            <div class="row">
                <div class="col-7 mb-3">
                    <label for="date_time" class="form-label">Дата и время</label>
                    <?php
                    if ($item) {
                    ?>
                        <input type="datetime-local" name="date_time" class="form-control" id="date_time" value="<?= $item['date'] . "T" . $item['time']; ?>">
                    <?php
                    } else {
                    ?>
                        <input type="datetime-local" name="date_time" class="form-control" id="date_time" required>
                    <?php
                    }
                    ?>
                    
                </div>
                <div class="col-3 mb-3">
                    <label for="price" class="form-label">Цена</label>
                    <input type="number" min="0" name="price" class="form-control" placeholder="Цена" id="price" required value="<?= $item['price']; ?>">
                </div>
                <div class="col-2 mb-3">
                    <label for="add" class="form-label">Еще</label>
                    <input class="btn btn-dark" type="button" id="add" value="+"></input>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <?php
        if ($item) {
        ?>
            <input class="btn btn-warning" type="submit" value="Редактировать"></input>
            <input class="btn btn-secondary" type="reset" value="Отмена"></input>
        <?php
        } else {
        ?>
            <input class="btn btn-dark" type="submit" value="Добавить"></input>
        <?php
        }
        ?>

    </div>
</form>

<pre>
    <?php //print_r($item); echo($dirManage);
    ?>
</pre>
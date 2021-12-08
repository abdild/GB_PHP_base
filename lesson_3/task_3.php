<?php
// 3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким:
// Московская область:
// Москва, Зеленоград, Клин
// Ленинградская область:
// Санкт-Петербург, Всеволожск, Павловск, Кронштадт
// Рязанская область … (названия городов можно найти на maps.yandex.ru)

$areas = [
    "Амурская Область" => ["Завитинск", "Зея", "Райчихинск", "Свободный", "Тында", "Шимановск"],
    "Архангельская Область" => ["Архангельск", "Вельск", "Каргополь"],
    "Белгородская Область" => ["Алексеевка", "Белгород", "Бирюч", "Валуйки"],
    "Брянская Область" => ["Брянск", "Дятьково", "Жуковка", "Злынка", "Карачев", "Клинцы", "Мглин", "Новозыбков"],
    "Иркутская Область" => ["Алзамай"]
];

foreach ($areas as $key => $values) {
    echo $key.":"."<br>".implode(", ",$values)."<br>";
};
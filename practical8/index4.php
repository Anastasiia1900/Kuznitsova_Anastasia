<?php
$first_name = "Nana"; // ім'я
$last_name = "Ivanova"; // прізвище
$year_of_birth = 2005; // рік народження
$current_year = date("Y"); // отримуємо поточний рік
$age = $current_year - $year_of_birth; // обчислюємо вік
echo "Повне ім'я: $first_name $last_name <br>"; // вивід імені
echo "Вік: $age років <br><br>"; // вивід віку

$countries = ["Україна", "Польща", "Німеччина", "Італія"]; // створення масиву
echo "<ol>"; // відкриваємо список
foreach ($countries as $country) { // перебираємо масив
    echo "<li>$country</li>"; // кожен елемент списку
}
echo "</ol>";
echo "<br>";

$cities = [ // створюємо масив
    "Київ" => 2800000, // місто і населення
    "Львів" => 720000,
    "Одеса" => 1000000,
    "Харків" => 1400000
];

foreach ($cities as $city => $population) { // перебираємо
    if ($population > 1000000) { // перевірка
        echo "$city: $population <br>"; // вивід
    }
}
echo "<br>";

$number = 8; // число
if ($number % 2 == 0) { // якщо ділиться на 2
    echo "Парне <br>";
} else { // інакше
    echo "Непарне <br>";
}
echo "<br>";

if ($current_year % 4 == 0) { // якщо ділиться на 4
    echo "Це високосний рік";
} else { // інакше
    echo "Це не високосний рік";
}
?>
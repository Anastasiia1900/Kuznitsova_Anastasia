<?php
$a = 5;
$b = 10;

$sum = $a + $b; // сума
$diff = $a - $b; // різниця
$mult = $a * $b; // добуток
$div = $a / $b; // ділення

echo "Сума: $sum <br>";
echo "Різниця: $diff <br>";
echo "Добуток: $mult <br>";
echo "Ділення: $div <br><br>";

$days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"]; // створення масиву

echo "3-й день: " . $days[2] . "<br>";
echo "5-й день: " . $days[4] . "<br><br>";

$products = [
    "Phone" => 10000, // товар і ціна
    "Laptop" => 25000,
    "Headphones" => 2000
];

foreach ($products as $name => $price) { // перебираємо масив
    echo "$name: $price грн <br>"; // виводимо назву і ціну
}
echo "<br>"; // перенос рядка

$day = "Monday"; // задаємо день

switch ($day) { // перевіряємо значення
    case "Monday": // якщо понеділок
        echo "Початок робочого тижня";
        break; // зупиняємо
    case "Friday": // якщо п’ятниця
        echo "Майже вихідні!";
        break;
    case "Saturday": // якщо субота
    case "Sunday": // або неділя
        echo "Вихідний день";
        break;
    default: // для інших днів
        echo "Звичайний робочий день";
}
echo "<br><br>";

$x = 15; // число

if ($x % 2 == 0) { // якщо ділиться на 2 без остачі
    echo "Число парне";
} else {
    echo "Число непарне";
}
?>


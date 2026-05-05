<?php
$price1 = 200; // ціна першого товару
$price2 = 150; // ціна другого товару
$price3 = 250; // ціна третього товару
$total = $price1 + $price2 + $price3; // додаємо всі ціни
echo "Загальна сума: $total грн <br><br>"; // виводимо суму

$movies = ["Inception", "Titanic", "Avatar", "Interstellar", "The Matrix"]; // створення масиву

foreach ($movies as $movie) { // перебираємо кожен фільм
    echo "Фільм: $movie <br>"; // виводимо назву
}
echo "<br>";

$user = [ // створюємо масив
    "login" => "nana123", // логін
    "password" => "12345", // пароль
    "email" => "nana@example.com" // email
];

foreach ($user as $key => $value) { // перебираємо масив
    echo "$key: $value <br>"; // виводимо ключ і значення
}
echo "<br>";

if ($total > 500) { // якщо сума більше 500
    $discount = $total * 0.10; // обчислюємо 10% знижки
    $final = $total - $discount; // віднімаємо знижку
    echo "Знижка 10%: $discount грн <br>";
    echo "Сума зі знижкою: $final грн <br><br>"; // фінальна сума
} else { // якщо менше або рівно 500
    echo "Знижка не надається <br><br>";
}

$correct_login = "admin"; // правильний логін
$correct_password = "1234"; // правильний пароль

$input_login = "admin"; // введений логін
$input_password = "1234"; // введений пароль

if ($input_login === $correct_login && $input_password === $correct_password) {
    echo "Вхід успішний"; // якщо співпадає
} else {
    echo "Неправильний логін або пароль"; // якщо ні
}
?>
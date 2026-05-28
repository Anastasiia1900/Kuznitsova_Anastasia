<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Анкета користувача</title>
</head>
<body>
<h2>Анкета користувача</h2>

<?php
function clean($data) {
    return htmlspecialchars(trim($data));
}
$name = "";
$age = "";
$gender = "";
$about = "";
$hobbies = [];
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = clean($_POST["name"] ?? "");
    $age = clean($_POST["age"] ?? "");
    $gender = clean($_POST["gender"] ?? "");
    $about = clean($_POST["about"] ?? "");
    $hobbies = $_POST["hobbies"] ?? [];

    if (empty($name)) {
        $errors["name"] = "Введіть ім’я";
    }
    if (!is_numeric($age) || $age < 10 || $age > 100) {
        $errors["age"] = "Вік має бути від 10 до 100";
    }
    if (empty($errors)) {

        echo "<h3>Дані успішно надіслані:</h3>";

        echo "<p><b>Ім’я:</b> $name</p>";
        echo "<p><b>Вік:</b> $age</p>";
        echo "<p><b>Стать:</b> $gender</p>";

        echo "<p><b>Хобі:</b> ";

        if (!empty($hobbies)) {

            foreach ($hobbies as $hobby) {
                echo htmlspecialchars($hobby) . " ";
            }
        } else {
            echo "немає";
        }
        echo "</p>";

        echo "<p><b>Про себе:</b> $about</p>";

        exit;
    }
}

?>

<form method="POST">
    Ім’я:<br>
    <input type="text" name="name" value="<?= $name ?>">
    <span style>
        <?= $errors["name"] ?? "" ?>
    </span>
    <br><br>
    Вік:<br>
    <input type="text" name="age" value="<?= $age ?>">
    <span>
        <?= $errors["age"] ?? "" ?>
    </span>
    <br><br>
    Стать:<br>
    <input type="radio" name="gender" value="Чоловіча"
            <?= $gender == "Чоловіча" ? "checked" : "" ?>>
    Чоловіча
    <input type="radio" name="gender" value="Жіноча"
            <?= $gender == "Жіноча" ? "checked" : "" ?>>
    Жіноча
    <br><br>
    Хобі:<br>
    <input type="checkbox" name="hobbies[]" value="Спорт"
            <?= in_array("Спорт", $hobbies) ? "checked" : "" ?>>
    Спорт
    <input type="checkbox" name="hobbies[]" value="Музика"
            <?= in_array("Музика", $hobbies) ? "checked" : "" ?>>
    Музика
    <input type="checkbox" name="hobbies[]" value="Читання"
            <?= in_array("Читання", $hobbies) ? "checked" : "" ?>>
    Читання
    <br><br>

    Про себе:<br>
    <textarea name="about"><?= $about ?></textarea>
    <br><br>
    <button type="submit">Надіслати</button>
</form>

</body>
</html>
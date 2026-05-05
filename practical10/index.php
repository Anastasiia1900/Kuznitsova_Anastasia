<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Форма зворотного зв’язку</title>
</head>
<body>
<h2>Форма зворотного зв’язку</h2>
<form method="POST" action="">
    <label>Ім’я:</label><br>
    <input type="text" name="name" required><br><br>
    <label>Email:</label><br>
    <input type="text" name="email" required><br><br>
    <label>Повідомлення:</label><br>
    <textarea name="message" required></textarea><br><br>
    <button type="submit">Надіслати</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);
    $errors = [];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Невалідний email";
    }
    if (strlen($message) < 20) {
        $errors[] = "Повідомлення має містити мінімум 20 символів";
    }
    if (empty($errors)) {
        echo "<p>Повідомлення успішно надіслано!</p>";
    } else {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>

</body>
</html>
<?php
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['email'])) {
    header("Location: register.php");
    exit();
}

$name = $_SESSION['name'];
$email = $_SESSION['email'];

$cookieEmail = isset($_COOKIE['user_email']) ? $_COOKIE['user_email'] : "немає";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Профіль</title>
</head>
<body>
<h2>Профіль користувача</h2>

<p>Ім'я: <?php echo htmlspecialchars($name); ?></p>
<p>Email: <?php echo htmlspecialchars($email); ?></p>

<p>Ваш email запам'ятали: <?php echo htmlspecialchars($cookieEmail); ?></p>

<br>
<a href="logout.php">Вийти</a>
</body>
</html>

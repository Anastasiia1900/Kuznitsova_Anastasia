
<?php
$languages = [
        "uk" => "uk_UA.UTF-8",
        "en" => "en_US.UTF-8",
        "de" => "de_DE.UTF-8",
        "fr" => "fr_FR.UTF-8"
];

if (isset($_POST['lang'])) {
    $lang = $_POST['lang'];

    setcookie("site_lang", $lang, time() + (30 * 24 * 60 * 60));

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
$langKey = $_COOKIE['site_lang'] ?? 'uk';
$langLocale = $languages[$langKey] ?? 'uk_UA.UTF-8';
setlocale(LC_TIME, $langLocale);
$formatter = new IntlDateFormatter(
        $langLocale,
        IntlDateFormatter::FULL,
        IntlDateFormatter::FULL,
        date_default_timezone_get(),
        IntlDateFormatter::GREGORIAN,
        "EEEE, dd MMMM yyyy HH:mm:ss"
);
$date = $formatter->format(time());
$ip = $_SERVER['REMOTE_ADDR'];
?>

<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($langKey); ?>">
<head>
    <meta charset="UTF-8">
    <title>Локалізована дата і час</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f4;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        select, button {
            padding: 8px;
            margin-top: 10px;
        }
        h2 {
            color: #333;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Вибір мови</h2>
    <form method="POST">
        <select name="lang">
            <option value="uk" <?php if($langKey=="uk") echo "selected"; ?>>Українська</option>
            <option value="en" <?php if($langKey=="en") echo "selected"; ?>>English</option>
            <option value="de" <?php if($langKey=="de") echo "selected"; ?>>Deutsch</option>
            <option value="fr" <?php if($langKey=="fr") echo "selected"; ?>>Français</option>
        </select>
        <button type="submit">Зберегти</button>
    </form>
    <h3>Поточна дата і час:</h3>
    <p><?php echo htmlspecialchars($date); ?></p>
    <h3>IP користувача:</h3>
    <p><?php echo htmlspecialchars($ip); ?></p>
</div>
</body>
</html>
<?php
$users = [
    ['name' => 'Олександр', 'age' => 20, 'email' => 'olex@example.com'],
    ['name' => 'Яна', 'age' => 17, 'email' => 'yana@example.com'],
    ['name' => 'Максим', 'age' => 25, 'email' => 'max@example.com'],
    ['name' => 'Анна', 'age' => 19, 'email' => 'anna@example.com'],
    ['name' => 'Ігор', 'age' => 15, 'email' => 'igor@example.com'],
    ['name' => 'Оля', 'age' => 22, 'email' => 'olya@example.com'],
    ['name' => 'Дмитро', 'age' => 30, 'email' => 'dima@example.com'],
    ['name' => 'Єва', 'age' => 18, 'email' => 'eva@example.com'],
    ['name' => 'Костянтин', 'age' => 21, 'email' => 'kostya@example.com'],
    ['name' => 'Юлія', 'age' => 16, 'email' => 'yulia@example.com'],
];

function filterAdults($users) {
    return array_filter($users, function($user) {
        return $user['age'] >= 18;
    });
}

function compareByNameLength($a, $b) {
    return mb_strlen($a['name'], 'UTF-8') <=> mb_strlen($b['name'], 'UTF-8');
}

$adults = filterAdults($users);
usort($adults, 'compareByNameLength');

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Користувачі</title>
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background-color: #eee; }
    </style>
</head>
<body>

<h2>Список повнолітніх користувачів</h2>

<table>
    <tr>
        <th>Ім'я</th>
        <th>Вік</th>
        <th>Email</th>
    </tr>

    <?php foreach ($adults as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['name']) ?></td>
            <td><?= $user['age'] ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
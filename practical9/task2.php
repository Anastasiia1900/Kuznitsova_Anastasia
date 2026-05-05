<?php

$transactions = [
    ['amount' => 100, 'type' => 'in',  'date' => '2026-04-01'],
    ['amount' => 50,  'type' => 'out', 'date' => '2026-04-02'],
    ['amount' => 200, 'type' => 'in',  'date' => '2026-04-03'],
    ['amount' => 75,  'type' => 'out', 'date' => '2026-04-04'],
    ['amount' => 30,  'type' => 'out', 'date' => '2026-04-05'],
    ['amount' => 150, 'type' => 'in',  'date' => '2026-04-06'],
    ['amount' => 60,  'type' => 'out', 'date' => '2026-04-07'],
    ['amount' => 90,  'type' => 'out', 'date' => '2026-04-08'],
    ['amount' => 120, 'type' => 'in',  'date' => '2026-04-09'],
    ['amount' => 40,  'type' => 'out', 'date' => '2026-04-10'],
];

#[Attribute]
class LogTransactionType {
    public function __construct(public string $type) {}

    public function log(): void {
        file_put_contents(
            'log.txt',
            "[" . date('Y-m-d H:i:s') . "] Виклик фільтра: {$this->type}\n",
            FILE_APPEND
        );
    }
}

#[LogTransactionType(type: "out")]
function isOutgoing(array $transaction): bool {
    return $transaction['type'] === 'out';
}

function calculateTotal(array $transactions, callable $filter): int {

    $reflection = new ReflectionFunction($filter);
    $attributes = $reflection->getAttributes(LogTransactionType::class);

    foreach ($attributes as $attribute) {
        $attribute->newInstance()->log();
    }
    $filtered = array_filter($transactions, $filter);
    return array_sum(array_column($filtered, 'amount'));
}

$totalOut = calculateTotal($transactions, 'isOutgoing');

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Транзакції</title>
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #eee; }
    </style>
</head>
<body>

<h2>Загальна сума витрат</h2>

<table>
    <tr>
        <th>Тип</th>
        <th>Сума</th>
    </tr>
    <tr>
        <td>Витрати</td>
        <td><?= $totalOut ?></td>
    </tr>
</table>

</body>
</html>
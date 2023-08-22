<?php

$host = '127.0.0.1';
$db   = 'iguana';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $options);


// SELECT column_name(s)
// FROM table1
// INNER JOIN table2
// ON table1.column_name = table2.column_name;


$sql = "
    SELECT c.id, c.name, p.number, p.id AS phone_id
    FROM clients AS c
    INNER JOIN phones AS p
    ON c.id = p.client_id
";

$stmt = $pdo->query($sql);

$clientsInner = $stmt->fetchAll();


// SELECT column_name(s)
// FROM table1
// LEFT JOIN table2
// ON table1.column_name = table2.column_name;

$sql = "
    SELECT c.id, c.name, p.number, p.id AS phone_id
    FROM clients AS c
    LEFT JOIN phones AS p
    ON c.id = p.client_id
";

$stmt = $pdo->query($sql);

$clientsLeft = $stmt->fetchAll();


// SELECT column_name(s)
// FROM table1
// RIGHT JOIN table2
// ON table1.column_name = table2.column_name;

$sql = "
    SELECT c.id, c.name, p.number, p.id AS phone_id
    FROM clients AS c
    RIGHT JOIN phones AS p
    ON c.id = p.client_id
";

$stmt = $pdo->query($sql);

$clientsRight = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clients list</title>
    <style>
        body {
            font-family: monospace;
            display: flex;
            margin: 50px;
            gap: 20px;
            font-size: 200%;

        }
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 5px;
            height: 30px;
        }
        tr:nth-child(even) {
            background-color: #eee;
        }
    </style>
</head>
<body>

    <table>
        <tr>
            <th colspan="4">Inner JOIN</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>phone ID</th>
            <th>phone</th>
        </tr>
        <?php foreach($clientsInner as $client): ?>
            <tr>
                <td><?php echo $client['id'] ?></td>
                <td><?php echo $client['name'] ?></td>
                <td><?php echo $client['phone_id'] ?></td>
                <td><?php echo $client['number'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <table>
        <tr>
            <th colspan="4">Left JOIN</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>phone ID</th>
            <th>phone</th>
        </tr>
        <?php foreach($clientsLeft as $client): ?>
            <tr>
                <td><?php echo $client['id'] ?></td>
                <td><?php echo $client['name'] ?></td>
                <td><?php echo $client['phone_id'] ?></td>
                <td><?php echo $client['number'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <table>
        <tr>
            <th colspan="4">Right JOIN</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>phone ID</th>
            <th>phone</th>
        </tr>
        <?php foreach($clientsRight as $client): ?>
            <tr>
                <td><?php echo $client['id'] ?></td>
                <td><?php echo $client['name'] ?></td>
                <td><?php echo $client['phone_id'] ?></td>
                <td><?php echo $client['number'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
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


// SELECT column1, column2, ...
// FROM table_name;

$types = [
    1 => 'Lapuotis',
    2 => 'Spygliuotis',
    3 => 'Palmė',
];

$sql = "
    SELECT id, title, height, type
    FROM trees
";

$stmt = $pdo->query($sql);


$trees = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tree list</title>
    <style>
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 5px;
        }
        tr:nth-child(even) {
            background-color: #eee;
        }
        fieldset {
            margin-top: 20px;
            width: 300px;
            padding: 10px;
            border: 1px solid #bbb;
        }
        fieldset form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        fieldset form label {
            width: 60px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <h1>Tree list</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Height</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trees as $tree) : ?>
                <tr>
                    <td><?= $tree['id'] ?></td>
                    <td><?= $tree['title'] ?></td>
                    <td><?= $tree['height'] ?> m</td>
                    <td><?= $types[$tree['type']] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <fieldset>
        <legend>Plant Tree</legend>
        <form action="create.php" method="post">
            <div>
            <label>Title</label>
            <input type="text" name="title">
            </div>
            <div>
            <label>Height</label>
            <input type="text" name="height">
            </div>
            <div>
            <label>Type</label>
            <select name="type">
                <?php foreach ($types as $id => $type) : ?>
                    <option value="<?= $id ?>"><?= $type ?></option>
                <?php endforeach; ?>
            </select>
            </div>
            <div>
            <button type="submit">Plant</button>
            </div>
        </form>
    </fieldset>
</body>
</html>

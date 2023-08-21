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

// DELETE FROM table_name WHERE condition;

// DELETE FROM trees WHERE id = 888 OR 1;

$sql = "
    DELETE FROM trees
    WHERE id = ?
";

$stmt = $pdo->prepare($sql);

$stmt->execute([ $_POST['id'] ]);

header('Location: http://localhost/iguanos/029/');
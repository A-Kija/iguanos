<?php

use Faker\Factory as Faker;

require_once __DIR__ . '/../vendor/autoload.php';

$faker = Faker::create();

$coatings = [
    ['id' => 1, 'title' => 'Chocolate', 'color' => 'brown'],
    ['id' => 2, 'title' => 'Powdered sugar', 'color' => 'skyblue'],
    ['id' => 3, 'title' => 'Caramel', 'color' => 'darksalmon'],
    ['id' => 4, 'title' => 'Strawberry', 'color' => 'crimson'],
    ['id' => 5, 'title' => 'Blueberry', 'color' => 'indigo'],
    ['id' => 6, 'title' => 'Orange', 'color' => 'darkorange'],
    ['id' => 7, 'title' => 'Lemon', 'color' => 'limegreen'],
];


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



for ($i = 0; $i < 12; $i++) {
    $donut = [
        'title' => 
        (rand(0, 1) ? ($faker->streetSuffix . ' ') : '')
        . $faker->cityPrefix . ' '
        . (rand(0, 1) ? ($faker->citySuffix . ' ') : ''),
        'coating' => $faker->numberBetween(1, 7),
        'extra' => rand(0, 1) ? 'on' : 'off',
        'desc' => $faker->realText,
        'hole' => $faker->numberBetween(2, 15),
    ];
    $sql = "
        INSERT INTO donuts (title, coating, extra, description, hole)
        VALUES (? , ? , ? , ? , ?)
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ $donut['title'], $donut['coating'], $donut['extra'], $donut['desc'], $donut['hole'] ]);
}




$users = [
    [
        'id' => 1,
        'name' => 'Briedis',
        'email' => 'briedis@gmail.com',
        'password' => md5('123'),
        'color' => 'crimson',
        'role' => 'admin',
    ],
    [
        'id' => 2,
        'name' => 'Bebras',
        'email' => 'bebras@gmail.com',	
        'password' => md5('123'),
        'color' => 'indigo',
        'role' => 'user',
    ],
    [
        'id' => 3,
        'name' => 'Barsukas',
        'email' => 'barsukas@gmail.com',
        'password' => md5('123'),
        'color' => 'darkorange',
        'role' => 'user',
    ]
];

foreach ($users as $user) {
    $sql = "
        INSERT INTO users (name, email, password, color, role)
        VALUES (? , ? , ? , ? , ?)
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ $user['name'], $user['email'], $user['password'], $user['color'], $user['role'] ]);
}

echo 'Done' . PHP_EOL;
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

$donuts = [];

$title = '';



for ($i = 0; $i < 12; $i++) {
    $donuts[] = [
        'id' => rand(100000000, 999999999),
        'title' => 
        (rand(0, 1) ? ($faker->streetSuffix . ' ') : '')
        . $faker->cityPrefix . ' '
        . (rand(0, 1) ? ($faker->citySuffix . ' ') : ''),
        'coating' => $faker->numberBetween(1, 7),
        'extra' => rand(0, 1) ? 'on' : 'off',
        'desc' => $faker->realText,
        'hole' => $faker->numberBetween(2, 15),
    ];
}

$donuts = json_encode($donuts);
file_put_contents(__DIR__ . '/donuts.json', $donuts);


$users = [
    [
        'id' => 1,
        'name' => 'Briedis',
        'email' => 'briedis@gmail.com',
        'password' => md5('123'),
        'color' => 'crimson'
    ],
    [
        'id' => 2,
        'name' => 'Bebras',
        'email' => 'bebras@gmail.com',	
        'password' => md5('123'),
        'color' => 'indigo'
    ],
    [
        'id' => 3,
        'name' => 'Barsukas',
        'email' => 'arsukas@gmail.com',
        'password' => md5('123'),
        'color' => 'darkorange'
    ]
];

$users = json_encode($users);
file_put_contents(__DIR__ . '/users.json', $users);





echo 'Done' . PHP_EOL;

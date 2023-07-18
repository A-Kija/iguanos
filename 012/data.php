<?php

$niceAnimals = [
    ['name' => 'racoon', 'color' => 'skyblue'],
    ['name' => 'dog', 'color' => 'brown'],
    ['name' => 'cat', 'color' => 'black'],
    ['name' => 'pig', 'color' => 'pink'],
    ['name' => 'cow', 'color' => 'orange'],
    ['name' => 'chicken', 'color' => 'yellow'],
    ['name' => 'horse', 'color' => 'darkbrown'],
    ['name' => 'duck', 'color' => 'green'],
    ['name' => 'goat', 'color' => 'grey'],
    ['name' => 'sheep', 'color' => 'lightgrey']
];

// $niceAnimalsJson = json_encode($niceAnimals);

// file_put_contents(__DIR__ . '\animals.json', $niceAnimalsJson);


$niceAnimalsSerealized = serialize($niceAnimals);

file_put_contents(__DIR__ . '\animals.txt', $niceAnimalsSerealized);




echo "animals.json created! \n animals.txt created!";
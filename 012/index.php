<?php
// file_put_contents(__DIR__ . '\012.txt', 'Hello Big Brother!');
// $text = file_get_contents(__DIR__ . '\012.txt');
// echo "<h1>$text</h1>";

// $animals = json_decode
// (
//     file_get_contents(__DIR__ . '\animals.json'),
//     1
// );



// foreach ($animals as $animal) {
//     echo "<b style=\"color:{$animal['color']}\">{$animal['name']} </b>";
// }


$animals = unserialize
(
    file_get_contents(__DIR__ . '\animals.txt')
);



foreach ($animals as $animal) {
    echo "<b style=\"color:{$animal['color']}\">{$animal['name']} </b>";
}


$fox = ['name' => 'fox ' . rand(100, 999), 'color' => 'red'];

$animals[] = $fox;

$niceAnimalsSerealized = serialize($animals);

file_put_contents(__DIR__ . '\animals.txt', $niceAnimalsSerealized);

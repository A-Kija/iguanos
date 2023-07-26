<?php

$colors = [];
foreach (range(1, 17) as $number){
    $colors[] = [
        'id' => uniqid(),
        'name' => 'Color ' . $number,
        'hex' => sprintf('#%06X', mt_rand(0, 0xFFFFFF))
    ];
}

file_put_contents(__DIR__ . '/colors.json', json_encode($colors));
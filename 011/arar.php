<?php

// $masyvas = [];


// for ($i = 0; $i < 10; $i++) {
//     $masyvas[] = rand(33, 77);
// }

// echo '<pre>';
// print_r($masyvas);

// $masyvas2Dimension = [];

// for ($i = 0; $i < 10; $i++) {
//     $masyvas2Dimension[$i] = [];
//     for ($j = 0; $j < 5; $j++) {
//         $masyvas2Dimension[$i][] = rand(33, 77);
//     }
// }

// echo '<pre>';
// print_r($masyvas2Dimension);



$m2D = [];
foreach(range(1, 5) as $_) {
    $tarpinis = [];
    $m = rand(0, 1);
    if($m) {
        foreach (range(1, rand(3, 10)) as $_) {
            $tarpinis[] = rand(33, 77);
        }
    } else {
        $tarpinis= rand(33, 77);
    }
    $m2D[] = $tarpinis;
}

echo '<pre>';
print_r($m2D);

$suma = 0;

foreach ($m2D as $eilute) {
    if (is_array($eilute)) {
        foreach ($eilute as $value) {
            $suma += $value;
        }
    } else {
        $suma += $eilute;
    }
}

echo $suma;
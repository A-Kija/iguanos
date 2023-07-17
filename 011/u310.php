<?php


// $vinis = 85;
// $smugiai = 0;

// for ($i = 0; $i < 5; $i++) {
//     $liko = $vinis;
//     do {
//         $smugis = rand(5, 20);
//         $liko -= $smugis;
//         $smugiai++;
//     } while ($liko > 0);
//     echo "<h1>Smugiu: $smugiai</h1>";
// }


$vinis = 85;
$smugiai = 0;

for ($i = 0; $i < 5; $i++) {
    $liko = $vinis;
    do {
        $smugis = rand(20, 30);
        $smugis = rand(0, 1) ? $smugis : 0;
        $liko -= $smugis;
        $smugiai++;
    } while ($liko > 0);
    echo "<h1>Smugiu: $smugiai</h1>";
}
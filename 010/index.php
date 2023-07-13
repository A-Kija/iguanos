<?php

$str = '88 Labas '. rand(10, 99);

// echo "<h1>$str</h1>";

// $letterR = str_contains($str, '22');

$letterR = preg_match_all('/\d{2}/', $str, $matches);

// var_dump($matches);
// echo '<h1>';
// for ($i = 0; $i < 10; $i++) {
//     echo  $i % 2 ? '<span style="color: skyblue;">*</span>' : '<span style="color: crimson;">*</span>';
// }
// echo '</h1>';

// echo '<h1>';
// $reds = 0;
// $blues = 0;
// do {
//     $color = rand(0, 1) ? 'crimson' : 'skyblue';
//     echo "<span style=\"color: $color;\">*</span>";
//     $reds += $color == 'crimson' ? 1 : 0;
//     $blues += $color == 'skyblue' ? 1 : 0;
// } while ($reds < 3 || $blues < 5);
// echo '</h1>';


/*
>  ===> <=
<  ===> >=
== ===> !=
=== ===> !==
|| ===> &&

$reds >= 3 && $blues >= 5 ===> $reds < 3 || $blues < 5
*/


// $mociute = rand(100, 700);
// echo "<h1>Gimtadienio dovana: $mociute eur</h1>";
// $dukra = 0;
// $dukra += $mociute;
// while ($dukra < 500) {
//     $dukra += rand(50, 100);
//     echo "<h1>Dukra turi: $dukra eur</h1>";
// }


// echo '<h1>';
// for ($i = 0; $i < 10; $i++) {
//     echo  $i % 2 ? '<span style="color: skyblue;">*</span>' : '<span style="color: crimson;">*</span>';
//     if ($i == 4) {
//         break;
//     }
// }
// echo '</h1>';

// echo '<h1>';
// for ($i = 0; $i < 10; $i++) {
//     if ($i % 2 == 0) {
//         continue;
//     }
//     echo  $i % 2 ? '<span style="color: skyblue;">*</span>' : '<span style="color: crimson;">*</span>';
// }
// echo '</h1>';


echo '<h1 style="line-height:16px;">';
for ($i = 0; $i < 10; $i++) {

    echo '<div>';
    for ($i2 = 0; $i2 < 10; $i2++) {
        echo  $i2 % 2 ? '<span style="color: skyblue;">*</span>' : '<span style="color: crimson;">*</span>';
        // if ($i2 == 4) {
        //     break;
        // }
    }
    echo '</div>';

}
echo '</h1>';

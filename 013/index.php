<?php

function fun($param) {
    echo '<h1>Have fun!</h1>';
    return $param;
    echo '<h1>Not fun!</h1>';
}



// $d = 7;
// fun(5);
// var_dump(fun($d));


function sum($a, $b, $c, $d = 0) {
    return $a + $b + $c * $d;
}
echo '<br>';

// echo sum(2, 3, 10);


function bigSum($a, ...$sums) { // ... - rest operator
    $sum = 0;
    foreach ($sums as $value) {
        $sum += $value;
    }
    return $sum;
}


// echo '<br>';
// echo bigSum('A', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
// echo '<br>';
// echo bigSum('A', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 100);
// echo '<br>';
// echo bigSum('A', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 100, 1000);
// echo '<br>';
// echo bigSum('A');
// echo '<br>';

function multiply($a, $b, $c, $d = 10) {
    return $a * $b * $c * $d;
}

// echo '<br>';
// echo multiply(1, 5, 7);
// echo '<br>';
// $digit = [1, 5, 7];
// echo multiply(...$digit); // ... - spread operator

// echo '<br>';


// function strongType(int $a, int $b) : int {
//     return 'A';
//     return $a + $b;
// }


// echo '<br>';
// echo strongType(8, 2);

// echo '<br>';


$raccoon = 'Raccoon';

function raccoon() {
    global $raccoon, $fox; // global scope is very bad practice

    $fox = 'Fox';

    echo $raccoon;
}

// raccoon();
// echo '<br>';
// echo $fox;

// echo '<br>';

// function withStatic() {
//     static $a = 0;
//     echo $a;
//     echo '<br>';
//     $a++;
// }

// withStatic();
// withStatic();
// withStatic();
// withStatic();


echo '<br>';


// function withRecursion($a) {
//     echo 'Enter: ' . $a;
//     echo '<br>';
//     if ($a < 3) {
//         withRecursion($a + 1);
//     }
//     echo 'Exit: ' . $a;
//     echo '<br>';
// }

// withRecursion(1);


$arrayForRecursionSum = 
[
    10, [[50, [70, 10, 20], 30, [[[70], 10]]], 20, 30], 11, [40, [[50], 70, [50, 10], 30], 60, 10], 50
];

echo '<pre>';
// print_r($arrayForRecursionSum);



function recursionSum(array $array) {
    $sum = 0;
    foreach ($array as $value) {
        if (is_array($value)) {
            $sum += recursionSum($value);
        } else {
            $sum += $value;
        }
    }
    return $sum;
}

echo '<br>';

echo recursionSum($arrayForRecursionSum);

echo '<br>';

$anonym = function($a, $b) {
    return $a + $b;
};

$anonym = fn($a, $b) => $a + $b;

function dontHaveAnonym(int $a, int $b) {
    return $a + $b;
}

// echo $anonym(1, 2);


function withCallback(int $a, int $b, Closure $callback) {
    return $callback($a, $b);
}

echo withCallback(10, 222, $anonym);

echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';

// echo withCallback(10, 222, 'dontHaveAnonym');


// echo withCallback(11, 11, function($a, $b) {
//     return $a * $b;
// });


$ba = 777;
$va = 888;

$anonym = function($a, $b) use ($ba, $va) {
    return $a + $b + $ba + $va;
};

$anonArrow = fn($a, $b) => $a + $b + $ba;

echo '<br>';


echo $anonym(1, 2);

echo '<br>';

echo $anonArrow(1, 2);
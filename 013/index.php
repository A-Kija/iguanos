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

raccoon();
echo '<br>';
echo $fox;

echo '<br>';

function withStatic() {
    static $a = 0;
    echo $a;
    echo '<br>';
    $a++;
}

withStatic();
withStatic();
withStatic();
withStatic();

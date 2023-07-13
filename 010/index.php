<?php

$str = '88 Labas '. rand(10, 99);

echo "<h1>$str</h1>";

// $letterR = str_contains($str, '22');

$letterR = preg_match_all('/\d{2}/', $str, $matches);

var_dump($matches);
<?php

require __DIR__  . '\River.php';
require __DIR__  . '\Beaver.php';



$animal1 = new Beaver('Bucky');

echo '<pre>';

echo $animal1->title . '<br>';
echo $animal1->name . '<br>';
echo $animal1->long . '<br>';
// echo $animal1->fishes . '<br>';
echo $animal1->bla . '<br>';

echo River::$hello . '<br>';
echo Beaver::$hello . '<br>';

echo River::getHello() . '<br>';
echo Beaver::getHello() . '<br>';

// var_dump($animal1);
<?php

require __DIR__ . '/Cart.php';


require __DIR__ . '/Country.php';
require __DIR__ . '/Forest.php';
require __DIR__ . '/Witch.php';


// $forest1 = new Forest(100, 'Amazon');
// $forest2 = new Forest(200, 'Bialowieza');


// echo $forest1->area;
// echo $forest1->treesCount;
// echo $forest1->cut();
// echo $forest1->treesCount;
// echo $forest1->cut();
// echo $forest1->treesCount;
// echo $forest2->area;
// echo $forest2->treesCount;

// $forest1->kill();
// $forest2->kill();

// Forest::addAnimals();

// $cart1 = Cart::getCart();
// $cart2 = Cart::getCart();

// echo '<pre>';

// var_dump($cart1);
// var_dump($cart2);


$witch1 = new Witch('Gandalf', 1000, 100, 'Amazon');


$witch1->cut();
$witch1->kill();


echo '<pre>';
var_dump($witch1);

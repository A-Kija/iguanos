<?php


require __DIR__ . '/Stikline.php';
require __DIR__ . '/Grybas.php';
require __DIR__ . '/Krepsys.php';
require __DIR__ . '/MarsoPalydovas.php';


$stikline1 = new Stikline(200);
$stikline2 = new Stikline(150);
$stikline3 = new Stikline(100);


$stikline3->ipilti($stikline2->ipilti(
    $stikline1
    ->ipilti(33)
    ->ispilti()
    )->ispilti());

echo '<pre>';
// var_dump($stikline1);
// var_dump($stikline2);
// var_dump($stikline3);

$krepsys = new Krepsys(500);

while ($krepsys->deti(new Grybas)) {}

// var_dump($krepsys);

$palydovas1 = MarsoPalydovas::palydovas();
$palydovas2 = MarsoPalydovas::palydovas();
$palydovas3 = MarsoPalydovas::palydovas();
$palydovas4 = MarsoPalydovas::palydovas();


var_dump($palydovas1);
var_dump($palydovas2);
var_dump($palydovas3);
var_dump($palydovas4);
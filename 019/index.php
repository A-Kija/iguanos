<?php

require __DIR__ . '/Bebras.php';
require __DIR__ . '/Bugnas.php';

$bebras1 = new Bebras;
$bebras2 = new Bebras;
$bebras3 = $bebras1;


$bebras1->svoris = 45;
$bebras2->svoris = 35;





// $bebras1->plaukia();
// $bebras2->plaukia();

// $bebras1->spalva = 'juoda';

// $bebras1->keistiSpalva('juoda');
$bebras1->spalva = 'balta';
// echo $bebras1->kokiaSpalva();
echo $bebras1->spalva;

echo '<br>';

echo $bebras1->greitis;

echo '<br>';

echo $bebras1->neTavoReikalas;


echo '<br><pre>';
// var_dump($bebras1);
// var_dump($bebras2);
// var_dump($bebras3);



$bugnas = new Bugnas;


$bugnas->bum = 'bum';
$bugnas->bum = 'babam';
$bugnas->bum = 'bam';
$bugnas->tum = 'babam';
$bugnas->bum = 'bam';
$bugnas->bum = 'tuk';

echo '<br>';
echo '<br>';
echo '<br>';
// $bugnas->getBum();
$bugnas->bums;

<?php

require __DIR__ . '/Kibiras1.php';
require __DIR__ . '/Pinigine.php';
require __DIR__ . '/Pinigine1.php';

$kibiras1 = new Kibiras1;
$kibiras2 = new Kibiras1;

$kibiras1->prideti1Akmeni();
$kibiras1->pridetiDaugAkmenu(5);
$kibiras1->pridetiDaugAkmenu(5);
$kibiras2->prideti1Akmeni();
$kibiras2->prideti1Akmeni();
$kibiras1->pridetiDaugAkmenu(5);
$kibiras1->pridetiDaugAkmenu(5);
$kibiras2->prideti1Akmeni();
$kibiras2->pridetiDaugAkmenu(5);
$kibiras2->pridetiDaugAkmenu(5);


$kibiras1->akmenuKiekis;
$kibiras2->akmenuKiekis;

$pinigine1 = new Pinigine;

$pinigine1->ideti(1);
$pinigine1->ideti(0.7);
$pinigine1->ideti(1);
$pinigine1->ideti(22);
$pinigine1->ideti(4);

$pinigine1->skaiciuoti();


$pinigine2 = new Pinigine1;

$pinigine2->ideti(1);
$pinigine2->ideti(0.7);
$pinigine2->ideti(1);
$pinigine2->ideti(22);
$pinigine2->ideti(4);

$pinigine2->skaiciuoti();


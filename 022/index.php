<?php
use Bebras\Bebrauskas\Writer as Linker;

require __DIR__ . '/Nice.php';
require __DIR__ . '/LetterSpacing.php';
require __DIR__ . '/RandomColor.php';
require __DIR__ . '/Writer.php';
require __DIR__ . '/Bebras/Writer.php';


$writer = new Writer();

$linker1 = new Linker();
$linker2 = new Linker();
$linker3 = new Linker();
$linker4 = new Linker();

var_dump($linker1);


$writer->write('Once upon a time there was a beautiful princess named Anna. She lived in a castle with her sister Elsa.');


$writer->sayHi();

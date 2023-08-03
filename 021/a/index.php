<?php

require __DIR__  . '\NicePlan.php';
require __DIR__  . '\WriterPlan.php';
require __DIR__  . '\Writer.php';
require __DIR__  . '\MyWriter.php';


$author1 = new MyWriter;



function write(NicePlan $author)
{
    $author->write('Hello nice and clean forest of Magic!');
}



write($author1);

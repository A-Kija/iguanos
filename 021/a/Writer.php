<?php


abstract class Writer implements WriterPlan
{
    public function write($text)
    {
        echo '<h1 style="color:'.$this->randomColor().';">' . $text . '</h1>';
    }
}
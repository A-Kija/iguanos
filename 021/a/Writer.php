<?php


abstract class Writer
{
    public function write($text)
    {
        echo '<h1 style="color:'.$this->randomColor().';">' . $text . '</h1>';
    }

    public abstract function randomColor();
}
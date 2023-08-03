<?php

class RandomColor {

    public function randomColor()
    {
        $colors = ['red', 'green', 'blue', 'yellow', 'pink', 'purple', 'orange', 'black', 'grey'];
        return $colors[rand(0, count($colors) - 1)];
    }

    public function sayHi()
    {
        echo '<h1>Hi From Nice RandomColor!</h1>';
    }
}
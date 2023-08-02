<?php

class MyWriter extends Writer {

    public function randomColor()
    {
        $colors = ['red', 'green', 'blue', 'yellow', 'pink', 'black', 'orange', 'purple', 'brown', 'grey'];
        return $colors[rand(0, count($colors) - 1)];
    }
    
}
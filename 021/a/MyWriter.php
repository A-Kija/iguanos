<?php

class MyWriter extends Writer implements WriterPlan, NicePlan {

    public function randomColor()
    {
        $colors = ['red', 'green', 'blue', 'yellow', 'pink', 'black', 'orange', 'purple', 'brown', 'grey'];
        return $colors[rand(0, count($colors) - 1)];
    }

    public function goNice()
    {
        echo 'I am going nice!';
    }
    
}
<?php


trait LetterSpacing {
        
    public function letterSpacing()
    {
        return rand(0, 10);
    }

    public function sayHi()
    {
        echo '<h1>Hi From LetterSpacing Trait!</h1>';
    }
}
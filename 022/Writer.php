<?php

class Writer extends RandomColor
{
    use LetterSpacing, Nice {
        Nice::sayHi insteadof LetterSpacing;
        LetterSpacing::sayHi as sayHiFromLetterSpacing;
    }

    public $imNice = 'I am nice';
    
    public function write($text)
    {
        echo '<h1 style="color:'.$this->randomColor().'; letter-spacing:'.$this->letterSpacing().'px;">' . $text . '</h1>';
    }

    // public function sayHi()
    // {
    //     echo '<h1>Hi From Nice Writer!</h1>';
    // }
}
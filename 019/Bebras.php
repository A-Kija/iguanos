<?php

class Bebras {

    // variables - properties 

    private $spalva = 'ruda';  // public, private, protected
    public $svoris;
    private $greitis = '20km/h';
    private $neTavoReikalas = 'labas';




    // functions - methods

    // public function plaukia()
    // {
    //     echo '<h1>'.$this->spalva.' bebre plaukia</h1>';
    // }

    public function __get($prop)
    {
        if ($prop == 'amzius') {
            return rand(1, 10);
        }

        if ($prop == 'neTavoReikalas') {
            return 'neTavoReikalas';
        }

        if (!in_array($prop, ['spalva', 'greitis'])) {
            return;
        }
        
        return $this->$prop;
    }

    public function __set($prop, $val)
    {
        if ($prop == 'spalva' && !in_array($val, ['juoda', 'ruda', 'balta'])) {
            return;
        }
        
        
        $this->$prop = $val;
    }



    public function kokiaSpalva()
    {
        return $this->spalva;
    }

    public function keistiSpalva($spalva)
    {
        if (!in_array($spalva, ['juoda', 'ruda', 'balta'])) {
            return;
        }

        $this->spalva = $spalva;
    }



}
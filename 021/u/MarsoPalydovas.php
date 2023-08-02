<?php


class MarsoPalydovas {
    private static $palydovai = [];
    private static $vardai = ['Deimas', 'Fobas'];
    private $vardas;

    private function __construct($vardas) {
        $this->vardas = $vardas;
    }


    public static function palydovas() {
        if (!isset(self::$palydovai[0])) {
            return self::$palydovai[0] = new self(self::$vardai[0]);
        } elseif (!isset(self::$palydovai[1])) {
            return self::$palydovai[1] = new self(self::$vardai[1]);
        } else {
            return self::$palydovai[rand(0, 1)];
        }
    }
    
}
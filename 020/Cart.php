<?php

class Cart {


    private static $cart;

    public static function getCart()
    {
        return self::$cart ?? self::$cart = new self;
    }

    private function __construct()
    {        
    }


}
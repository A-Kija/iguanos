<?php


class River {
    public $bla = 'bla';
    public $title;
    protected $long;
    static public $hello = 'hello';
    private static $allFishes = [
        'heck',
        'trout',
        'carp',
        'pike',
        'catfish',
        'salmon',
        'bass',
        'sturgeon'
    ];
    private $fishes = [];

    public function __construct($title, $long) {
        $this->title = $title;
        $this->long = $long;
        $this->fishes = range(1, rand(1, 10));
        array_walk($this->fishes, function (&$fish) {
            $fish = self::$allFishes[rand(0, count(self::$allFishes) - 1)];
        });
    }

    static public function getHello() {
        return self::$hello .' - '. static::$hello;
    }



}
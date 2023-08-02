<?php


class Beaver extends River {
    public $name;
    // public $bla = 'kuku';

    public static $hello = 'hello from Beaver';

    public function __construct($name) {
        parent::__construct('Dunajec', '247 km');
        $this->name = $name;
    }

    public function __get($name) {

        if ($name === 'long') {
            return $this->long;
        }

        if ($name === 'fishes') {
            return $this->fishes;
        }
    }

}
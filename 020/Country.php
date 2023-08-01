<?php


class Country {

    public $countryName;
    private $countryList = [
        'Poland',
        'Germany',
        'France',
        'Spain',
        'Italy',
        'Russia',
        'USA',
        'China',
    ];

    public function __construct()
    {
        // random country
        $this->countryName = $this->countryList[rand(0, count($this->countryList) - 1)];
    }
}
<?php


class Stikline {
    private $turis;
    private $kiekis = 0;

    public function __construct($turis) {
        $this->turis = $turis;
    }

    public function ipilti($kiekis) {
        $this->kiekis += $kiekis;
        $this->kiekis = min($this->kiekis, $this->turis);
        return $this;
    }

    public function ispilti() {
        $kiekis = $this->kiekis;
        $this->kiekis = 0;
        return $kiekis;
    }

    public function getKiekis() {
        return $this->kiekis;
    }
}
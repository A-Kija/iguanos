<?php


class Krepsys {
    private $dydis;
    private $kiekis = 0;

    public function __construct($dydis) {
        $this->dydis = $dydis;
    }

    public function deti(Grybas $grybas) : bool {
        if ($grybas->valgomas && !$grybas->sukirmijes) {
            $this->kiekis += $grybas->svoris;
        }
        return $this->kiekis < $this->dydis;
    }

    public function kiekis() {
        return $this->kiekis;
    }
}
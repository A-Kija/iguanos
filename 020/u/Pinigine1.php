<?php

class Pinigine1 {
            
            private $popieriniaiPinigai = [];
            private $metaliniaiPinigai = [];
            
            public function ideti($kiekis)
            {
                if ($kiekis < 2) {
                    $this->metaliniaiPinigai[] = $kiekis;
                } else {
                    $this->popieriniaiPinigai[] = $kiekis;
                }
            }
            
            public function skaiciuoti()
            {
                echo '<h1>Popieriniai pinigai: ' . array_sum($this->popieriniaiPinigai) . '</h1>';
                echo '<h1>Banknotai: ' . count($this->popieriniaiPinigai) . '</h1>';
                echo '<h1>Metaliniai pinigai: ' . array_sum($this->metaliniaiPinigai) . '</h1>';
                echo '<h1>Monetos: ' . count($this->metaliniaiPinigai) . '</h1>';
            }
            
            public function __get($prop)
            {
                if ($prop == 'popieriniaiPinigai' || $prop == 'metaliniaiPinigai') {
                    $this->skaiciuoti();
                }
            }
}
<?php

class Pinigine {
        
        private $popieriniaiPinigai = 0;
        private $metaliniaiPinigai = 0;
        
        public function ideti($kiekis)
        {
            if ($kiekis < 2) {
                $this->metaliniaiPinigai += $kiekis;
            } else {
                $this->popieriniaiPinigai += $kiekis;
            }
        }
        
        public function skaiciuoti()
        {
            echo '<h1>Popieriniai pinigai: ' . $this->popieriniaiPinigai . '</h1>';
            echo '<h1>Metaliniai pinigai: ' . $this->metaliniaiPinigai . '</h1>';
        }
        
        public function __get($prop)
        {
            if ($prop == 'popieriniaiPinigai' || $prop == 'metaliniaiPinigai') {
                $this->skaiciuoti();
            }
        }
}
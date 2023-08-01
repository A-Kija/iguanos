<?php

class Kibiras1 {
        
        private $akmenuKiekis = 0;
    
        public function prideti1Akmeni()
        {
            $this->akmenuKiekis++;
        }
    
        public function pridetiDaugAkmenu($kiekis)
        {
            if (!is_integer($kiekis)) {
                return;
            }
            $this->akmenuKiekis += $kiekis;
        }
    
        public function kiekPririnktaAkmenu()
        {
            echo '<h1>Akmenų kiekis: ' . $this->akmenuKiekis . '</h1>';
        }
    
        public function __get($prop)
        {
            if ($prop == 'akmenuKiekis') {
                $this->kiekPririnktaAkmenu();
            }
        }
}
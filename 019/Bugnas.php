<?php

class Bugnas {
    
        private $bums = [];
    
        public function __set($prop, $val)
        {
            if ($prop == 'bum' && in_array($val, ['bum', 'bam', 'tuk'])) {
                $this->bums[] = $val;
            }
        }
    
        public function getBum()
        {
            echo '<h1>';
            foreach ($this->bums as $bum) {
                echo $bum . ' ';
            }
            echo '</h1>';
            // how much bums
            echo '<h2>' . count($this->bums) . '</h2>';
            
        }

        public function __get($prop)
        {
            if ($prop == 'bums') {
                $this->getBum();
            }
        }
}
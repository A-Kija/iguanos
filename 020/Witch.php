<?php


class Witch extends Forest {
    
        private $name;
        private $age;

        public function __construct($name, $age, $area, $title)
        {
            parent::__construct($area, $title);
            $this->name = $name;
            $this->age = $age;
            echo "Witch $this->name created<br>";
        }

        public function __destruct()
        {
            echo "Witch $this->name destructed.<br>";
            parent::__destruct();
        }
        
}
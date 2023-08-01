<?php


class Forest extends Country {

    private $area, $treesCount, $title;

    private static $animalsCount = 222;

    
    public static function addAnimals()
    {
        $count = rand(20, 40);
        self::$animalsCount += $count;
        echo "$count animals added<br>";
    }
    
    
    public function __construct($area, $title)
    {
        parent::__construct();
        $this->area = $area;
        $this->treesCount = $area * rand(700, 1000);
        $this->title = $title;
        echo "Forest $this->title created<br>";
    }

    public function __destruct()
    {
        echo "Forest $this->title destructed.<br> Animals left: " . self::$animalsCount . "<br>";
    }

    public function kill()
    {
        $kill = rand(1, 10);
        self::$animalsCount -= $kill;
        echo "$kill animals killed<br>";
    }



    public function cut()
    {
        $cut = rand(1000, 9999);
        $this->treesCount -= $cut;
        echo "$cut trees cut<br>";
    }

    public function __get($prop)
    {
        if ($prop == 'area') {
            return $this->area . ' km2<br>';
        }
        if ($prop == 'treesCount') {
            return $this->treesCount . ' trees<br>';
        }
    }

}
<?php
namespace Lina;
use Lina\Garden\Apple;

class Hello extends Apple {
    public function __construct() {
        parent::__construct();
        echo '<h1>Hi from Lina</h1>';
    }
}
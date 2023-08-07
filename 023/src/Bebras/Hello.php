<?php
namespace Bebras;
use Bebras\Forest\River;

class Hello extends River {
    public function __construct() {
        parent::__construct();
        echo '<h1>Hi from Bebras</h1>';
    }
}
<?php
use Donuts\App;


define('ROOT', __DIR__ . '/../');
define('URL', 'http://donuts.test/');

require_once '../vendor/autoload.php';


echo App::start();
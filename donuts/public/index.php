<?php
use Donuts\App;

session_start();
define('ROOT', __DIR__ . '/../');
define('URL', 'http://donuts.test/');

require '../app/functions.php';
require '../vendor/autoload.php';


echo App::start();
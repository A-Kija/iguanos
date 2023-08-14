<?php
namespace Donuts\Controllers;

use Donuts\App;


class HomeController
{
    public function index()
    {
        return App::view('home/index', [
            'pageTitle' => 'Home page',
            'showNav' => true,
        ]);
    }
}
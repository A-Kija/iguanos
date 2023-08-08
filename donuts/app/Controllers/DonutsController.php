<?php
namespace Donuts\Controllers;

use Donuts\App;

class DonutsController
{
    public function index()
    {
        return App::view('donuts/index', [
            'pageTitle' => 'Donuts index page',
        ]);
    }
}
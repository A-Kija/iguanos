<?php
namespace Donuts\Controllers;

use Donuts\App;
use Donuts\DB\FileDB;

class DonutsController
{
    
    private $coatings = [
        ['id' => 1, 'title' => 'Chocolate', 'color' => 'brown'],
        ['id' => 2, 'title' => 'Powdered sugar', 'color' => 'skyblue'],
        ['id' => 3, 'title' => 'Caramel', 'color' => 'darksalmon'],
        ['id' => 4, 'title' => 'Strawberry', 'color' => 'crimson'],
        ['id' => 5, 'title' => 'Blueberry', 'color' => 'indigo'],
        ['id' => 6, 'title' => 'Orange', 'color' => 'darkorange'],
        ['id' => 7, 'title' => 'Lemon', 'color' => 'limegreen'],
    ];
    
    
    
    
    public function index()
    {
        $donuts = (new FileDB('donuts'))->showAll();
        
        return App::view('donuts/index', [
            'pageTitle' => 'Donuts index page',
            'donuts' => $donuts,
        ]);
       
    }

    public function create()
    {
        return App::view('donuts/create', [
            'pageTitle' => 'Create new donut',
            'coatings' => $this->coatings,
        ]);
    }

    public function store()
    {
        $data = [
            'title' => $_POST['title'],
            'coating' => $_POST['coating'],
            'extra' => $_POST['extra'] ?? 'off',
            'desc' => $_POST['desc'],
            'hole' => $_POST['hole']
        ];
        
        (new FileDB('donuts'))->create($data);

        return App::redirect('donuts');
    }
}
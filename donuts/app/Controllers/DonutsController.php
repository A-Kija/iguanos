<?php
namespace Donuts\Controllers;

use Donuts\App;
use Donuts\DB\Storage;
use Donuts\Messages;

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
        $donuts = Storage::getStorage('donuts')->showAll();
        
        return App::view('donuts/index', [
            'pageTitle' => 'Donuts index page',
            'donuts' => $donuts,
            'coatings' => $this->coatings,
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
        
        $errors = false;
        if (!isset($_POST['title']) || strlen($_POST['title']) < 3) {
            Messages::add('Donut title must be at least 3 characters long', 'danger');
            $errors = true;
        }
        if (!isset($_POST['desc']) || strlen($_POST['desc']) < 3) {
            Messages::add('Donut description must be at least 3 characters long', 'danger');
            $errors = true;
        }

        if ($errors) {
            flash();
            return App::redirect('donuts/create');
        }
        
        $data = [
            'title' => $_POST['title'],
            'coating' => $_POST['coating'],
            'extra' => $_POST['extra'] ?? 'off',
            'desc' => $_POST['desc'],
            'description' => $_POST['desc'], // desc can be saved as description (old version)
            'hole' => $_POST['hole']
        ];
        
        Storage::getStorage('donuts')->create($data);

        Messages::add('Donut created', 'success');

        return App::redirect('donuts');
    }

    public function delete($id)
    {
        if (!is_numeric($id) || !is_integer($id + 0)) {
            http_response_code(404);
            return App::viewError('404');
        }
        
        $donut = Storage::getStorage('donuts')->show($id);

        if (!$donut) {
            http_response_code(404);
            return App::viewError('404');
        }

        return App::view('donuts/delete', [
            'pageTitle' => 'Confirm delete',
            'donut' => $donut,
        ]);
    }

    public function destroy($id)
    {

        // All check $id
        // if (!is_numeric($id) || !is_integer($id + 0)) {
        //     http_response_code(404);
        //     return App::viewError('404');
        // }

        Storage::getStorage('donuts')->delete($id);

        Messages::add('Donut deleted', 'success');

        return App::redirect('donuts');
    }

    public function edit($id)
    {
        
        if (!is_numeric($id) || !is_integer($id + 0)) {
            http_response_code(404);
            return App::viewError('404');
        }
        
        $donut = Storage::getStorage('donuts')->show($id);

        if (!$donut) {
            http_response_code(404);
            return App::viewError('404');
        }

        // desc can be saved as description (old version)
        if (!isset($donut['desc'])) {
            $donut['desc'] = $donut['description'];
        }

        return App::view('donuts/edit', [
            'pageTitle' => 'Edit donut',
            'donut' => $donut,
            'coatings' => $this->coatings,
        ]);
    }

    public function update($id)
    {
        
        $errors = false;
        if (!isset($_POST['title']) || strlen($_POST['title']) < 3) {
            Messages::add('Donut title must be at least 3 characters long', 'danger');
            $errors = true;
        }
        if (!isset($_POST['desc']) || strlen($_POST['desc']) < 3) {
            Messages::add('Donut description must be at least 3 characters long', 'danger');
            $errors = true;
        }

        if ($errors) {
            flash();
            return App::redirect('donuts/create');
        }
        
        
        $data = [
            'title' => $_POST['title'],
            'coating' => $_POST['coating'],
            'extra' => $_POST['extra'] ?? 'off',
            'desc' => $_POST['desc'], // desc can be saved as description (old version)
            'description' => $_POST['desc'],
            'hole' => $_POST['hole']
        ];

        Storage::getStorage('donuts')->update($id, $data);
        Messages::add('Donut updated', 'success');

        return App::redirect('donuts');
    }

    public function show($id)
    {
        $donut = Storage::getStorage('donuts')->show($id);

        // desc can be saved as description (old version)
        if (!isset($donut['desc'])) {
            $donut['desc'] = $donut['description'];
        }

        return App::view('donuts/show', [
            'pageTitle' => 'Donut details',
            'donut' => $donut,
            'coatings' => $this->coatings,
        ]);
    }
}
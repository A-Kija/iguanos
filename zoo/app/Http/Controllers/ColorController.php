<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ColorController extends Controller
{
    public function index()
    {
        return Inertia::render('Colors/Index', [
            'colors' => [
                'crimson',
                'darkorange',
                'skyblue',
            ],
            'size' => 40,
        ]);
    }

    public function indexB()
    {
       return view('colors.index', [
           'colors' => [
               'crimson',
               'darkorange',
               'skyblue',
           ],
           'size' => 40,
       ]);
    }
}

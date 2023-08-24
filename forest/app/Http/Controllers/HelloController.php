<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function hello(Request $request, $color)
    {
        dump($request->all());
        dump($request->size);
        // print_r($request);
        
        return '<h1 style="font-size:'.$request->size.'px;color:'.$color.';">Hello my name is Forest and my favorite color is ' . $color . '</h1>';
    }

    public function helloBlade(Request $request)
    {
        
        $people = [
            ['name' => 'Forest', 'age' => 22],
            ['name' => 'Bob', 'age' => 33],
            ['name' => 'Alice', 'age' => 44],
        ];
        
        return view('go.hello', [
            'color' => $request->color,
            'font' => $request->font,
            'people' => $people,
        ]);
    }

    public function byeByeBlade()
    {
        return view('go.bye');
    }

}

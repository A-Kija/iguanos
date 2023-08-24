<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SumController extends Controller
{
    public function showForm(Request $request)
    {
        $sum = $request->session()->get('sum', '');
        // $sum = $request->session()->pull('sum', '');
        return view('sum.form', [
            'sum' => $sum
        ]);
    }

    public function submitForm(Request $request)
    {
        
        
        $validator = Validator::make($request->all(), [
            'x' => 'required|numeric',
            'y' => 'required|numeric',
        ], [
            'x.required' => 'pamiršai X',
            'y.required' => 'pamiršai Y',
            'x.numeric' => 'X ne numeris',
            'y.numeric' => 'Y ne numeris',
        ]);
 
        if ($validator->fails()) {
            return redirect()
            ->route('sum-form')
            ->withErrors($validator)
            ->withInput();
        }
        
        
        
        $x = $request->input('x');
        $y = $request->input('y');
        $sum = $x + $y;
        // $request->session()->put('sum', $sum);
        // $request->session()->flash('sum', $sum);

        $request->flash(); // flash old input

        return redirect()
        ->route('sum-form')
        ->with('sum', $sum);
    }
}

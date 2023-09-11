<?php
namespace App\Http\Validators;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductValidator
{

    public function validate(Request $request)
    {
        $validator = Validator::make(
            $request->all(), 
            [
                'name' => 'required|min:3|max:255',
                'price' => 'required|numeric',
                'discount' => 'required|numeric',
                'description' => 'required|min:3|max:10000',
            ], 
            [
                'name.required' => 'Product name is required.',
                'name.min' => 'Product name must be at least 3 characters.',
                'name.max' => 'Product name must be less than 255 characters.',
                'price.required' => 'Product price is required.',
                'price.numeric' => 'Product price must be a number.',
                'discount.required' => 'Product discount is required.',
                'discount.numeric' => 'Product discount must be a number.',
                'description.required' => 'Product description is required.',
                'description.min' => 'Product description must be at least 30 characters.',
                'description.max' => 'Product description must be less than 10000 characters.',
            ]
        );

        return $validator;
    }


}
<?php
namespace App\Http\Validators;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientValidator
{

    public function validate(Request $request)
    {
        $validator = Validator::make(
            $request->all(), 
            [
                'name' => 'required|min:3|max:255',
                'address' => 'required|min:3|max:255',
                'address2' => 'nullable|min:3|max:255',
                'vat' => 'nullable|min:3|max:255',
                'country' => 'required|min:2|max:2',
            ], 
            [
                'name.required' => 'Client name is required.',
                'name.min' => 'Client name must be at least 3 characters.',
                'name.max' => 'Client name must be less than 255 characters.',
                'address.required' => 'Client address is required.',
                'address.min' => 'Client address must be at least 3 characters.',
                'address.max' => 'Client address must be less than 255 characters.',
                'address2.min' => 'Client address2 must be at least 3 characters.',
                'address2.max' => 'Client address2 must be less than 255 characters.',
                'vat.min' => 'Client vat must be at least 3 characters.',
                'vat.max' => 'Client vat must be less than 255 characters.',
                'country.required' => 'Client country is required.',
                'country.min' => 'Client country must be at least 2 characters.',
                'country.max' => 'Client country must be less than 2 characters.',
            ]
        );

        return $validator;
    }

}
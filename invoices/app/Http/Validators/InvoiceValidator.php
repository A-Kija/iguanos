<?php
namespace App\Http\Validators;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvoiceValidator
{

    public function validate(Request $request)
    {
        $validator = Validator::make(
            $request->all(), 
            [
                'number' => 'null|unique:invoices,invoice_number|min:3|max:20',
                'date' => 'required|date_format:Y-m-d',
                'client_id' => 'required|exists:clients,id',
                'product_id.*' => 'required|exists:products,id',
                'quantity.*' => 'required|numeric|min:1|max:1000',

            ], 
            [
                'number.required' => 'Invoice number is required',
                'number.unique' => 'Invoice number must be unique',
                'number.min' => 'Invoice number must be at least 3 characters',
                'number.max' => 'Invoice number must be at most 20 characters',
                'date.required' => 'Invoice date is required',
                'date.date_format' => 'Invoice date must be in format YYYY-MM-DD',
                'client_id.required' => 'Client is required',
                'client_id.exists' => 'Client must exist',
                'product_id.required' => 'Product is required',
                'product_id.exists' => 'Product must exist',
                'quantity.required' => 'Quantity is required',
                'quantity.numeric' => 'Quantity must be a number',
                'quantity.min' => 'Quantity must be at least 1',
                'quantity.max' => 'Quantity must be at most 1000',
            ]
        );

        return $validator;
    }


}
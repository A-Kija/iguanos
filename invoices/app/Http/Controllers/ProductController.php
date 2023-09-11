<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Validators\ProductValidator;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        $products = Product::select('*')->orderBy('price', 'desc')->get();

dump($request->sort);

        return view('products.index', [
            'products' => $products,
            'sorts' => Product::SORTS,
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validator = (new ProductValidator())->validate($request);
        if ($validator->fails()) {
            return redirect()
            ->route('products-create')
            ->withErrors($validator)
            ->withInput();
        }
        
        Product::create($request->all());
        return redirect()
        ->route('products-index')
        ->with('msg', [
            'type' => 'success',
            'content' => 'Product was created successfully.'
        ]);
    }


    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        
        $validator = (new ProductValidator())->validate($request);
 
        if ($validator->fails()) {
            return redirect()
            ->route('products-edit', ['product' => $product])
            ->withErrors($validator)
            ->withInput();
        }
        
        $product->update($request->all());
        return redirect()
        ->route('products-index')
        ->with('msg', ['type' => 'success', 'content' => 'Product was updated successfully.']);
    }

    /**
    * Show delete confirmation page.
    */

    public function delete(Product $product)
    {
        return view('products.delete', [
            'product' => $product,
            'invoicesCount' => $product->invoices()->count(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()
        ->route('products-index')
        ->with('msg', ['type' => 'info', 'content' => 'Product was deleted successfully.']);
    }
}

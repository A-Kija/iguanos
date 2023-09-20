<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Validators\ProductValidator;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        $products = Product::select('*');

        $products = match($request->sort) {
            'price' => $products->orderBy('price', 'asc'),
            'price_desc' => $products->orderBy('price', 'desc'),
            'name' => $products->orderBy('name', 'asc'),
            'name_desc' => $products->orderBy('name', 'desc'),
            default => $products,
        };

        $products = match($request->discount) {
            'discount' => $products->where('discount', '>', 0),
            'no_discount' => $products->where('discount', '=', 0),
            default => $products,
        };

        $maxProductPrice = Product::max('price');
        $minProductPrice = Product::min('price');

        $filterMaxPrice = $request->max ?? $maxProductPrice;
        $filterMinPrice = $request->min ?? $minProductPrice;

        $products = $products->where('price', '<=', $filterMaxPrice);
        $products = $products->where('price', '>=', $filterMinPrice);

        // $products = $products->where('price', '>', 10);
        
        // $products = $products->where('price', '<', 60);

        $products = match($request->per_page) {
            'all' => $products->get(),
            '30' => $products->paginate(30)->withQueryString(),
            '50' => $products->paginate(50)->withQueryString(),
            default => $products->paginate(15)->withQueryString(),
        };
        





        return view('products.index', [
            'products' => $products,
            'sorts' => Product::SORTS,
            'discountFilters' => Product::DISCOUNT_FILTERS,
            'perPageOptions' => Product::RESULTS_PER_PAGE,
            'selectedSort' => $request->sort ?? '',
            'perPage' => $request->per_page ?? '15',
            'selectedDiscount' => $request->discount ?? '',
            'selectedMax' => $filterMaxPrice,
            'selectedMin' => $filterMinPrice,
            'maxProductPrice' => $maxProductPrice,
            'minProductPrice' => $minProductPrice,
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function showLine()
    {
        $html = view('products.line')->render();
        return response()->json(['html' => $html]);
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

        $images = [];
        foreach ($request->file('image') ?? [] as $file) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $images[] = $fileName;
        }
        $request->merge(['images' => $images]);
        
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
        
        $imagesOnServer = $product->images ?? [];
        $oldImages = $request->old_image ?? [];
        $editedImages = $request->edited_images ?? [];


        foreach ($editedImages as $index => $editedFileName) {
            if ($editedFileName == 'none') {
                continue;
            }
            $fileName = time() . '_' . $request->file('image')[$index]->getClientOriginalName();
            $image->move(public_path('images'), $fileName);
            if (file_exists(public_path('images/' . $editedFileName))) {
                unlink(public_path('images/' . $editedFileName));
            }
            $imagesOnServer[$index] = $fileName;
        }


        // Images to delete
        $imagesToDelete = array_diff($imagesOnServer, $oldImages);


        dump($imagesToDelete);
        dd($request->all());
        
        
        
        
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
        // delete images
        foreach ($product->images ?? [] as $image) {
            if (file_exists(public_path('images/' . $image))) {
                unlink(public_path('images/' . $image));
            }
        }

        // delete product       
        $product->delete();

        return redirect()
        ->route('products-index')
        ->with('msg', ['type' => 'info', 'content' => 'Product was deleted successfully.']);
    }
}

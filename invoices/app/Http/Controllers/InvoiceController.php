<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Client;
use App\Models\Product;
use App\Models\ProductInvoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::all(); // get all invoices from the database
        // $invoices are collection of Invoice model objects

        return view('invoices.index', [
            'invoices' => $invoices,
            'countries' => Invoice::$countryList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $prices = [];
        // Product::all()->pluck('price', 'id')->each(function ($item, $key) use (&$prices) {
        //     $prices[] = ['id' => $key, 'price' => $item];
        // })->toArray();

        
        return view('invoices.create', [
                'clients' => Client::all(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // dump($request->all());

        // die;


        $invoice = Invoice::create([
            'invoice_number' => $request->number,
            'invoice_date' => $request->date,
            'client_id' => $request->client_id,
        ]);




        foreach ($request->product_id as $key => $value) {
            $quantity = $request->quantity[$key];
            $inRow = $request->in_row[$key];
            ProductInvoice::create([
                'product_id' => $value,
                'invoice_id' => $invoice->id,
                'quantity' => $quantity,
                'in_row' => $inRow,
            ]);
        }

        return redirect()
            ->route('invoices-index')
            ->with('msg', ['type' => 'success', 'content' => 'Invoice was created successfully.']);
            // redirect to the index page with a success message
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        
        $products = collect(); // create a new collection

        $invoice->getPivot->each(function ($item, $key) use (&$products) {
            $product = (object)[]; // create a new object
            $product->id = $item->product_id;
            $product->quantity = $item->quantity;
            $product->price = $item->product->price;
            $product->name = $item->product->name;
            $product->product_id = $item->product_id;
            $product->total = number_format($item->quantity * $item->product->price, 2);
            $product->in_row = $item->in_row;
          
            $products->add($product); // add the object to the collection
        });
        
        return view('invoices.edit', [
            'invoice' => $invoice,
            'clients' => Client::all(),
            'invoiceLines' => $products,
            'products' => Product::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        $invoice->update([
            'invoice_number' => $request->number,
            'invoice_date' => $request->date,
            'client_id' => $request->client_id,
        ]);


        // Find what to delete
        $toDelete = $invoice->getPivot->filter(function ($item, $key) use ($request) {
            return !in_array($item->product_id, $request->product_id);
        });

        // Delete the items
        $toDelete->each(function ($item, $key) {
            $item->delete();
        });

        // Find what to add
        $toAdd = collect($request->product_id)->filter(function ($item, $key) use ($invoice) {
            return !$invoice->getPivot->contains('product_id', $item);
        });

        // Add the items
        $toAdd->each(function ($item, $key) use ($invoice, $request) {
            $quantity = $request->quantity[$key];
            ProductInvoice::create([
                'product_id' => $item,
                'invoice_id' => $invoice->id,
                'quantity' => $quantity,
            ]);
        });

        // Edit all the rest
        collect($request->product_id)->each(function ($item, $key) use ($invoice, $request) {
            $quantity = $request->quantity[$key];
            $invoice->getPivot->where('product_id', $item)->first()?->update([ // if item exists, update it
                'quantity' => $quantity,
                'product_id' => $item,
                'in_row' => $request->in_row[$key],
            ]);
        });


        // $invoice->getPivot->each(function ($item, $key) {
        //     $item->delete();
        // });

        // foreach ($request->product_id as $key => $value) {
        //     $quantity = $request->quantity[$key];
        //     ProductInvoice::create([
        //         'product_id' => $value,
        //         'invoice_id' => $invoice->id,
        //         'quantity' => $quantity,
        //     ]);
        // }

        return redirect()
            ->route('invoices-index')
            ->with('msg', ['type' => 'success', 'content' => 'Invoice was updated successfully.']);
            // redirect to the index page with a success message
    }

    /**
     * Show delete confirmation page.
     */
    public function delete(Invoice $invoice)
    {
        return view('invoices.delete', [
            'invoice' => $invoice,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete(); // delete the object from the database

        return redirect()
        ->route('invoices-index')
        ->with('msg', ['type' => 'info', 'content' => 'Invoice was deleted successfully.']);
        // redirect to the index page with a info message
    }

    public function showLine()
    {
        $html = view('invoices.line')
        ->with(['products' => Product::all()])
        ->render();

        return response()->json(['html' => $html]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Validators\ClientValidator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $clients = Client::all(); // get all clients from the database
        // $clients are collection of Client model objects
        return view('clients.index', [
            'clients' => $clients,
            'countries' => Client::$countryList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create', [
            'countries' => Client::$countryList,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validator = (new ClientValidator())->validate($request);
 
        if ($validator->fails()) {
            return redirect()
            ->route('clients-create')
            ->withErrors($validator)
            ->withInput();
        }
        
        
        $client = new Client; // new empty invoice object

        // fill the object with data from the request
        $client->client_name = $request->name;
        $client->client_address = $request->address;
        $client->client_address2 = $request->address2;
        $client->client_vat = $request->vat;
        $client->client_country = $request->country;

        $client->save(); // save the object to the database

        return redirect()
            ->route('clients-index')
            ->with('msg', ['type' => 'success', 'content' => 'Client was created successfully.']);
            // redirect to the index page with a success message
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('clients.show', [
            'client' => $client,
            'countries' => Client::$countryList,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit', [
            'client' => $client,
            'countries' => Client::$countryList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        
        $validator = (new ClientValidator())->validate($request);
 
        if ($validator->fails()) {
            return redirect()
            ->route('clients-edit', ['client' => $client])
            ->withErrors($validator)
            ->withInput();
        }
        
        // fill the object with data from the request
        $client->client_name = $request->name;
        $client->client_address = $request->address;
        $client->client_address2 = $request->address2;
        $client->client_vat = $request->vat;
        $client->client_country = $request->country;

        $client->save(); // save the object to the database

        return redirect()
            ->route('clients-index')
            ->with('msg', ['type' => 'success', 'content' => 'Client was updated successfully.']);
            // redirect to the index page with a success message
    }

    /**
     * Show delete confirm window.
     */
    public function delete(Client $client)
    {
        
        return view('clients.delete', [
            'client' => $client,
            'invoicesCount' => $client->invoices()->count(),
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete(); // delete the object from the database
        return redirect()
            ->route('clients-index')
            ->with('msg', ['type' => 'success', 'content' => 'Client was deleted successfully.']);
            // redirect to the index page with a success message
    }
}

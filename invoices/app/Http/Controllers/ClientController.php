<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Validators\ClientValidator;
use App\Services\CountriesService as CS;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, CS $cs)
    {

        $clients = Client::select('*');
        // select distinct countries
        $countries = Client::select('client_country')->distinct()->pluck('client_country')->toArray();
        // add country title to the country code
        $countries = array_map(function ($countryCode) {
            return [$countryCode, $cs->getCountries()[$countryCode]];
        }, $countries);
        // add "All countries" option
        array_unshift($countries, ['all', 'All countries']);
        


        $clients = match($request->sort) {
            'asc' => $clients->orderBy('client_name', 'asc'),
            'desc' => $clients->orderBy('client_name', 'desc'),
            default => $clients,
        };


        // filter by country
        $clients = match($request->country ?? 'all') {
            'all' => $clients,
            default => $clients->where('client_country', $request->country),
        };

        // search by name
        $clients = match($request->s) {
            null => $clients,
            default => $clients->where('client_name', 'like', "%{$request->s}%"),
        };

        $clients = match($request->per_page) {
            'all' => $clients->get(),
            '30' => $clients->paginate(30)->withQueryString(),
            '50' => $clients->paginate(50)->withQueryString(),
            default => $clients->paginate(15)->withQueryString(),
        };


        return view('clients.index', [
            'clients' => $clients,
            'countries' => Client::$countryList,
            'perPage' => $request->per_page ?? '15',
            'perPageOptions' => Client::RESULTS_PER_PAGE,
            'sortOptions' => Client::SORTS,
            'selectedSort' => $request->sort ?? '',
            'selectedCountry' => $request->country ?? '',
            'countryOptions' => $countries,
            's' => $request->s ?? '',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CS $cs)
    {
        return view('clients.create', [
            'countries' => $cs->getCountries()
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


    public function search(Request $request)
    {
        $clients = Client::where('client_name', 'like', "%{$request->q}%")->orderBy('client_name', 'asc')->get();
        $html = view('clients.search')->with(['clients' => $clients])->render();
        return response()->json(['html' => $html]);
    }
}

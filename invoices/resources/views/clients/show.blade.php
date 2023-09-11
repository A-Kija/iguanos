{{-- SHOW CLIENT FORM --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Client</h1>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-div"><b>Client name:</b> {{$client->client_name}}</div>
                                    <div class="form-div"><b>Address:</b> {{$client->client_address}},
                                        {{$client->client_address2}}</div>
                                    <div class="form-div"><b>VAT:</b> {{$client->client_vat ?? 'no VAT'}}</div>
                                    <div class="form-div"><b>Country:</b> {{$countries[$client->client_country]}}</div>
                                    <div class="form-div mt-3"><b>Invoices:</b>
                                        <ul class="small-list">
                                            @forelse ($client->invoices as $invoice)
                                            <li>
                                                <a
                                                    href="{{route('invoices-edit', $invoice)}}">{{$invoice->invoice_number}} {{$client->client_name}}</a>
                                            </li>
                                            @empty
                                            <li>No invoices</li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'manager')
                                    <a href="{{route('clients-edit', $client)}}" type="submit" class="btn btn-outline-primary">Edit client</a>
                                    @endif
                                    <a href="{{route('clients-index')}}" type="submit" class="btn btn-outline-secondary">Clients list</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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
                                    <div class="form-div">Client name: {{$client->client_name}}</div>
                                    <div class="form-div">Address: {{$client->client_address}},
                                        {{$client->client_address2}}</div>
                                    <div class="form-div">VAT: {{$client->client_vat ?? 'no VAT'}}</div>
                                    <div class="form-div">Country: {{$countries[$client->client_country]}}</div>
                                    <div class="form-div">Invoices: {{$client->invoices()->count()}}</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <a href="{{route('clients-edit', $client)}}" type="submit" class="btn btn-outline-primary">Edit client</a>
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
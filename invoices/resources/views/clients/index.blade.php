{{-- CLIENTS LIST --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Clients list</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-5">
                                    <h4>Client</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Country</h4>
                                </div>
                                <div class="col-md-4">
                                    <h4>Count</h4>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
                        </li>
                        @forelse ($clients as $client)
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-5">
                                        {{$client->client_name}}
                                    </div>
                                    <div class="col-md-2">
                                        {{$countries[$client->client_country] ?? $client->client_country}}
                                    </div>
                                    <div class="col-md-1">
                                        {{$client->invoices()->count()}}
                                    </div>
                                    <div class="col-md-4">
                                        <div class="buttons-bin">
                                            <a href="{{route('clients-show', $client->id)}}" class="btn btn-primary">Show</a>
                                            <a href="{{route('clients-edit', $client->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('clients-delete', $client->id)}}" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @empty
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>No clients</h4>
                                </div>
                            </div>
                        </li>
                        @endforelse
                      </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
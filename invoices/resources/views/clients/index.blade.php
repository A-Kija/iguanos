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

                <form action="{{route('clients-index')}}" method="GET">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="m-2">
                                    <label class="form-label">Sort By name:</label>
                                    <select class="form-select" name="sort">
                                        @foreach ($sortOptions as $key => $option)
                                        <option value="{{$key}}" {{$selectedSort==$key ? 'selected' : '' }}>{{$option}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="m-2">
                                    <label class="form-label">Countries:</label>
                                    <select class="form-select" name="country">
                                        @foreach ($countryOptions as $country)
                                        <option value="{{$country[0]}}" {{$selectedCountry==$country[0] ? 'selected' : '' }}>{{$country[1]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="m-2">
                                    <label class="form-label">Results per page:</label>
                                    <div class="check-in-line">
                                        @foreach ($perPageOptions as $key => $option)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" {{$perPage==$key ? 'checked'
                                                : '' }} name="per_page" id="{{$key}}" value={{$key}}>
                                            <label class="form-check-label" for="{{$key}}">
                                                {{$option}}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="m-2">
                                    <label class="form-label">Search:</label>
                                    <input type="text" class="form-control" placeholder="find client" name="s"  value="{{$s}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="m-2">
                                    <button type="submit" class="btn btn-outline-primary">Use</button>
                                    <a href="{{route('clients-index')}}" class="btn btn-outline-secondary">Clear</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

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
                                            @if(Auth::user()->role == 'admin' || Auth::user()->role == 'manager')
                                            <a href="{{route('clients-edit', $client->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('clients-delete', $client->id)}}" class="btn btn-danger">Delete</a>
                                            @endif
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
                @if(method_exists($clients, 'links'))
                <div class="m-3">
                    {{ $clients->links()}}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
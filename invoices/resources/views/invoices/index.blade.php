{{-- INVOICES LIST --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Invoices list</h1>
                </div>

                <form action="{{route('invoices-index')}}" method="GET">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="m-2">
                                    <label class="form-label">Sort By date:</label>
                                    <select class="form-select" name="sort">
                                        @foreach ($sortOptions as $key => $option)
                                        <option value="{{$key}}" {{$selectedSort==$key ? 'selected' : '' }}>{{$option}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="m-2">
                                    <label class="form-label">Clients:</label>
                                    <select class="form-select" name="client">
                                        @foreach ($clientOptions as $client)
                                        <option value="{{$client[0]}}" {{$selectedClient==$client[0] ? 'selected' : ''
                                            }}>{{$client[1]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="m-2">
                                    <label class="form-label">Archive:</label>
                                    <select class="form-select" name="archive">
                                        @foreach ($archiveOptions as $key => $option)
                                        <option value="{{$key}}" {{$selectedArchive==$key ? 'selected' : '' }}>
                                            {{$option}}</option>
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
                            <div class="col-md-6">
                                <div class="m-2">
                                    <button type="submit" class="btn btn-outline-primary">Use</button>
                                    <a href="{{route('invoices-index')}}" class="btn btn-outline-secondary">Clear</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="card-body">
                    <ul class="list-group">

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-1">
                                    <h4>Number</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Date</h4>
                                </div>
                                <div class="col-md-3">
                                    <h4>Client</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Country</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Amount</h4>
                                </div>
                                <div class="col-md-5">
                                </div>
                            </div>
                        </li>

                        @forelse ($invoices as $invoice)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-1">
                                    {{$invoice->invoice_number}}
                                </div>
                                <div class="col-md-1">
                                    {{$invoice->invoice_date}}
                                </div>
                                <div class="col-md-3">
                                    {{$invoice->client->client_name}}
                                </div>
                                <div class="col-md-2">
                                    {{$countries[$invoice->client->client_country]}}
                                </div>
                                <div class="col-md-1">
                                    @if(!$invoice->archive)
                                    <b>{{$invoice->getPivot->reduce(function($carry, $item) {
                                        return $carry + $item->quantity * $item->product->price;
                                        })}} eur
                                    </b>
                                    @else
                                    <b>{{$invoice->archive['total']}} eur</b>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="buttons-bin">
                                        @if($invoice->archive)
                                        <a href="{{route('invoices-show', $invoice->id)}}"
                                            class="btn btn-primary">Show</a>
                                        @else
                                        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'manager')
                                        <a href="{{route('invoices-edit', $invoice->id)}}"
                                            class="btn btn-primary">Edit</a>
                                        @endif
                                        @endif
                                        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'manager')
                                        <a href="{{route('invoices-delete', $invoice->id)}}"
                                            class="btn btn-danger">Delete</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>No invoices</h4>
                                </div>
                            </div>
                        </li>
                        @endforelse
                    </ul>
                </div>
                @if(method_exists($invoices, 'links'))
                <div class="m-3">
                    {{ $invoices->links()}}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
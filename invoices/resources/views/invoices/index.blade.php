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

                        @foreach ($invoices as $invoice)
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-1">
                                        {{$invoice->invoice_number}}
                                    </div>
                                    <div class="col-md-1">
                                        {{$invoice->invoice_date}}
                                    </div>
                                    <div class="col-md-3">
                                        {{$invoice->client_name}}
                                    </div>
                                    <div class="col-md-2">
                                        {{$countries[$invoice->client_country]}}
                                    </div>
                                    <div class="col-md-1">
                                        <b>{{$invoice->invoice_amount}} eur</b>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="buttons-bin">
                                            <a href="{{route('invoices-show', $invoice->id)}}" class="btn btn-primary">Show</a>
                                            <a href="{{route('invoices-edit', $invoice->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('invoices-delete', $invoice->id)}}" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                      </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
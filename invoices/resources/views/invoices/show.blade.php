{{-- SHOW INVOICE FORM --}}
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card invoice-pdf">
                <div class="card-header">
                    <h1>Invoice Number {{$number}}</h1>
                </div>
                <div class="card-body inv">
                    <div class="inv-bin">
                    @include('invoices.invoice')
                    </div>
                    <div class="col-md-12">
                        <div class="float-right">
                            <a href="{{route('invoices-index')}}" class="btn btn-outline-secondary">Back</a>
                            <a href="{{route('invoices-download', $id)}}" class="btn btn-outline-primary">Download
                                PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
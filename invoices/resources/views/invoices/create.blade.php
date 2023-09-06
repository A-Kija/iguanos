{{-- CREATE INVOICE FORM --}}
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Create Invoice</h1>
                </div>
                <div class="card-body">
                    <form action={{route('invoices-store')}} method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Number</label>
                                        <input type="text" class="form-control" placeholder="invoice number"
                                            name="number" value="{{old('number')}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Date</label>
                                        <input type="text" class="form-control" placeholder="invoice date" name="date" value="{{old('date')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Client</label>
                                        <select class="form-select" name="client_id">
                                            <option selected value="">Select client</option>
                                            @foreach ($clients as $client)
                                            <option value="{{ $client->id }}" {{old('client_id') == $client->id ? 'selected' : ''}}>{{ $client->client_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="--products container">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <div class="mb-3">
                                                    <h5>#</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <h5>Product</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <h5>Price</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <h5>Quantity</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <h5>Total</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                            </div>
                                        </div>

                                        @include('invoices.old')

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="button" class="--add-product btn btn-outline-secondary mt-3"
                                        data-url="{{route('invoices-show-line')}}">Add product</button>
                                </div>

                                <div class="col-md-12">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-7">
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label class="form-label">Amount</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <input type="text" class="--amount form-control" readonly value="0.00">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary">Create Invoice</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- EDIT INVOICE FORM --}}
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Edit Invoice</h1>
                </div>
                <div class="card-body">
                    <form action={{route('invoices-update', $invoice)}} method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Number</label>
                                        <input type="text" class="form-control" placeholder="invoice number"
                                            name="number" value="{{$invoice->invoice_number}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Date</label>
                                        <input type="text" class="form-control" placeholder="invoice date" name="date"  value="{{$invoice->invoice_date}}">
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
                                            <option value="{{ $client->id }}" {{$client->id == $invoice->client_id ? 'selected' : ''}}>{{ $client->client_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="--products container">
                                        <div class="row">
                                            <div class="col-md-5">
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
                                        @foreach ($invoiceLines as $line)
                                        <div class="--line row">
                                            <div class="col-md-1">
                                                <div class="mb-3">
                                                    <h5 class="--in-row">{{$line->in_row}}</h5>
                                                    <input type="hidden" class="--in-row" name="in_row[]" value="{{$line->in_row}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <select class="form-select --product" name="product_id[]">
                                                        @foreach ($products as $product)
                                                        <option value="{{ $product->id }}" {{$product->id == $line->product_id ? 'selected' : ''}}  data-price="{{$product->price}}">{{ $product->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <input type="text" class="--price form-control" readonly value="{{$line->price}}">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <input type="text" class="--quantity form-control" name="quantity[]" value="{{$line->quantity}}">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <input type="text" class="--total form-control" readonly value="{{$line->total}}">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="mb-3">
                                                    <button type="button" class="--remove-product btn btn-outline-danger">-</button>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
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
                                        <button type="submit" class="btn btn-outline-primary">Save Invoice</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @method('PUT')
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
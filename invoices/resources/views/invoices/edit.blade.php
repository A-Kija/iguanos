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
                                        <input type="text" class="form-control" readonly placeholder="invoice number"
                                            value="{{$invoice->invoice_number}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Date</label>
                                        <input type="text" class="form-control" placeholder="invoice date" name="date"
                                            value="{{old('date', $invoice->invoice_date)}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Client</label>
                                        <input type="text" class="--selected-client-name form-control" placeholder="not selected"
                                            name="client_name" readonly value="{{old('client_name', $invoice->client->client_name)}}">
                                        <input type="hidden" class="--selected-client-id" name="client_id" value="{{old('client_id', $invoice->client->id)}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">&nbsp;</label>
                                        <input type="text" data-url="{{route('clients-search')}}" class="--search-client form-control" placeholder="search client">
                                        <div class="--clients-list"></div>
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

                                        @if(old('product_id'))
                                        @include('invoices.old')
                                        @else

                                        @foreach ($invoiceLines as $line)
                                        <div class="--line row">
                                            <div class="col-md-1">
                                                <div class="mb-3">
                                                    <h5 class="--in-row">{{$line->in_row}}</h5>
                                                    <input type="hidden" class="--in-row" name="in_row[]"
                                                        value="{{$line->in_row}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <select class="form-select --product" name="product_id[]">
                                                        @foreach ($products as $product)
                                                        <option value="{{ $product->id }}" {{$product->id ==
                                                            $line->product_id ? 'selected' : ''}}
                                                            data-price="{{$product->price}}">{{ $product->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <input type="text" class="--price form-control" readonly
                                                        value="{{$line->price}}">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <input type="text" class="--quantity form-control" name="quantity[]"
                                                        value="{{$line->quantity}}">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <input type="text" class="--total form-control" readonly
                                                        value="{{$line->total}}">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="mb-3">
                                                    <button type="button"
                                                        class="--remove-product btn btn-outline-danger">-</button>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif

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
                                                    <input type="text" class="--amount form-control" readonly
                                                        value="0.00">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary">Save Invoice</button>
                                        <button type="submit" name="archive" value="1" class="btn btn-outline-primary">Archive Invoice</button>
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
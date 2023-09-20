{{-- SHOW CLIENT FORM --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Product</h1>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-div"><b>Product:</b> {{$product->name}}</div>
                                    <div class="form-div"><b>Price:</b> {{$product->price}} eur</div>
                                    <div class="form-div"><b>About:</b>
                                        <small>{{$product->description}}</small>
                                    </div>
                                    <div class="show-images">
                                        @forelse ($product->images ?? [] as $image)
                                        <img src="{{asset('images/'.$image)}}" alt="{{$image}}">
                                        @empty
                                        <p>No images</p>
                                        @endforelse
                                    </div>
                                      
                                    <div class="form-div mt-3"><b>Invoices:</b>
                                        <ul class="small-list">
                                            @forelse ($product->invoices as $invoice)
                                            <li>
                                                <a href="{{route('invoices-edit', $invoice->invoice)}}">{{$invoice->invoice->invoice_number}}
                                                    {{$invoice->invoice->client->client_name}}</a>
                                            </li>
                                            @empty
                                            <li>No invoices</li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3 mt-4">
                                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'manager')
                                    <a href="{{route('products-edit', $product)}}" class="btn btn-outline-primary">Edit
                                        Product</a>
                                    @endif
                                    <a href="{{route('products-index')}}" class="btn btn-outline-secondary">Products
                                        list</a>
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
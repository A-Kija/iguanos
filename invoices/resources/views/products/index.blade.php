{{-- PRODUCTS LIST --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Products list</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Product</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h5>Use in invoices</h5>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
                        </li>
                        @foreach ($products as $product)
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        {{$product->name}}
                                    </div>
                                    <div class="col-md-2">
                                        <b>{{$product->price}} eur</b>
                                    </div>
                                    <div class="col-md-2">
                                        {{$product->invoices()->count()}}
                                    </div>
                                    <div class="col-md-4">
                                        <div class="buttons-bin">
                                            <a href="{{route('products-show', $product->id)}}" class="btn btn-primary">Show</a>
                                            <a href="{{route('products-edit', $product->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('products-delete', $product->id)}}" class="btn btn-danger">Delete</a>
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
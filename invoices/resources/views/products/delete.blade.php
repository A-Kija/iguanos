{{-- DELETE PRODUCT CONFIRMATION --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Confirm Delete Product</h1>
                </div>
                @if(!$invoicesCount)
                <div class="card-body">
                    <form action={{route('products-destroy', $product)}} method="post">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="m-3">
                                        <h4>{{$product->name}}</h4>
                                    </div>
                                    <div class="m-3">
                                        <button type="submit" class="btn btn-outline-danger m-1">Delete</button>
                                        <a href="{{route('products-index')}}" class="btn btn-outline-secondary m-1">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
                @else
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="m-3">
                                    <h4>{{$product->name}}</h4>
                                </div>
                                <div class="m-3 text-danger">
                                    <div>Product is in use</div>
                                    <div>Product cannot be deleted</div>
                                </div>
                                <div class="m-3">
                                    <a href="{{route('products-index')}}" class="btn btn-outline-secondary m-1">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
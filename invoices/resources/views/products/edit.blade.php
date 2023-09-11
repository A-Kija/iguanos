{{-- EDIT PRODUCT FORM --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Edit Product</h1>
                </div>
                <div class="card-body">
                    <form action={{route('products-update', $product)}} method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" placeholder="product name" name="name" value="{{old('name', $product->name)}}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Discount</label>
                                        <input type="text" class="form-control" placeholder="discount" name="discount" value="{{old('discounte', $product->discount)}}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Price</label>
                                        <input type="text" class="form-control" placeholder="price" name="price" value="{{old('price', $product->price)}}">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="20" name="description">{{old('description', $product->description)}}</textarea>
                                  </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary">Save Product</button>
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
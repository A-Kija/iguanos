{{-- CREATE PRODUCT FORM --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Create Product</h1>
                </div>
                <div class="card-body">
                    <form action={{route('products-store')}} method="post" enctype="multipart/form-data">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" placeholder="product name" name="name"
                                            value="{{old('name')}}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Price</label>
                                        <input type="text" class="form-control" placeholder="price" name="price"
                                            value="{{old('price')}}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Discount</label>
                                        <input type="text" class="form-control" placeholder="discount" name="discount"
                                            value="{{old('discounte', 0)}}">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="4"
                                        name="description">{{old('description')}}</textarea>
                                </div>

                                <div class="--images-lines"></div>
                                
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-outline-secondary --add-image" data-url="{{route('products-show-line')}}">Add image</button>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary">Create Product</button>
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
{{-- PRODUCTS LIST --}}
@extends('layouts.app')

@section('content')
<div class="container --products-index">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Products list</h1>
                </div>

                <form action="{{route('products-index')}}" method="GET">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="m-2">
                                    <label class="form-label">Sort By:</label>
                                    <select class="form-select" name="sort">
                                        @foreach ($sorts as $key => $sort)
                                        <option value="{{$key}}" {{$selectedSort==$key ? 'selected' : '' }}>{{$sort}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="m-2">
                                    <label class="form-label">Discount:</label>
                                    <select class="form-select" name="discount">
                                        @foreach ($discountFilters as $key => $filter)
                                        <option value="{{$key}}" {{$selectedDiscount==$key ? 'selected' : '' }}>
                                            {{$filter}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="m-2">
                                    <label class="form-label">Min Max price: <span id="min">{{$selectedMin}}</span> -
                                        <span id="max">{{$selectedMax}}</span></label>
                                    <div class="slider-box">
                                        <input type="range" class="slider" name="min" value="{{$selectedMin}}"
                                            min="{{$minProductPrice}}" max="{{$maxProductPrice}}">
                                        <input type="range" class="slider" name="max" value="{{$selectedMax}}"
                                            min="{{$minProductPrice}}" max="{{$maxProductPrice}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="m-2">
                                    <label class="form-label">Results per page:</label>
                                    <div class="check-in-line">
                                        @foreach ($perPageOptions as $key => $option)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" {{$perPage==$key ? 'checked'
                                                : '' }} name="per_page" id="{{$key}}" value={{$key}}>
                                            <label class="form-check-label" for="{{$key}}">
                                                {{$option}}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="m-2">
                                    <button type="submit" class="btn btn-outline-primary">Use</button>
                                    <a href="{{route('products-index')}}" class="btn btn-outline-secondary">Clear</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Product</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Discount</h4>
                                </div>
                                <div class="col-md-1">
                                    <h5>Use in invoices</h5>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
                        </li>
                        @foreach ($products as $product)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">
                                    {{$product->name}}
                                </div>
                                <div class="col-md-2">
                                    <b>{{$product->price}} eur</b>
                                </div>
                                <div class="col-md-2">
                                    <b>{{$product->discount != 0 ? $product->discount . ' eur' : ''}}</b>
                                </div>
                                <div class="col-md-1">
                                    {{$product->invoices()->count()}}
                                </div>
                                <div class="col-md-4">
                                    <div class="buttons-bin">
                                        <a href="{{route('products-show', $product->id)}}"
                                            class="btn btn-primary">Show</a>
                                        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'manager')
                                        <a href="{{route('products-edit', $product->id)}}"
                                            class="btn btn-primary">Edit</a>
                                        <a href="{{route('products-delete', $product->id)}}"
                                            class="btn btn-danger">Delete</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="--product-tags product-tags">
                                <div class="product-tags-list --list">
                                    @foreach ($product->tags as $tag)
                                    <span class="tag-badge">{{$tag->tag}} <i class="--remove-tag" data-url="{{route('tags-product-remove', [$product, $tag])}}">X</i></span>
                                    @endforeach
                                </div>
                                <div class="--add-tag add-tag">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="tag">
                                        <button class="btn btn-outline-secondary"
                                            data-url="{{route('tags-product-add', $product)}}"
                                            type="button">Add</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @if(method_exists($products, 'links'))
                <div class="m-3">
                    {{ $products->links()}}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
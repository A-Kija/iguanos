@forelse(old('product_id') ?? [] as $key => $value)
@if($value == '')
<div class="--line row">
    <div class="col-md-1">
        <div class="mb-3">
            <h5 class="--in-row">{{old('in_row')[$key]}}</h5>
            <input type="hidden" class="--in-row" name="in_row[]" value="{{old('in_row')[$key]}}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <select class="form-select" name="product_id[]">
                <option selected value="">Select Product</option>
                @foreach ($products as $product)
                <option value="{{ $product->id }}" data-price="{{$product->price}}">
                    {{ $product->name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-2">
        <div class="mb-3">
            <input type="text" class="--price form-control" readonly>
        </div>
    </div>
    <div class="col-md-2">
        <div class="mb-3">
            <input type="text" class="--quantity form-control" name="quantity[]" value="{{old('quantity')[$key]}}">
        </div>
    </div>
    <div class="col-md-2">
        <div class="mb-3">
            <input type="text" class="--total form-control" value="0.00" readonly>
        </div>
    </div>
    <div class="col-md-1">
        <div class="mb-3">
            <button type="button" class="--remove-product btn btn-outline-danger">-</button>
        </div>
    </div>
</div>
@else
<div class="--line row">
    <div class="col-md-1">
        <div class="mb-3">
            <h5 class="--in-row">{{old('in_row')[$key]}}</h5>
            <input type="hidden" class="--in-row" name="in_row[]" value="{{old('in_row')[$key]}}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <select class="form-select" name="product_id[]">
                <option selected value="">Select Product</option>
                @foreach ($products as $product)
                <option value="{{ $product->id }}" data-price="{{$product->price}}" {{$value==$product->id ?
                    'selected'
                    : ''}} >
                    {{ $product->name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-2">
        <div class="mb-3">
            <input type="text" class="--price form-control" readonly
                value="{{$products->first(fn($p) => $p->id == $value)->price}}">
        </div>
    </div>
    <div class="col-md-2">
        <div class="mb-3">
            <input type="text" class="--quantity form-control" name="quantity[]" value="{{old('quantity')[$key]}}">
        </div>
    </div>
    <div class="col-md-2">
        <div class="mb-3">
            <input type="text" class="--total form-control" readonly
                value="{{number_format($products->first(fn($p) => $p->id == $value)->price * ((float) old('quantity')[$key]), 2)}}">
        </div>
    </div>
    <div class="col-md-1">
        <div class="mb-3">
            <button type="button" class="--remove-product btn btn-outline-danger">-</button>
        </div>
    </div>
</div>
@endif
@empty
@endforelse
<div class="--line row">
    <div class="col-md-1">
        <div class="mb-3">
            <h5 class="--in-row"></h5>
            <input type="hidden" class="--in-row" name="in_row[]" value="">
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <select class="form-select" name="product_id[]">
                <option selected value="">Select Product</option>
                @foreach ($products as $product)
                <option value="{{ $product->id }}" data-price="{{$product->price}}">{{ $product->name }}</option>
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
            <input type="text" class="--quantity form-control" name="quantity[]">
        </div>
    </div>
    <div class="col-md-2">
        <div class="mb-3">
            <input type="text" class="--total form-control" readonly value="0.00">
        </div>
    </div>
    <div class="col-md-1">
        <div class="mb-3">
            <button type="button" class="--remove-product btn btn-outline-danger">-</button>
        </div>
    </div>
</div>
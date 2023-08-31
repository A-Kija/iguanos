<div class="col-md-5">
    <div class="mb-3">
        <select class="form-select" name="product_id">
            <option selected value="">Select Product</option>
            @foreach ($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-md-2">
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="quantity" name="quantity">
    </div>
</div>
<div class="col-md-2">
    <div class="mb-3">
        <input type="text" class="form-control" readonly>
    </div>
</div>
<div class="col-md-3">
    <div class="mb-3">
        <button type="button" class="--remove-product btn btn-outline-danger">Remove product</button>
    </div>
</div>
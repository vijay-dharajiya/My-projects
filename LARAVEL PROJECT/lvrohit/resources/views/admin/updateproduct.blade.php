@extends('admin.master')
@section('updateproduct')
<div class="container m-5">
    <h2>Update Product</h2>
    <form method="POST" action="{{ route('admin.posteditproduct', ['id' => $product->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group  mb-3">
            <label for="product_name">Product Name</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->product_name }}" required>  
        </div>
        <div class="form-group mb-3">
            <label for="product_price">Product Price</label>
            <input type="number" class="form-control" id="product_price" name="product_price" value="{{ $product->product_price }}" required>   
        </div>
        <div class="form-group mb-3">
            <label for="product_desc">Description</label>
            <textarea class="form-control" id="product_desc" name="product_desc" rows="4" required>{{ $product->product_desc }}</textarea>  
        </div>
        <div class="form-group mb-3">
            <label for="product_image">Product Image</label>
            <input type="file" class="form-control" id="product_image" name="product_image">  
            <img src="{{ asset('images/' . $product->product_image) }}" alt="Current Product Image" width="100" class="mt-2">
        </div>

        <div class="form-group mb-3">
            <label>Catagories</label>
            <select class="form-control" name="catagories" required>
                <option value="" disabled selected>Select Catagories</option>
                @foreach($catagories as $catagory)
                    <option value="{{ $catagory->cat_name }}" {{ $product->catagories == $catagory->cat_name ? 'selected' : '' }}>{{ $catagory->cat_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection
  
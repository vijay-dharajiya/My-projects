@extends('maindesign')
<base href="/public">
@section('productsdetails')
    <br>
    @if(session('cartmsg'))
    <div class="alert alert-success" role="alert">
            <h6>{{session('cartmsg')}}</h6>
    </div>    
    @endif
    <div class="container m-5">
        <h2 class="text-center mb-4"><b><u>Product Details</u></b></h2>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/'.$products->product_image) }}" alt="{{ $products->product_name }}" class="img-fluid" >
            </div>
            <div class="col-md-6 text-center">
                <h3>{{ $products->product_name }}</h3>
                <p>{{ $products->product_desc }}</p>
                <h4>Price: ${{ $products->product_price }}</h4>
                <a href="{{ route('addtocart', $products->id) }}" class="btn btn-primary mx-3 my-2">Add to Cart</a>
                <a href="{{ route('addtowishlist', $products->id) }}" class="btn btn-warning ml-2">Add to Wishlist</a>
                <div class="col-md-12 mt-4">
                    <a href="{{ route('index') }}" class="btn btn-secondary">Back to Home</a>
                </div>
            </div>
            
        </div>
    </div>  
@endsection
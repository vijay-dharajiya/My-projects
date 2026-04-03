@extends('maindesign')

@section('wishlist')
<br>

@if(session('cartmsg'))
<div class="alert alert-success" role="alert">
    <h6>{{ session('cartmsg') }}</h6>
</div>
@endif

<section class="shop_section layout_padding">
    <style>
        .box {
    position: relative;
}

.remove-btn {
    position: absolute;
    top: 8px;
    right: 10px;
    background: white;
    color: red;
    font-size: 18px;
    padding: 2px 6px;
    border-radius: 50%;
    text-decoration: none;
    z-index: 10;
}

.remove-btn:hover {
    background: red;
    color: white;
}
    </style>
    <div class="container">
        <div class="heading_container heading_center">
            <h2>My Wishlist</h2>
        </div>

        @if($wishitems->count() == 0)
            <div class="alert alert-warning text-center">
                Your wishlist is empty
            </div>
        @else
            <div class="row">
                @foreach($wishitems as $wish)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box position-relative">

                        <!-- Remove Button -->
                        <a href="{{ route('removewish', $wish->id) }}" 
                           class="remove-btn "
                           onclick="return confirm('Remove this item from wishlist?')">
                            ❌
                        </a>

                        <a href="{{ route('productsdetails', $wish->products->id) }}">
                            <div class="img-box">
                                <img src="{{ asset('images/' . $wish->products->product_image) }}" 
                                     alt="{{ $wish->products->product_name }}">
                            </div>

                            <div class="detail-box">
                                <h6>{{ $wish->products->product_name }}</h6>
                                <h6>
                                    Price
                                    <span>${{ $wish->products->product_price }}</span>
                                </h6>
                            </div>

                            <div class="new">
                                <span>New</span>
                            </div>
                        </a>

                    </div>
                </div>
                @endforeach
            </div>
        @endif

    </div>
</section>

@endsection
@extends('maindesign')
<base href="/public">
@section('home')
  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h1><b><u>Our Products</u></b></h1>
      </div>
      <div class="row">
        @foreach($products as $products)
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box">
              <a href="{{ route('productsdetails', $products->id) }}">
                <div class="img-box">
                  <img src="{{ asset('images/' . $products->product_image) }}" alt="{{ $products->product_name }}">
                </div>
                <div class="detail-box">
                  <h6>
                    {{ $products->product_name }}
                  </h6>
                  <h6>
                    Price
                    <span>
                      ${{ $products->product_price }} 
                    </span>
                  </h6>
                </div>
                <div class="new">
                  <span>
                    New
                  </span>
                </div>
              </a>
            </div>
          </div>
        @endforeach
      </div>
      <div class="btn-box">
        <a href="">
          View All Products
        </a>
      </div>
    </div>
  </section>


  <!-- end info section -->


</body>

</html>
@endsection
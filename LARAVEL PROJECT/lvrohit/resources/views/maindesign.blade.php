@php
  use App\Http\Controllers\UserController;
  $count = UserController::cartcount();
  $wcount = UserController::wishcount();
  $catagories = UserController::viewCat();
@endphp  <!--/* this is for cart count in header section */-->
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

  <title>
    Giftos
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" href="frontend/css/bootstrap.css">

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="frontend/css/style.css">

  <!-- responsive style -->
<link rel="stylesheet" href="frontend/css/responsive.css">  
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="{{route('index')}}">
          <span>
            My Store
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('index')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('shop')}}">
                Shop
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle"
                href="#"
                id="categoryDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false">
                Categories
              </a>

              <div class="dropdown-menu">
                @foreach($catagories as $catagory)
                  <a class="dropdown-item"
                    href="{{ route('viewcategory',$catagory->cat_name) }}">
                    {{ $catagory->cat_name }}
                  </a>
                @endforeach
              </div>
            </li>



            <li class="nav-item">
              <a class="nav-link" href="#">
                Testimonial
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
            </li>
          </ul>
          <div class="user_option">

            @auth
                <!-- User is logged in -->
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>
                        {{ Auth::user()->name }}
                    </span>
                </a>
            @else
                <!-- User is NOT logged in -->
                <a href="{{ route('login') }}">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>Login</span>
                </a>

                <a href="{{ route('register') }}">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>Sign Up</span>
                </a>
            @endauth

            <a href="{{ route('wishlist') }}">
              <i class="fa fa-heart" aria-hidden="true"> | {{$wcount}}</i>
            </a>

            <a href="{{ route('cartlist') }}">
              <i class="fa fa-shopping-bag" aria-hidden="true"> | {{$count}}</i>
            </a>

            <form class="form-inline my-2" action="{{ route('search') }}" method="post">
              @csrf
              <div class="input-group">
                <input type="text" class="form-control mr-sm-2" name="search" placeholder="Search">
                <button type="submit" class="btn btn-success mr-sm-2">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </div>
            </form>

          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <div class="page-content">
      @yield('home')
      @yield('productsdetails')
      @yield('cartlist')
      @yield('checkout')
      @yield('afterorder')
      @yield('wishlist')
      @yield('myorder')
      @yield('catagories')
      @yield('search')
      @yield('shop')
      @yield('contact')

    </div>


    <!-- footer section -->
    <footer class=" footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Web Tech Knowledge</a>
        </p>
      </div>
    </footer>
    <!-- footer section -->

  </section>

  <!-- end info section -->


<script src="frontend/js/jquery-3.4.1.min.js"></script>
    <script src="frontend/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <script src="frontend/js/custom.js"></script>
</body>

</html>
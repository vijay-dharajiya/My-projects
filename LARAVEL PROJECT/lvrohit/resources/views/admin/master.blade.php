<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('admin/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{ asset('admin/css/font.css') }}">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('admin/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('admin/img/favicon.ico') }}">
    <style>
      .footer {
        background-color: #2d3035;
        color: #fff;
        padding: 10px 0;
        border-top: 1px solid #1a1c1e;
      }
      .footer p {
        color: #9ca3af;
      }
      .footer a {
        color: #3b82f6;
      }
      .footer a:hover {
        color: #60a5fa;
      }
    </style>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <header class="header">   
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="index.html" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">ADMIN</strong><strong>DASHBOSRD</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
          <div class="right-menu list-inline no-margin-bottom d-flex align-items-center">
              <span class="text-white mr-3">
                  {{ auth()->user()->name }}
              </span>
              <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="btn btn-danger btn-lg">
                    <i class="fa fa-sign-out" aria-hidden="true"> Logout </i>
                  </button>
              </form>
          </div>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch" style="min-height: calc(100vh - 120px);">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{ asset('admin/img/avatar-6.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">MY STORE</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
          <li class="active"><a href="{{ route('dashboard') }}"> <i class="icon-home"></i>Home </a></li>
          <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Catagories</a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
              <li><a href="{{ route('admin.addcatagories') }}">Add Catagories</a></li>
              <li><a href="{{ route('admin.viewcatagories') }}">view Catagories</a></li>
            </ul>
          </li>
          <li><a href="#product" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Products</a>
            <ul id="product" class="collapse list-unstyled ">
              <li><a href="{{ route('admin.addproduct') }}">Add Product</a></li>
              <li><a href="{{ route('admin.viewproduct') }}">view Product</a></li>
            </ul>
          </li>
          <li><a href="#orders" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Orders</a>
            <ul id="orders" class="collapse list-unstyled ">
              <li><a href="{{ route('admin.allorders') }}">view Orders</a></li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        @yield('content')
        @yield('addcatagories')
        @yield('viewcatagories')
        @yield('updatecatagories')
        @yield('addproduct')
        @yield('viewproduct')
        @yield('updateproduct')
        @yield('allorder')
      </div>
    </div>
    <!-- Page Footer-->         
    <footer class="footer">
      <div class="footer__block block no-margin-bottom">
        <div class="container-fluid text-center">
          <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
           <p class="no-margin-bottom">2026 &copy; MY STORE. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
        </div>
      </div>
    </footer>
    <!-- JavaScript files-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin/js/charts-home.js') }}"></script>
    <script src="{{ asset('admin/js/front.js') }}"></script>
  </body>
</html>
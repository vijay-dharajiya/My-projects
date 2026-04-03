@extends('admin.master')
@section('viewproduct')
<div class="container m-5">
    @if(session('delmsg'))
        <div class="alert alert-danger mt-3">
            {{ session('delmsg') }}
        </div>
    @endif
    <form class="form-inline my-2 my-lg-0" action="{{ route('admin.postsearchproduct') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="search" placeholder="Search Product Name" aria-label="Search Product Name" aria-describedby="button-search">
            <div class="input-group-append">
                <button class="btn btn-outline-success" type="submit" id="button-search">Search</button>
            </div>
        </div>
    </form>

    <h2>View Products</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Description</th>
                <th>Product Image</th>
                <th>Catagories</th>
                <th colspan="2" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_price }}</td>
                <td>{{ $product->product_desc }}</td>
                <td><img src="{{ asset('images/' . $product->product_image) }}" alt="Product Image" width="100"></td>
                <td>{{ $product->catagories }}</td>
                <td><a href="{{ route('admin.updateproduct', ['id' => $product->id]) }}" class="btn btn-primary btn-sm">update</a></td>
                <td><a href="{{ route('admin.deleteproduct', ['id' => $product->id]) }}" class="btn btn-danger btn-sm"onclick="return confirm('Are you sure ?')">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{ $products->links() }}
</div>
@endsection
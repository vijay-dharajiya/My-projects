@extends('admin.master')
@section('addproduct')

<style>
    .card-wrapper {
        background: linear-gradient(135deg, #191a1b 0%, #121314 100%);
        min-height: 85vh;
        display: flex;
        align-items: center;
        padding: 30px 0;
    }
    .product-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        padding: 40px;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }
    .product-card h2 {
        font-size: 28px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 10px;
    }
    .product-card .subtitle {
        color: #7f8c8d;
        margin-bottom: 30px;
        font-size: 14px;
    }
    .form-group label {
        font-weight: 600;
        color: #34495e;
        margin-bottom: 8px;
    }
    .form-control {
        border: 2px solid #e0e6ed;
        border-radius: 8px;
        padding: 10px 14px;
        font-size: 14px;
        transition: all 0.3s;
    }
    .form-control:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        outline: none;
    }
    textarea.form-control {
        resize: vertical;
    }
    .btn-outline-success {
        padding: 12px 20px;
        font-weight: 600;
        border-radius: 8px;
        margin-top: 20px;
        transition: all 0.3s;
    }
    .btn-outline-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
</style>

<div class="card-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="product-card">
                    <h2>Add Product</h2>
                    <p class="subtitle">Fill in the details below to add a new product</p>
                    
                    <form action="{{ route('admin.postaddproduct') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" name="product_name" placeholder="Enter Product Title" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Price</label>
                                    <input type="number" class="form-control" name="product_price" placeholder="Enter Product Price" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="product_desc" rows="4" placeholder="Enter Product Description" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image Upload</label>
                                    <input type="file" class="form-control" name="product_image" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Catagories</label>
                                    <select class="form-control" name="catagories" required>
                                        <option value="" disabled selected>Select Catagories</option>
                                        @foreach($catagories as $catagories)
                                            <option value="{{ $catagories->cat_name }}">{{ $catagories->cat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-outline-success btn-block">Insert Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
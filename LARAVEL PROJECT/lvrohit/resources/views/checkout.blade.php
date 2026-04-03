@extends('maindesign')

@section('checkout')
<div class="container mt-4">
    <h2 class="mb-4">Checkout</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <!-- LEFT SIDE : CUSTOMER DETAILS -->
        <div class="col-md-6">
            <h4>Billing Details</h4>

            <form method="POST" action="{{ route('place.order') }}">
                @csrf

                <div class="mb-3">
                    <label>Full Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Contact Number</label>
                    <input type="text" name="contact" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Address</label>
                    <textarea name="address" class="form-control" required></textarea>
                </div>

                <!-- Preserve cart data -->
                @foreach($products as $index => $item)
                    <input type="hidden" name="products[{{ $index }}][product_id]" value="{{ $item['product_id'] }}">
                    <input type="hidden" name="products[{{ $index }}][price]" value="{{ $item['price'] }}">
                    <input type="hidden" name="products[{{ $index }}][qty]" value="{{ $item['qty'] }}">
                @endforeach

                <div class="mb-3">
                        <label><strong>Payment Method</strong></label><br>
                    
                        <input type="radio" name="payment_method" value="COD" checked>
                        Cash on Delivery <br>
                    
                        <input type="radio" name="payment_method" value="ONLINE">
                        Online Payment
                    </div>
                    

                <button class="btn btn-primary mt-3">
                    Place Order
                </button>
            </form>
        </div>

        <!-- RIGHT SIDE : ORDER SUMMARY -->
        <div class="col-md-6">
            <h4>Order Summary</h4>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th width="80">Qty</th>
                        <th width="120">Price</th>
                        <th width="120">Subtotal</th>
                    </tr>
                </thead>
                <tbody>

                    @php $total = 0; @endphp

                    @foreach($products as $item)
                        @php
                            $product = \App\Models\Products::find($item['product_id']);
                            $subtotal = $item['price'] * $item['qty'];
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $item['qty'] }}</td>
                            <td>₹{{ $item['price'] }}</td>
                            <td>₹{{ $subtotal }}</td>
                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total</th>
                        <th>₹{{ $total }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

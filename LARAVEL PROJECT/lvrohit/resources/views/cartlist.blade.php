@extends('maindesign')
<base href="/public">
@section('cartlist')
    <br>
    @if(session('cartmsg'))
    <div class="alert alert-success" role="alert">
            <h6>{{session('cartmsg')}}</h6>
    </div>    
    @endif
    <div class="container m-5">
        <h2 class="text-center mb-4">Cart List</h2>
        @if($cartitems->count() == 0)
        <div class="alert alert-warning">Your cart is empty</div>
        @else
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $grandTotal = 0; @endphp

                        @foreach($cartitems as $cart)
                            @php 
                                $price = $cart->products->product_price;
                                $qty = 1; 
                                $subtotal = $price * $qty;
                                $grandTotal += $subtotal;
                            @endphp

                            <tr class="cart-row"  data-price="{{ $price }}"  data-product-id="{{ $cart->products->id }}">

                                <td>{{ $cart->products->id }}</td>
                                <td><img src="{{ asset('images/' . $cart->products->product_image) }}" alt="Product Image" width="100"></td>
                                <td>{{ $cart->products->product_name }}</td>
                                <td>${{ $price }}</td>
                                <td><input type="number" class="form-control qty" value="1" min="1" onchange="updateTotals()"></td>
                                <td>$<span class="subtotal">{{ $subtotal }}</span></td>
                                <td>
                                    <form method="POST" action="{{route('cart.remove',$cart->products->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            Remove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5" class="text-center">Grand Total :</th>
                            <th colspan="2">$<span id="grandTotal">{{ $grandTotal }}</span></th>
                        </tr>
                    </tfoot>
                </table>
                <div class="text-end">
                    <button class="btn btn-outline-success btn-lg" onclick="goToCheckout()">
                        Proceed to Checkout
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <script>
        function updateTotals() {
            let total = 0;

            document.querySelectorAll('.cart-row').forEach(row => {
                let price = parseFloat(row.dataset.price);
                let qty = row.querySelector('.qty').value;
                let subtotal = price * qty;

                row.querySelector('.subtotal').innerText = subtotal;
                total += subtotal;
            });

            document.getElementById('grandTotal').innerText = total;
        }
        function goToCheckout() {
            let products = [];

            document.querySelectorAll('.cart-row').forEach(row => {
                products.push({
                    product_id: row.dataset.productId,
                    price: row.dataset.price,
                    qty: row.querySelector('.qty').value
                });
            });

            fetch("{{ route('checkout') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ products: products })
            })
            .then(res => res.text())
            .then(html => {
                document.open();
                document.write(html);
                document.close();
            });
        }
    </script>
    
@endsection
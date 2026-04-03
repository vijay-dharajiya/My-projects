@extends('maindesign')
<base href="/public">
@section('myorder')
<div class="container margin-top:0px;">
    <h3 class="mb-4">My Orders</h3>

    @forelse($orders as $orderId => $orderItems)
        @php
            $order = $orderItems->first();
            $total = $orderItems->sum('subtotal');
        @endphp

        <div class="card mb-4">
            <div class="card-header">
                <strong>Order ID:</strong> {{ $orderId }} <br>
                <strong>Date:</strong> {{ $order->created_at->format('d M Y') }} <br>
                <strong>Status:</strong> {{ ucfirst($order->status) }} <br>
                <strong>Total:</strong> ₹{{ number_format($total, 2) }}
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                            <th>Order Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderItems as $item)
                            <tr>
                                <td>{{ $item->product->product_name ?? 'Product removed' }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>₹{{ $item->price }}</td>
                                <td>₹{{ $item->subtotal }}</td>
                                <td>{{ $item->status }}</td>
                            </tr>
                        @endforeach
                        <form method="POST" action="{{ route('orders.remove', $orderId) }}">
                            @csrf
                            <button class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to remove this order?')">
                                Cancel Order
                            </button>
                        </form>

                        @if($order->status !== 'canceled')
                            <a href="{{ route('order.invoice', $orderId) }}" class="btn btn-sm btn-info">
                                Download Invoice
                            </a>
                        @endif
                        <br>
                    </tbody>
                </table>
            </div>
        </div>
    @empty
        <p>No orders found.</p>
    @endforelse
</div>

@endsection

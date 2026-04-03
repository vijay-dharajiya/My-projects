@extends('admin.master')
<base href="/public">
@section('allorder')
<div class="container-fluid">
    <h3 class="mb-4">All Orders</h3>
    @if(session('success'))
    <div class="alert alert-danger" role="alert">
            <h6>{{session('success')}}</h6>
    </div>    
    @endif
    @foreach($orders as $orderId => $orderItems)
        @php
            $order = $orderItems->first();
            $total = $orderItems->sum('subtotal');
        @endphp

        <div class="card mb-4 shadow-sm">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <strong>Order ID:</strong> {{ $orderId }} <br>
                    <strong>Date:</strong> {{ $order->created_at->format('d M Y, h:i A') }} <br>
                    <strong>Status:</strong>

                    <form method="POST"
                        action="{{ route('admin.orders.updateStatus', $orderId) }}">
                        @csrf

                        <select name="status"
                                class="form-select form-select-sm"
                                onchange="this.form.submit()">

                            <option value="placed" {{ $order->status == 'placed' ? 'selected' : '' }}>
                                Placed
                            </option>
                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>
                                Processing
                            </option>
                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>
                                Shipped
                            </option>
                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>
                                Delivered
                            </option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                Cancelled
                            </option>

                        </select>
                    </form>



                    <span class="badge bg-primary text-dark">{{ ucfirst($order->status) }}</span> <br>
                    <strong>Payment:</strong> {{ $order->payment_method }}
                </div>

                <div>
                    <strong>Customer:</strong> {{ $order->name }} <br>
                    <strong>Contact:</strong> {{ $order->contact }} <br>
                    <strong>Address:</strong> {{ $order->address }}
                </div>

                <div>
                    <strong>Total:</strong> ₹{{ number_format($total, 2) }}
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Product</th>
                            <th>User</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderItems as $item)
                            <tr>
                                <td>{{ $item->product->product_name ?? 'Deleted Product' }}</td>
                                <td>{{ $item->user->name ?? 'N/A' }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>₹{{ $item->price }}</td>
                                <td>₹{{ $item->subtotal }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</div>
@endsection

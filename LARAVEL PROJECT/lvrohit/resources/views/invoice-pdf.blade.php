<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: DejaVu Sans; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>

<h2>Invoice</h2>

<p>
    <strong>Order ID:</strong> {{ $orderId }} <br>
    <strong>Date:</strong> {{ $customer->created_at->format('d-m-Y') }}
</p>

<hr>

<h4>Customer Details</h4>
<p>
    <strong>Name:</strong> {{ $customer->name }} <br>
    <strong>Contact:</strong> {{ $customer->contact }} <br>
    <strong>Address:</strong> {{ $customer->address }}
</p>

<hr>

<h4>Order Items</h4>

<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Product</th>
            <th>Qty.</th>
            <th>Price</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td> {{ $item->product->product_name}}</td>
            <td>{{ $item->qty }}</td>
            <td>₹ {{ number_format($item->price, 2) }}</td>
            <td>₹ {{ number_format($item->subtotal, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3 style="text-align:right">
    Total: ₹ {{ number_format($total, 2) }}
</h3>

<p><strong>Payment Method:</strong> {{ $customer->payment_method }}</p>

<hr>

<p style="text-align:center">Thank you for your order!</p>

</body>
</html>

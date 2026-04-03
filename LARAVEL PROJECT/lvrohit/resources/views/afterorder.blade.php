@extends('maindesign')
<base href="/public">
@section('afterorder')
<br>
@if(session('success'))
<div class="alert alert-success" role="alert">
        <h6>{{session('success')}}</h6>
</div>    
@endif
<div class="row">
<div class="col-md-6">
     <h1>Your Order Placed Successfull</h1>  
     <h2>Thank You For Shoping From Us!</h2>
     <h4>Yuor Order Id: {{$orderId}}</h4>
</div>

  </div>
</section>
@endsection
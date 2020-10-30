

@extends('frontend.layout.master')
@section('content')
<br>
<h3>Your Order details</h3>
<div class="container" style="width: 100%">
    <table class="table table-bordered mt-5">
        <thead>
          <tr class="table-active">
            <th scope="col">Serial No.</th>
            <th scope="col">Product Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($order_details as $key=>$order_detail)
        <tr>
            {{-- @dd($order_detail->discount) --}}
            <td>{{ $key+1 }}</td>
            <td>{{ $order_detail->product_name }}</td>
            <td>{{ $order_detail->product_quantity }}</td>
            <td>{{ isset($order_detail->discount) ? ($order_detail->product_price - ($order_detail->product_price*$order_detail->discount)/100) : $order_detail->product_price }}</td>
        </tr>
        @endforeach
        </tbody>
      </table>
</div>
@endsection

@section('script')


@endsection

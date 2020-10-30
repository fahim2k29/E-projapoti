

@extends('frontend.layout.master')
@section('content')
<br>
<h5>Your Order List</h5>
<div class="container" style="width: 100%" >
    <table class="table table-bordered ">
        <thead>
          <tr class="table-active">
            <th style="text-align: center" scope="col">Order ID</th>
            <th style="text-align: center" scope="col">Total Amount</th>
            <th style="text-align: center" scope="col">Payment Type</th>
            <th style="text-align: center" scope="col">Payment Status</th>
            <th style="text-align: center" scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order )
            <tr >
              <td style="text-align: center">{{ $order->id }}</td>
              <td style="text-align: center">{{ $order->final_total_amount }}</td>
              <td style="text-align: center">{{ ($order->payment_type ==1) ? "Cash on Delivery" : "Credit Card"}}</td>
              <td style="text-align: center">
                   @if($order->delivery_status==null)
                       Pending
                   @elseif($order->delivery_status==1)
                      In Process
                  @elseif($order->delivery_status==2)
                      Delivered
                  @endif
             </td>
              <td style="text-align: center" >
                <form action="{{ url('order/details')}}/{{ $order->id }}">
                    <button type="submit" class="btn btn-primary btn-sm">Details</button>
                </form>
              </td>

            </tr>
            @endforeach

        </tbody>
      </table>
</div>
@endsection
@section('script')


@endsection



@extends('backend.layout.master')
@section('content')
                <div id="toPrint" class="container" style="width:100%">
                    <div class="card">
                        <div class="card-header">
                          <br>
                          <center><h4><b>E-Projapoti</b></h4></center>
                        </div>
                        <div class="card-body">
                            @foreach ($orders as $order)

                            <div class="row">

                                <div class="col-lg-6 col-sm-5 ml-auto">
                                    <table class="table table-clear table-bordered">
                                        <tbody>
                                            <th colspan="2" class="text-center">Customer Information</th>
                                            <tr>
                                                <td class="left">
                                                    <strong>Name</strong>
                                                </td>
                                                <td class="right">
                                                    {{ $order->customers->name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong>Area </strong>
                                                </td>
                                                <td class="right">
                                                    {{ $order->customers->area}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong>Address</strong>
                                                </td>
                                                <td class="right">
                                                    {{ $order->customers->address }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-6 col-sm-5 ml-auto">
                                    <table class="table table-clear table-bordered">
                                        <tbody>
                                            <th colspan="2" class="text-center">Delivery Details</th>
                                            <tr>
                                                <td class="left">
                                                    <strong>Order Date</strong>
                                                </td>
                                                <td class="right">
                                                    {{ $order->created_at }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong>Required Date</strong>
                                                </td>
                                                <td class="right">
                                                    {{ $order->billinginfo->dr_date }}

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong>Required Time</strong>
                                                </td>
                                                <td class="right">
                                                   
                                                    @php
                                                        $time = $order->billinginfo->dr_time;
                                                    @endphp
                                                    @if ($time == 8)
                                                            8AM -9AM
                                                    @elseif($time == 9)
                                                            9AM -10AM
                                                    @elseif ($time == 10)
                                                            10 AM - 11 AM
                                                    @elseif($time == 11)
                                                            11 AM - 12 PM
                                                    @elseif($time ==12)
                                                            12 PM - 1 PM
                                                    @elseif ($time == 13)
                                                            1 PM - 2 PM
                                                    @elseif($time == 14)
                                                            2 PM - 3 PM
                                                    @elseif($time == 15)
                                                            3 PM - 4 PM
                                                    @elseif ($time == 16)
                                                            4 PM - 5 PM
                                                    @elseif($time == 17)
                                                            5 PM - 6 PM
                                                    @elseif($time == 18)
                                                            6 PM - 7 PM
                                                    @elseif ($time == 19)
                                                            7 PM - 8 PM
                                                    @elseif($time == 20)
                                                            8 PM - 9 PM
                                                    @elseif($time == 21)
                                                            9AM -10AM
                                                    @endif

                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="table-responsive-sm">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th> OrderID </th>
                                            <th> Item</th>
                                            <th> Quantity</th>
                                            <th> Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($orders as $order) --}}
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->orderhistory->product_name }}</td>
                                                <td>{{ $order->orderhistory->product_quantity }}</td>
                                                <td>{{ $order->orderhistory->product_price }}</td>
                                            </tr>
                                        {{-- @endforeach --}}
                                    </tbody>
                                </table>
                            </div>


                            <div class="row">
                                <div class="col-lg-8 col-sm-5">
                                </div>
                                <div class="col-lg-4 col-sm-5 ml-auto">
                                    <table class="table table-clear table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="left">
                                                    <strong>Total Amount</strong>
                                                </td>
                                                <td class="right">
                                                    {{-- <strong>৳{{ $orders->total_price }} </strong> --}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong>Total Paid </strong>
                                                </td>
                                                <td class="right">
                                                    {{-- <strong>৳ {{ $orders->total_price }}</strong> --}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong>Due</strong>
                                                </td>
                                                <td class="right">
                                                    <strong>৳ 0 </strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <center><span class="float-right"> <button onclick="myApp.printTable()" >Print</button> </span></center>
                <br>

                <script >

                  var myApp = new function () {
                         this.printTable = function () {
                             var tab = document.getElementById('toPrint');
                             var win = window.open();
                             win.document.write(tab.outerHTML);
                             win.document.close();
                             win.print();
                         }
                     }


                </script>

@endsection


{{--
@extends('backend.layout.master')
@section('content')

    <div class="container" style="width: 100%">

        <table class="table table-bordered">
            <thead>
            <tr user="row">
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->orderhistory->product_name }}</td>
                    <td>{{ $order->orderhistory->product_quantity }}</td>
                    <td>{{ $order->orderhistory->product_price }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection --}}

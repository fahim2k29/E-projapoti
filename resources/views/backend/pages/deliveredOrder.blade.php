@extends('backend.layout.master')
@section('content')

    <div class="container" >

        <table class="table table-bordered">
            <thead>
            <tr user="row">
                <th>SN</th>
                <th>Order Area</th>
                <th>Delivery Agent</th>
                <th>Order Date</th>
                <th>Delivery Date</th>
                <th>Delivery Time</th>
                <th>Customer Name</th>
                <th>Phone</th>
                <th>Payment</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

                @foreach ($orders as $order)
                    @if ($order->delivery_status == 2)
                    <tr>
                        <td>{{ $order->id }}</td>

                        <td>{{ $order->customers->area }}</td>
                        <td>
                            <select name="" id="">
                                <option value="">Pathao</option>
                                <option value="">Path</option>
                                <option value="">Patha</option>
                                <option value="">Pathais na</option>
                            </select>
                        </td>
                        <td>{{ $order->created_at }}</td>

                        <td>{{ $order->billinginfo->dr_date }}</td>

                        <td>
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

                        <td>{{ $order->customers->name }}</td>

                        <td>{{ $order->customers->phone }}</td>

                        <td>
                            @if($order->payment_status == 1)
                                Cash
                            @elseif($order->payment_status == 2)
                                 Card
                            @endif
                        </td>

                        @if($order->delivery_status == null)
                            <td>
                                <button class="btn btn-warning btn-minier ">
                                    <i class="ace-icon fa fa-fire bigger-110"></i>
                                    <span class="bigger-110 no-text-shadow">New</span>
                                </button>
                            </td>

                        @elseif($order->delivery_status == 1)
                            <td>
                                <button class="btn btn-warning btn-minier ">
                                    <i class="ace-icon fa fa-fire bigger-110"></i>
                                    <span class="bigger-110 no-text-shadow">In Process</span>
                                </button>
                            </td>

                        @elseif($order->delivery_status == 2)
                            <td>
                                <button class="btn btn-warning btn-minier ">
                                    <i class="ace-icon fa fa-fire bigger-110"></i>
                                    <span class="bigger-110 no-text-shadow">Delivered</span>
                                </button>
                            </td>

                        @elseif($order->delivery_status == 3)
                            <td>
                                <button class="btn btn-warning btn-minier ">
                                    <i class="ace-icon fa fa-fire bigger-110"></i>
                                    <span class="bigger-110 no-text-shadow">Cancel</span>
                                </button>
                            </td>
                        @endif


                        <td>
                            <div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-sm btn-danger dropdown-toggle">
                                    <i class="ace-icon fa fa-cog"></i>
                                    <i class="ace-icon fa fa-angle-down icon-on-right"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-danger custom-dropdown-position">
                                    <li>
                                        <a href="{{ route('backend.orderDetails',$order->id) }}"><icon class="ace-icon fa fa-pencil-square-o"></icon>Order Details</a>

                                    </li>

                                    <li>
                                        <a href="{{ route('backend.orderStatus',$order->id) }}"><icon class="ace-icon fa fa-pencil-square-o"></icon> Change Status</a>

                                    </li>

                                    <li>
                                        <a href="{{ route('invoice',$order->id) }}"><icon class="ace-icon fa fa-pencil-square-o"></icon> Print Invoice</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('order.delete',$order->id) }}"><icon class="ace-icon fa fa-pencil-square-o"></icon>Delete Order</a>
                                    </li>

                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endif

                @endforeach

            </tbody>
        </table>
    </div>







@endsection

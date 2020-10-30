@extends('backend.layout.master')
@section('content')

    <div class="container" style="width: 100%">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="bg-dark" style="width: 5%">SL</th>
                <th class="bg-dark" style="width: 30%">Coupon Code</th>
                <th class="bg-dark" style="width: 20%">Discount (%)</th>
                <th class="bg-dark" style="width: 30%">Expire Date</th>
                <th class="bg-dark" style="width: 15%">Delete</th>
            </tr>
            </thead>
            <tbody>

            @foreach( $coupons as $key => $coupon )
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$coupon->coupon_code}}</td>
                <td>{{$coupon->discount_percentage}}</td>
                <td>{{$coupon->expire_date}}</td>
                <td><a href="{{route('coupon.delete',$coupon->id)}}" class="btn btn-xs btn-danger">
                    <i class="ace-icon fa fa-trash-o"></i></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@endsection

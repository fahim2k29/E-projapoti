@extends('backend.layout.master')
@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('coupon.store') }}" enctype="multipart/form-data">
                @csrf


                <div class="form-group">
                    <label for="exampleInputPassword1">Coupon Code</label>
                    <input type="text" class="form-control" value="" placeholder="Enter Coupon Name" name="coupon_code">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Discount Percentage (%)</label>
                    <input type="text" name="discount_percentage" placeholder="Enter Percentage" maxlength="2" size="2" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  class="form-control" value="" name="brand_icon">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Expire Date</label>
                    <input type="date" name="expire_date" class="form-control" value="" name="brand_icon">
                </div>

                <button type="submit" class="btn btn-primary">Insert</button>

            </form>
        </div>
    </div>






@endsection

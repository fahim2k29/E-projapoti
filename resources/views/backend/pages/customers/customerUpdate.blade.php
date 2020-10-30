@extends('backend.layout.master')
@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form method="POST" action="{{route('customers.update.confirm',$SingleCustomer->id)}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputPassword1">Customer Name</label>
                    <input type="text" class="form-control" value="{{ $SingleCustomer->name }}" name="customer_name">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Customer Phone</label>
                    <input type="text" class="form-control" value="{{ $SingleCustomer->phone }}" name="customer_phone">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Customer Email</label>
                    <input type="text" class="form-control" value="{{ $SingleCustomer->email }}" name="customer_email">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Customer Type</label>
                    <select class="form-control" id="exampleInputPassword1" name="customer_type">
                        @if($SingleCustomer->type == 1)
                            <option selected value="1">Retail</option>
                            <option value="2">Wholesale</option>
                            <option value="3">Corporate</option>
                        @elseif($SingleCustomer->type == 2)
                            <option value="1">Retail</option>
                            <option selected value="2">Wholesale</option>
                            <option value="3">Corporate</option>
                        @elseif($SingleCustomer->type == 3)
                            <option value="1">Retail</option>
                            <option value="2">Wholesale</option>
                            <option selected value="3">Corporate</option>
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Customer Area</label>
                    <input type="text" class="form-control" value="{{ $SingleCustomer->area }}" name="customer_area">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Customer Address</label>
                    <input type="text" class="form-control" value="{{ $SingleCustomer->address }}" name="customer_address">
                </div>




                <button type="submit" class="btn btn-primary">Update</button>

            </form>
        </div>
    </div>




@endsection

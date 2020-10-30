@extends('backend.layout.master')
@section('content')

    <div class="container" style="width: 100%">

        <div class="row">
            <div class="col-md-6">

                <h1>Status Update</h1>

                <form action="{{ route('order.status.update',$order->id) }}" method="post">
                    @csrf
                    <div>
                        <select name="orderStatus" id="" class="form-control">
                            <option value="">New</option>
                            <option value="1">In Process</option>
                            <option value="2">Delivered</option>
                            <option value="3">Cancel</option>
                        </select>
                    </div>
                    <div style="margin-top: 20px">
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </form>

            </div>

        </div>

    </div>








@endsection

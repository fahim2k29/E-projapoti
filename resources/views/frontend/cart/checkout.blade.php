
@extends('frontend.layout.master')


@section('content')


<div class="container mt-3">
        <div class="card">
        <form action="{{ url('/checkoutSubmit') }}" method="POST">
            @csrf
            <div class="card-body">
                <h4>Checkout</h4>

                <div class="card">
                    <div class="card-body">
                        <div class="row"  style="border:1px solid rgba(0,0,0,0.15); padding-top:15px;  box-shadow: 2px 2px #D5D8DC">
                            <div class="col-md-1">
                                <p><i class="fas fa-map-marker-alt fa-2x"></i></p>
                            </div>
                            <div class="col-md-2">
                                <p><b>Delivery Address</b></p>
                            </div>
                            <div class="col-md-6">
                                <input type="hidden" name="full_name" id="" value="{{ Auth::guard('customer')->user()->name }}">
                                <input type="hidden" name="phone" id="" value="{{ Auth::guard('customer')->user()->phone }}">
                                <input type="hidden" name="email" id="" value="{{ Auth::guard('customer')->user()->email }}">
                                <input type="hidden" name="area" id="" value="{{ Auth::guard('customer')->user()->area }}">
                                <input type="hidden" name="address" id="" value="{{ Auth::guard('customer')->user()->address }}">
                                <input type="hidden" name="final_total_amount" id="" value="{{ $final_total_amount }}">
                                <input type="hidden" name="total_amount" id="" value="{{ $total_amount }}">
                                <input type="hidden" name="coupon_discount" id="" value="{{ $coupon_discount }}">

                                <p >{{ Auth::guard('customer')->user()->address }} , {{ Auth::guard('customer')->user()->area }}</p>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#exampleModal" >Change</button>
                            </div>
                        </div>
                    </div>
                </div>

                <br>
                <div class="card" style="color:black">
                    <div class="card-header row" style="background-color:rgba(0,0,0,0.15);">

                            <p><i class="fas fa-clock"></i> <b> Preferred Delivery Timing</b></p>
                    </div>
                    <div class="card-body row" style="border:1px solid rgba(0,0,0,0.15);">
                            <div class="col-md-3"></div>
                            <div class="col-md-6"> When would you like your Regular Delivery?
                                <div class="row">
                                    <div class="col-md-3">
                                        <select name="dr_date" id="dr-date" required>
                                             <option value="{{ $today }}"> {{ $today }}</option>
                                             @for($i=$tomorrow; $i<=$tomorrow_1; $i++)
                                                {
                                                <option value="{{$i}}">{{$i}}</option>
                                                }
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <select name="dr_time" id="dr-time" required>
                                            <option value="">Select</option>
                                            @switch($todays_details)
                                                @case(6)
                                                    <option value="8">8 AM - 9 AM</option>
                                                @case(7)
                                                    <option value="9">9 AM - 10 AM</option>
                                                @case(8)
                                                    <option value="10">10 AM - 11 AM</option>
                                                @case(9)
                                                    <option value="11">11 AM - 12 PM</option>
                                                @case(10)
                                                    <option value="12">12 PM - 1 PM</option>
                                                @case(11)
                                                    <option value="13">1 PM - 2 PM</option>
                                                @case(12)
                                                    <option value="14">2 PM - 3 PM</option>
                                                @case(13)
                                                    <option value="15">3 PM - 4 PM</option>
                                                @case(14)
                                                    <option value="16">4 PM - 5 PM</option>
                                                @case(15)
                                                    <option value="17">5 PM - 6 PM</option>
                                                @case(16)
                                                    <option value="18">6 PM - 7 PM</option>
                                                @case(17)
                                                    <option value="19">7 PM - 8 PM</option>
                                                @case(18)
                                                    <option value="20">8 PM - 9 PM</option>
                                                @case(19)
                                                    <option value="21">9 PM - 10 PM</option>
                                            @endswitch



                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                    </div>
                </div>


               <div class="card">
                    <div class="card-header">
                            <div class="row" style="color:black">
                                    <div class="col-md-5">Payment options available on the next page</div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-3">৳ 20 Delivery charge included</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" style="border:1px solid rgba(0,0,0,0.15);">
                                    <div class="pm-item">
										<input type="radio" name="payment_type" id="one" value="1" required>
										<label for="one">Cash on delievery</label>
									</div>
									<div class="pm-item">
										<input type="radio" name="payment_type" id="two" value="2" required>
										<label for="two">Credit Card</label>
									</div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                            </div>
                    </div>
                    <div class="card-body">
                            <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3">
                                        <div class="btn-group" role="group" aria-label="Basic example">

                                            <button type="submit" class="btn btn-outline-danger" style="background-color:#ff686e; color:white;">Confirm ORder</button>

                                            <button name="total_amount" type="button" class="btn btn-success "> ৳ {{ $final_total_amount }}</button>

                                        </div>
                                    </div>
                            </div>
                    </div>
               </div>

            </div>
        </form>
        </div>
    </div>





    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Your Delivery Address</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('address.update',Auth::guard('customer')->user()->id) }}" method="post">
             @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Area</label>
                    <select name="area" id="">
                        <option value=""> {{ Auth::guard('customer')->user()->area }} </option>
                        <option value="Mohammadpur">Mohammadpur</option>
                        <option value="Adabor">Adabor</option>
                        <option value="Mirpur">Mirpur</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Address</label>
                    <textarea class="form-control" name="address" id="message-text">{{ Auth::guard('customer')->user()->address }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        </div>
    </div>
    </div>
@endsection

@section('script')

    <script type="text/javascript">

    </script>

@endsection

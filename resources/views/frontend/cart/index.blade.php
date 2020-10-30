
@extends('frontend.layout.master')


@section('content')


<div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <div name="cart">
                    <table name="cart" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th width="20">Image</th>
                            <th width="20">Name</th>
                            <th width="10">Quantity</th>
                            <th width="20">Price</th>
                            <th width="20">Total</th>
                            <th width="10">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @php
                            $sub_total = 0;
                            $key = 1;
                        @endphp

                        @forelse($cartItems as $cartItem)
                          <tr >
                          @php
                            $image_id = $cartItem->product_id;
                            $image_name = App\Product::where('id','=', $cartItem->product_id)->with('images')->first(); //joy
                            $imageName = App\ProductImage::where('product_id','=',$image_id)->pluck('product_image')->toArray();
                            $image = implode(":", $imageName);
                          @endphp
                           <th>
                            <img src="{{ asset('images/'.$image) }}" alt="" style="width: 80px; height: 50px; margin: 5px; margin-right:-20px; margin-left:5px">
                           </th>
                            <td style="color:Black">{{ App\Product::find($cartItem->product_id)->name}}</td>
                            <td>
                                <form action="{{ route('updateQuantity',$cartItem->id) }}"  method="post">
                                    @csrf
                                    <input type="number" style="width: 70px; height:35px;display:inline;" name="qty"
                                            value="{{ $cartItem->product_quantity}}" min="1" class="form-control form-control-sm"/>
                                    <input type="hidden" name="p_id" value="{{ $cartItem->product_id }}">

                                    <button  type="submit" class="btn btn-primary btn-sm" style="margin-top:18px;">Update </button>
                                </form>
                                    @if(App\Product::find($cartItem->product_id)->quantity == 0)
                                    <div class="alert alert-danger" >Out of stock, please Delete this</div>
                                        @endif
                            </td>
                            @php
                                $price = App\Product::find($cartItem->product_id)->mrp_price;
                                $discount = App\Product::find($cartItem->product_id)->discount_price;
                                $dis_price = $price - (($price*$discount)/100);
                            @endphp

                            <td><input type="text" name="price" value="{{ isset($discount) ? $dis_price : $price }}" class="form-control form-control-sm" readonly/></td>
                            <td><input type="text" name="item_total"  value="{{ isset($discount) ? $dis_price*$cartItem->product_quantity : $price*$cartItem->product_quantity  }}" class="form-control form-control-sm"/>
                            @php
                            $sub_total += isset($discount) ? $dis_price*$cartItem->product_quantity : $price*$cartItem->product_quantity;
                            // $sub_total += ($cartItem->product_quantity)*(App\Product::find($cartItem->product_id)->mrp_price);
                            @endphp
                            </td>
                            <td style="padding-top:1px">
                               <a href="{{ url('delete/from/cart') }}/{{ $cartItem->id }}" class="btn btn-danger" style="padding-bottom:1px"><span aria-hidden="true">&times;</span>  </a>
                            </td>
                          </tr>

                          @empty
                        <tr name="line_items">
                            <td colspan="6">
                               <h2 class="text-center">No Product To show</h2>
                            </td>
                        </tr>
                        @endforelse
                        </tbody>
                      </table>

                        <div class="container" style="border:1px solid rgba(0,0,0,0.15); padding-top:10px; margin-bottom:10px;  box-shadow: 2px 2px #D5D8DC" >
                            <div class="row">
                                <div class="col-md-4">
                                <p>Have a Special Code?</p>
                                    <input type="text" id="coupon_code_input_field" placeholder="Special Code" value="{{ $coupon_name }}" style=" text-align: center;   width: 200px; height:35px; border-radius:5px; display: inline; background-color:#e3e3e3;">
                                    <button class="btn btn-primary btn-sm" style="margin-top:18px; border-radius:5px;background-color:#ff686e;" id="coupon_btn">Go</button>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p>Subtotal  </p>
                                            <p>Delivery Charge </p>
                                            <p>Coupon Discount ( {{ $coupon_percentage }} %)  </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>৳ {{$sub_total}}</p>
                                            @if($sub_total == 0)
                                                <p>৳ 0 </p>
                                            @else
                                                <p>৳ 20 </p>
                                            @endif
                                            <p>৳ {{ ($sub_total * ($coupon_percentage)/100) }}</p>
                                        </div>
                                    </div>
                                    <div class="row" style="border:2px solid rgba(0,0,0,0.25); padding-top:5px; margin-bottom:3px;">
                                        <div class="col-md-8">
                                         <p style="font-weight: 900;">Total Amount </p>
                                        </div>
                                        <div class="col-md-4">
                                        @if($sub_total == 0)
                                         <p style="font-weight: 900;">৳ {{($sub_total)+0}}</p>
                                        @else
                                         <p style="font-weight: 900;">৳ {{($sub_total)-($sub_total * ($coupon_percentage)/100)+20}}</p>
                                        @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-6">
                                <a class="btn btn-primary" href="{{url('/')}}" style="margin-top:18px;">Continue Shooping</a>
                                </div>
                                <div class="col-md-6 text-right">

                                    @guest('customer')
                                        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#exampleModal">Checkout</a>
                                    @else
                                        @if(App\Cart::count() == 0)
                                            <a class="btn btn-primary" href="" data-toggle="modal" data-target="#exampleModalCheckout">Checkout</a>

                                        @else
                                            <form action="{{ url('checkout') }}" method="post">
                                                @csrf
                                                <a class="btn btn-primary" href="{{ url('delete/from/cart/all') }}">Clear</a>
                                                <input type="hidden" name="total_amount" id="" value="{{ $sub_total}}">
                                                <input type="hidden" name="coupon_discount" id="" value="{{($sub_total * ($coupon_percentage)/100) }}">
                                                <input type="hidden" name="final_total_amount" id="" value="{{($sub_total)-($sub_total * ($coupon_percentage)/100)+20}}">
                                                <button class="btn btn-primary" style="display:inline;margin-top:18px;" type="submit">Checkout</button>
                                            </form>
                                        @endif
                                    @endguest

                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
   </div>


{{--    Modal Start--}}
<!-- Button trigger modal -->


<!-- Modal -->
    <div class="modal fade" id="exampleModalCheckout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title cusom-modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1 class="text-center text-danger">Please Add Product!</h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
{{--    Modal End--}}



@endsection

@section('script')
   <script>

       $(document).ready(function(){
           $('#coupon_btn').click(function(){
                var coupon_code = $('#coupon_code_input_field').val();
                var link_to_go = "{{ url('cart') }}/"+coupon_code;
                window.location.href = link_to_go;
           });
       });
   </script>


@endsection

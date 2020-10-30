@extends('frontend.layout.master')


@section('content')

    <div class="container-fluid" style="margin-top: 73px !important;">
        <div class="custom-img-css text-center">
            <i class="{{ $SubSubCategoryName->icon }}" style="font-size: 100px"></i>
        </div>
    </div>


    <!-- flaush sale start -->
    <div class="custom-sale mt-5">
        <div class="row">
            <div class="col-md-5">
                <hr>
            </div>
            <div class="col-md-2">
                <h4>{{ $SubSubCategoryName->name }} </h4>
            </div>
            <div class="col-md-5">
                <hr>
            </div>
        </div>
    </div>
    <!-- flaush sale end -->

    <!-- Products Section Start -->
    @guest('customer')

        <div class="row">
            @foreach($subSubProducts as $subSubProduct)

                @if($subSubProduct->wholesaleCheck == NULL and $subSubProduct->corporateCheck == NULL )

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <img  src="{{ asset("images/".optional($subSubProduct->images->first())->product_image) }}" style="height: 160px" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <p class="subSubExtraID"></p>
                            <p class="card-text text-center mb-4">{{ $subSubProduct->name }}</p>
                            <p class="text-center">{{ $subSubProduct->title }}</p>
                            <p class="text-center">{{ $subSubProduct->mrp_price }}</p>
                            <button type="button" id="singleDetailsId" onclick="getSubSubDetails({{ $subSubProduct->id }})" class="btn btn-success btn-block custom-modal-btn-margin">details > </button>
                            @if($subSubProduct->quantity > 0)
                            <a href="{{ url('add/to/cart') }}/{{ $subSubProduct->id }}"  type="button" id="singleDetailsCartId" onclick="addToCart({{ $subSubProduct->id }})"  class="btn btn-danger btn-lg btn-block add-cart" >Add to cart</a>
                            @else
                            <div class="alert alert-danger">
                            No Product Available
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                @endif

            @endforeach

        </div>
    @else
        <div class="row">

        @foreach($subSubProducts as $subSubProduct)
            @if(Auth::guard('customer')->user()->type == 2 and $subSubProduct->wholesaleCheck == 1 || ($subSubProduct->wholesaleCheck == null and $subSubProduct->corporateCheck == null))

                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card">
                            <img  src="{{ asset("images/".optional($subSubProduct->images->first())->product_image) }}" style="height: 160px" class="card-img-top w-100" alt="...">
                            <div class="card-body">
                                <p class="subSubExtraID"></p>
                                <p class="card-text text-center mb-4">{{ $subSubProduct->name }}</p>
                                <p class="text-center">{{ $subSubProduct->title }}</p>
                                @if($subSubProduct->wholesaleCheck == null and $subSubProduct->corporateCheck == null)
                                     <p class="text-center">{{ $subSubProduct->mrp_price }}</p>
                                @else
                                    <p class="text-center">{{ $subSubProduct->business_price }}</p>
                                @endif
                                <button type="button" id="singleDetailsId" @if($subSubProduct->wholesaleCheck == null and $subSubProduct->corporateCheck == null)
                                onclick="getSubSubDetails({{ $subSubProduct->id }})"
                                @else onclick="getWholesaleSubSubDetails({{ $subSubProduct->id }})"
                                @endif  class="btn btn-success btn-block custom-modal-btn-margin">details > </button>
                                @if($subSubProduct->quantity > 0)
                                    <a href="{{ url('add/to/cart') }}/{{ $subSubProduct->id }}"  type="button" id="singleDetailsCartId" onclick="addToCart({{ $subSubProduct->id }})"  class="btn btn-danger btn-lg btn-block add-cart" >Add to cart</a>
                                @else
                                    <div class="alert alert-danger">
                                        No Product Available
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                @elseif(Auth::guard('customer')->user()->type == 3 and $subSubProduct->corporateCheck == 2 || ($subSubProduct->corporateCheck == null and $subSubProduct->wholesaleCheck == null))
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card">
                            <img  src="{{ asset("images/".optional($subSubProduct->images->first())->product_image) }}" style="height: 160px" class="card-img-top w-100" alt="...">
                            <div class="card-body">
                                <p class="subSubExtraID"></p>
                                <p class="card-text text-center mb-4">{{ $subSubProduct->name }}</p>
                                <p class="text-center">{{ $subSubProduct->title }}</p>
                                @if($subSubProduct->corporateCheck == null and $subSubProduct->wholesaleCheck == null)
                                    <p class="text-center">{{ $subSubProduct->mrp_price }}</p>
                                @else
                                    <p class="text-center">{{ $subSubProduct->corporate_price }}</p>
                                @endif
                                <button type="button" id="singleDetailsId" @if($subSubProduct->corporateCheck == null and $subSubProduct->wholesaleCheck == null)
                                onclick="getSubSubDetails({{ $subSubProduct->id }})"
                                @else onclick="getCorporateSubSubDetails({{ $subSubProduct->id }})"
                                @endif class="btn btn-success btn-block custom-modal-btn-margin">details > </button>
                                @if($subSubProduct->quantity > 0)
                                    <a href="{{ url('add/to/cart') }}/{{ $subSubProduct->id }}"  type="button" id="singleDetailsCartId" onclick="addToCart({{ $subSubProduct->id }})"  class="btn btn-danger btn-lg btn-block add-cart" >Add to cart</a>
                                @else
                                    <div class="alert alert-danger">
                                        No Product Available
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endguest
                <!-- Products Section End -->


    <!-- Modal Section Start -->

    <div class="modal fade" id="SubSubDetailsModalShow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header custom-modal-header">
                    <h5 class="modal-title cusom-modal-title" id="exampleModalLabel">Details</h5>
                    <button type="button" class="close custom-modal-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">

{{--                            <img class="img-fluid w-100" src="" id="images" alt="">--}}
                            <span id="images"></span>

                        </div>
                        <div class="col-md-6">
                            <h1 class="custom-details-modal-lineHeight" id="nameDelails"></h1>
                            <h4 class="custom-details-modal-lineHeight" id="titleDelails"></h4>
                            <h5 class="custom-details-modal-lineHeight" id="priceDelails"></h5>
                            <label for="">Quantity</label>
                            <input type="number" value="1">
                            <p id="descriptionDelails"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
{{--                    <button type="button" class="btn btn-danger  btn-block ">Buy Now</button>--}}
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Section End -->


    <!-- Modal Section for wholesate Start -->

    <div class="modal fade" id="subSubWholesateDetailsModalShow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header custom-modal-header">
                    <h5 class="modal-title cusom-modal-title" id="exampleModalLabel">Details</h5>
                    <button type="button" class="close custom-modal-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">

                            {{--                            <img class="img-fluid w-100" src="" id="images" alt="">--}}
                            <span id="subsubimagesWholesale"></span>

                        </div>
                        <div class="col-md-6">
                            <h1 class="custom-details-modal-lineHeight" id="subsubnameDelailsWholesale"></h1>
                            <h4 class="custom-details-modal-lineHeight" id="subsubtitleDelailsWholesale"></h4>
                            <h5 class="custom-details-modal-lineHeight" id="subsubpriceDelailsWholesale"></h5>
                            <label for="">Quantity</label>
                            <input type="number" value="1">
                            <p id="subsubdescriptionDelailsWholesale"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
{{--                    <button type="button" class="btn btn-danger  btn-block">Buy Now</button>--}}
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Section for wholesate End -->



    <!-- Modal Section for corporate Start -->

    <div class="modal fade" id="subSubCorporateDetailsModalShow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header custom-modal-header">
                    <h5 class="modal-title cusom-modal-title" id="exampleModalLabel">Details</h5>
                    <button type="button" class="close custom-modal-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">

                            {{--                            <img class="img-fluid w-100" src="" id="images" alt="">--}}
                            <span id="subsubimagesCorporate"></span>

                        </div>
                        <div class="col-md-6">
                            <h1 class="custom-details-modal-lineHeight" id="subsubnameDelailsCorporate"></h1>
                            <h4 class="custom-details-modal-lineHeight" id="subsubtitleDelailsCorporate"></h4>
                            <h5 class="custom-details-modal-lineHeight" id="subsubpriceDelailsCorporate"></h5>
                            <label for="">Quantity</label>
                            <input type="number" value="1">
                            <p id="subsubdescriptionDelailsCorporate"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
{{--                    <button type="button" class="btn btn-danger  btn-block">Buy Now</button>--}}
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Section for corporate End -->




@endsection



@section('script')


        {{-- <script type="text/javascript">
            var clicks = 0 ;
            $("#singleDetailsCartId").click(function(){ clicks++; $('#topCart').html(clicks);});
        </script> --}}



    <script type="text/javascript">

    </script>

@endsection

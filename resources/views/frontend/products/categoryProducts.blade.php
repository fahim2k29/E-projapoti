@extends('frontend.layout.master')


@section('content')

    <div class="container-fluid" style="margin-top: 73px !important;">
        <div class="custom-img-css text-center">
            <i class="{{ $categoryName->icon }}" style="font-size: 100px"></i>
        </div>
    </div>


    <!-- flaush sale start -->
    <div class="custom-sale mt-5">
        <div class="row">
            <div class="col-md-5">
                <hr>
            </div>
            <div class="col-md-2">
                <h4>{{ $categoryName->name }} </h4>
            </div>
            <div class="col-md-5">
                <hr>
            </div>
        </div>
    </div>
    <!-- flaush sale end -->

    <!-- Products Section Start  -->
    @guest('customer')

        <div class="row">
                @foreach($categoryProducts as $categoryProduct)

                    @if($categoryProduct->wholesaleCheck == NULL and $categoryProduct->corporateCheck == NULL )

                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card">
                            <img  src="{{ asset('images/'.optional($categoryProduct->images->first())->product_image) }}" class="card-img-top w-100" style="height: 160px" alt="...">
                            <div class="card-body">
                                <p class="categoryExtraID"></p>
                                <p class="text-center">{{ $categoryProduct->name }}</p>
                                <p class="text-center">{{ $categoryProduct->title }}</p>
                                <p class="text-center">{{ $categoryProduct->mrp_price }}</p>
                                <button type="button" onclick="getCategoryDetails({{ $categoryProduct->id }})" id="singleDetailsId" class="btn btn-success btn-block custom-modal-btn-margin">details -> </button>
                                @if($categoryProduct->quantity > 0)
                                <a href="{{ url('add/to/cart') }}/{{ $categoryProduct->id }}"  type="button" id="singleDetailsCartId"   class="btn btn-danger btn-lg btn-block add-cart" >Add to cart</a>
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

                @foreach($categoryProducts as $categoryProduct)


                    @if(Auth::guard('customer')->user()->type == 2 and $categoryProduct->wholesaleCheck == 1 || ($categoryProduct->wholesaleCheck == null and $categoryProduct->corporateCheck == null))

                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card">
                                <img  src="{{ asset('images/'.optional($categoryProduct->images->first())->product_image) }}"  style="height: 160px"class="card-img-top w-100" alt="...">
                                <div class="card-body">
                                    <p class="categoryWholesaleExtraID"></p>
                                    <p class="text-center">{{ $categoryProduct->name }}</p>
                                    <p class="text-center">{{ $categoryProduct->title }}</p>
                                    @if($categoryProduct->wholesaleCheck == null and $categoryProduct->corporateCheck == null)
                                        <p class="text-center">{{ $categoryProduct->mrp_price }}</p>
                                    @else
                                        <p class="text-center">{{ $categoryProduct->business_price }}</p>
                                    @endif
                                    <button type="button" @if($categoryProduct->wholesaleCheck == null and $categoryProduct->corporateCheck == null)
                                        onclick="getCategoryDetails({{ $categoryProduct->id }})"
                                      @else onclick="getWholesaleCategoryDetails({{ $categoryProduct->id }})"
                                    @endif id="singleDetailsId" class="btn btn-success btn-block custom-modal-btn-margin">details -> </button>

                                    @if($categoryProduct->quantity > 0)
                                        <a href="{{ url('add/to/cart') }}/{{ $categoryProduct->id }}"  type="button" id="singleDetailsCartId" onclick="addToCart({{ $categoryProduct->id }})"  class="btn btn-danger btn-lg btn-block add-cart" >Add to cart</a>
                                    @else
                                        <div class="alert alert-danger">
                                            No Product Available
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    @elseif(Auth::guard('customer')->user()->type == 3 and $categoryProduct->corporateCheck == 2 || ($categoryProduct->corporateCheck == null and $categoryProduct->wholesaleCheck == null))

                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card">
                                <img  src="{{ asset('images/'.optional($categoryProduct->images->first())->product_image) }}" style="height: 160px" class="card-img-top w-100" alt="...">
                                <div class="card-body">
                                    <p class="categoryExtraID"></p>
                                    <p class="text-center">{{ $categoryProduct->name }}</p>
                                    <p class="text-center">{{ $categoryProduct->title }}</p>
                                    @if($categoryProduct->corporateCheck == null and $categoryProduct->wholesaleCheck == null)
                                         <p class="text-center">{{ $categoryProduct->mrp_price }}</p>
                                    @else
                                        <p class="text-center">{{ $categoryProduct->corporate_price }}</p>
                                    @endif
                                        <button type="button" @if($categoryProduct->corporateCheck == null and $categoryProduct->wholesaleCheck == null)
                                             onclick="getCategoryDetails({{ $categoryProduct->id }})"
                                        @else  onclick="getCorporateCategoryDetails({{ $categoryProduct->id }})"
                                        @endif id="singleDetailsId" class="btn btn-success btn-block custom-modal-btn-margin">details -> </button>
                                    @if($categoryProduct->quantity > 0)
                                        <a href="{{ url('add/to/cart') }}/{{ $categoryProduct->id }}"  type="button" id="singleDetailsCartId" onclick="addToCart({{ $categoryProduct->id }})"  class="btn btn-danger btn-lg btn-block add-cart" >Add to cart</a>
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

    <div class="modal fade" id="CategoryDetailsModalShow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
{{--                    <button type="button" class="btn btn-danger  btn-block">Buy Now</button>--}}
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Section End -->











    <!-- Modal Section for wholesate Start -->

    <div class="modal fade" id="CategoryWholesateDetailsModalShow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <span id="imagesWholesale"></span>

                        </div>
                        <div class="col-md-6">
                            <h1 class="custom-details-modal-lineHeight" id="nameDelailsWholesale"></h1>
                            <h4 class="custom-details-modal-lineHeight" id="titleDelailsWholesale"></h4>
                            <h5 class="custom-details-modal-lineHeight" id="priceDelailsWholesale"></h5>
                            <label for="">Quantity</label>
                            <input type="number" value="1">
                            <p id="descriptionDelailsWholesale"></p>
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

    <div class="modal fade" id="CategoryCorporateDetailsModalShow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <span id="imagesCorporate"></span>

                        </div>
                        <div class="col-md-6">
                            <h1 class="custom-details-modal-lineHeight" id="nameDelailsCorporate"></h1>
                            <h4 class="custom-details-modal-lineHeight" id="titleDelailsCorporate"></h4>
                            <h5 class="custom-details-modal-lineHeight" id="priceDelailsCorporate"></h5>
                            <label for="">Quantity</label>
                            <input type="number" value="1">
                            <p id="descriptionDelailsCorporate"></p>
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

    <script type="text/javascript">

    </script>

@endsection

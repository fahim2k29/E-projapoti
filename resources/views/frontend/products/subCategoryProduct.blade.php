@extends('frontend.layout.master')


@section('content')

    <div class="container-fluid" style="margin-top: 73px !important;">
        <div class="custom-img-css text-center">
            <i class="{{ $SubCategoryName->icon }}" style="font-size: 100px"></i>
        </div>
    </div>


    <!-- flaush sale start -->
    <div class="custom-sale mt-5">
        <div class="row">
            <div class="col-md-5">
                <hr>
            </div>
            <div class="col-md-2">
                <h4>{{ $SubCategoryName->name }} </h4>
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

        @foreach($subCategoryProducts as $subCategoryProduct)


            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card">
                    <img  src="{{ asset('images/'.optional($subCategoryProduct->images->first())->product_image) }}" class="card-img-top w-100" alt="...">
                    <div class="card-body">
                        <p class="subExtraID"></p>
                        <p class="card-text">{{ $subCategoryProduct->name }}</p>
                        <p class="text-center">{{ $subCategoryProduct->title }}</p>
                        <p class="text-center">{{ $subCategoryProduct->mrp_price }}</p>
                        <button type="button" onclick="getSubCategoryDetails({{ $subCategoryProduct->id }})" id="singleDetailsId" class="btn btn-success btn-block custom-modal-btn-margin">details -> </button>
                        @if($subCategoryProduct->quantity > 0)
                        <a href="{{ url('add/to/cart') }}/{{ $subCategoryProduct->id }}"  type="button" id="singleDetailsCartId"   class="btn btn-danger btn-lg btn-block add-cart" >Add to cart</a>
                        @else
                        <div class="alert alert-danger">
                        No Product Available
                        </div>
                        @endif

            @if($subCategoryProduct->wholesaleCheck == NULL and $subCategoryProduct->corporateCheck == NULL )
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <img  src="{{ asset('images/'.optional($subCategoryProduct->images->first())->product_image) }}" style="height: 160px" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <p class="subWholesaleExtraID"></p>
                            <p class="card-text">{{ $subCategoryProduct->name }}</p>
                            <p class="text-center">{{ $subCategoryProduct->title }}</p>
                            <p class="text-center">{{ $subCategoryProduct->mrp_price }}</p>
                            <button type="button" onclick="getSubCategoryDetails({{ $subCategoryProduct->id }})" id="singleDetailsId" class="btn btn-success btn-block custom-modal-btn-margin">details -> </button>
                            <button type="button"  class="btn btn-danger btn-lg btn-block" >Add To Cart</button>
                        </div>

                    </div>
                </div>
            @endif

        @endforeach


    </div>

    @else

        <div class="row">

            @foreach($subCategoryProducts as $subCategoryProduct)

                @if(Auth::guard('customer')->user()->type == 2 and $subCategoryProduct->wholesaleCheck == 1 || ($subCategoryProduct->wholesaleCheck == null and $subCategoryProduct->corporateCheck == null))

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <img  src="{{ asset('images/'.optional($subCategoryProduct->images->first())->product_image) }}" style="height: 160px" class="card-img-top w-100" alt="...">
                        <div class="card-body">
                            <p class="subWholesaleExtraID"></p>
                            <p class="card-text">{{ $subCategoryProduct->name }}</p>
                            <p class="text-center">{{ $subCategoryProduct->title }}</p>
                            @if($subCategoryProduct->wholesaleCheck == null and $subCategoryProduct->corporateCheck == null)
                                 <p class="text-center">{{ $subCategoryProduct->mrp_price }}</p>
                            @else
                                <p class="text-center">{{ $subCategoryProduct->business_price }}</p>
                            @endif
                                <button type="button" @if($subCategoryProduct->wholesaleCheck == null and $subCategoryProduct->corporateCheck == null)
                                    onclick="getSubCategoryDetails({{ $subCategoryProduct->id }})"
                                    @else onclick="getWholesaleSubCategoryDetails({{ $subCategoryProduct->id }})"
                                    @endif   id="singleDetailsId" class="btn btn-success btn-block custom-modal-btn-margin">details -> </button>
                            @if($subCategoryProduct->quantity > 0)
                                <a href="{{ url('add/to/cart') }}/{{ $subCategoryProduct->id }}"  type="button" id="singleDetailsCartId" onclick="addToCart({{ $subCategoryProduct->id }})"  class="btn btn-danger btn-lg btn-block add-cart" >Add to cart</a>
                            @else
                                <div class="alert alert-danger">
                                    No Product Available
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                @elseif(Auth::guard('customer')->user()->type == 3 and $subCategoryProduct->corporateCheck == 2 || ($subCategoryProduct->corporateCheck == null and $subCategoryProduct->wholesaleCheck == null))
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card">
                            <img  src="{{ asset('images/'.optional($subCategoryProduct->images->first())->product_image) }}" style="height: 160px" class="card-img-top w-100" alt="...">
                            <div class="card-body">
                                <p class="subExtraID"></p>
                                <p class="card-text">{{ $subCategoryProduct->name }}</p>
                                <p class="text-center">{{ $subCategoryProduct->title }}</p>
                                @if($subCategoryProduct->corporateCheck == null and $subCategoryProduct->wholesaleCheck == null)
                                    <p class="text-center">{{ $subCategoryProduct->mrp_price }}</p>
                                @else
                                    <p class="text-center">{{ $subCategoryProduct->corporate_price }}</p>
                                @endif
                                <button type="button" @if($subCategoryProduct->corporateCheck == null and $subCategoryProduct->wholesaleCheck == null)
                                onclick="getSubCategoryDetails({{ $subCategoryProduct->id }})"
                                @else onclick="getCorporateSubCategoryDetails({{ $subCategoryProduct->id }})"
                                @endif id="singleDetailsId" class="btn btn-success btn-block custom-modal-btn-margin">details -> </button>
                                @if($subCategoryProduct->quantity > 0)
                                    <a href="{{ url('add/to/cart') }}/{{ $subCategoryProduct->id }}"  type="button" id="singleDetailsCartId" onclick="addToCart({{ $subCategoryProduct->id }})"  class="btn btn-danger btn-lg btn-block add-cart" >Add to cart</a>
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

    <div class="modal fade" id="SubDetailsModalShow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <div class="modal fade" id="SubCategoryWholesateDetailsModalShow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <span id="imagesSubWholesale"></span>

                        </div>
                        <div class="col-md-6">
                            <h1 class="custom-details-modal-lineHeight" id="nameSubDelailsWholesale"></h1>
                            <h4 class="custom-details-modal-lineHeight" id="titleSubDelailsWholesale"></h4>
                            <h5 class="custom-details-modal-lineHeight" id="priceSubDelailsWholesale"></h5>
                            <label for="">Quantity</label>
                            <input type="number" value="1">
                            <p id="descriptionSubDelailsWholesale"></p>
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


    <!-- Modal Section for Corporate Start -->

    <div class="modal fade" id="SubCategoryCorporateDetailsModalShow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <span id="imagesSubCorporate"></span>

                        </div>
                        <div class="col-md-6">
                            <h1 class="custom-details-modal-lineHeight" id="nameSubDelailsCorporate"></h1>
                            <h4 class="custom-details-modal-lineHeight" id="titleSubDelailsCorporate"></h4>
                            <h5 class="custom-details-modal-lineHeight" id="priceSubDelailsCorporate"></h5>
                            <label for="">Quantity</label>
                            <input type="number" value="1">
                            <p id="descriptionSubDelailsCorporate"></p>
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








@endsection



@section('script')

    <script type="text/javascript">

    </script>

@endsection

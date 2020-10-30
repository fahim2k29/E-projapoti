@extends('frontend.layout.master')


@section('content')

    <div class="container-fluid" style="margin-top: 73px !important;">
        <div class="custom-img-css text-center">
            <i class="fas fa-business-time" style="font-size: 100px"></i>
        </div>
    </div>


    <!-- flaush sale start -->
    <div class="custom-sale mt-5">
        <div class="row">
            <div class="col-md-5">
                <hr>
            </div>
            <div class="col-md-2">
                <h4>Special For Corporate </h4>
            </div>
            <div class="col-md-5">
                <hr>
            </div>
        </div>
    </div>
    <!-- flaush sale end -->

    <!-- Products Section Start -->
    <div class="row">
        @foreach($corporateProducts as $corporateProduct)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card">
                    <img  src="{{ asset("images/".optional($corporateProduct->images->first())->product_image) }}" style="height: 160px" class="card-img-top w-100" alt="...">
                    <div class="card-body">
                        <p class="subSubExtraID"></p>
                        <p class="card-text text-center mb-4">{{ $corporateProduct->name }}</p>
                        <p class="text-center">{{ $corporateProduct->title }}</p>
                        <p class="text-center">{{ $corporateProduct->corporate_price }}</p>
                        <button type="button" id="singleDetailsId" onclick="getSubSubDetails({{ $corporateProduct->id }})" class="btn btn-success btn-block custom-modal-btn-margin">details > </button>
                        @if($corporateProduct->quantity > 0)
                            <a href="{{ url('add/to/cart') }}/{{ $corporateProduct->id }}"  type="button" id="singleDetailsCartId" onclick="addToCart({{ $corporateProduct->id }})"  class="btn btn-danger btn-lg btn-block add-cart" >Add to cart</a>
                        @else
                            <div class="alert alert-danger">
                                No Product Available
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

    </div>
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




@endsection



@section('script')





    <script type="text/javascript">

    </script>

@endsection

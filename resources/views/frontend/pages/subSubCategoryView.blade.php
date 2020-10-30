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
    <div class="row">

        @foreach($singleSubSubCategory as $singleSubSubCategory)

            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <i class="{{ $singleSubSubCategory->icon }}" style="font-size: 100px; text-align: center; display: block;"></i>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('front.subsubproducts.view',$singleSubSubCategory->id) }}" class="text-center d-block">{{ $singleSubSubCategory->name }}</a>
                    </div>
                </div>
            </div>

        @endforeach



    </div>
    <!-- Products Section End -->


@endsection

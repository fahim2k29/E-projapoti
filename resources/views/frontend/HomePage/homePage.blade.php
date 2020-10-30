@extends('frontend.layout.master')


@section('content')



    <!-- Custom Backgroud Image start -->
    @include('frontend.HomePage.liveSearch')

    @include('frontend.layout.topBackgroud')

    @include('frontend.layout.rightContentImage')

    @include('frontend.HomePage.ourProductCategory')

    @include('frontend.HomePage.howToOrder')

    @include('frontend.HomePage.specialOffer')

    @include('frontend.HomePage.whyLoveUs')

    @include('frontend.HomePage.whatClientSay')

    @include('frontend.HomePage.doYouOwn')

{{--    @include('frontend.HomePage.familyPartner')--}}

    {{-- @include('frontend.homePage.totalOrder') --}}

    @include('frontend.HomePage.homePageFooter')


@endsection

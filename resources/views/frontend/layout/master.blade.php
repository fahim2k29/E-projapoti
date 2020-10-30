<!DOCTYPE html>
<html lang="en">

<!-- Developed by Smart Software Limited -->
<head>

    @php
        $allCategories = App\Category::with('subCategories')->get();
        $allSubCategories = App\SubCategory::with('category','subSubCategories')->get();
        $allSubSubCategories = App\SubSubCategory::with('subCategory')->get();
        $configuration =  App\Configuration::first();
        $seo =  App\Seo::first();
    @endphp

    @include('frontend.layout.metaTag')
    @php
        $result = App\Configuration::first();
    @endphp



    <title>{{ $configuration->company_title }}</title>


    @include('frontend.layout.css')

</head>
<body class="vertical-layout">



    @include('frontend.layout.infobar')

   @include('frontend.layout.settingSidebar')

    <!-- Start Containerbar -->
    <div id="containerbar">



        @include('frontend.layout.leftbar')

        <!-- Start Rightbar -->
        <div class="rightbar">

           @include('frontend.layout.mobileTopBar')
           @include('frontend.layout.topbar')


        <div class="mt-5" style="margin-top: 56px !important;"><p class="d-none">.</p></div>
            @include('frontend.layout.message')
           @yield('content')


        </div>
        <!-- End Rightbar -->
    </div>
    <!-- End Containerbar -->

    @include('frontend.layout.modal')

    @include('frontend.layout.script')

    @yield('script')

    <script>
        function redirectUrl(url){
            window.location = url;
        }
    </script>


</body>

<!-- Developed by Smart Software Limited -->
</html>

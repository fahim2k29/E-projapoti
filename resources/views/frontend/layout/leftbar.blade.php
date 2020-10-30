<!-- Start Leftbar -->
<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        @php
            $result = App\Configuration::first();
        @endphp
        <div class="logobar custom-logobar">

            <a href="{{ url('/') }}" class="logo logo-large"><img src="{{asset('images/'.$configuration->company_logo)}}" style="height: 30px;" class="img-fluid" alt="logo"></a>
            <a href="{{ url('/') }}" class="logo logo-small"><img src="{{asset('images/'.$configuration->company_logo)}}" style="height: 30px;" class="img-fluid" alt="logo"></a>


        </div>
        <!-- End Logobar -->


        <!-- Start Navigationbar -->

        <div class="navigationbar">

            <ul class="vertical-menu">


                <li class="vertical-header"></li>


                @foreach($allCategories as $allCategory)

                    <li>

                        @if($allCategory->subCategories->count()==0)
                            <a href="{{ route('front.categoryproducts.view',$allCategory->id) }}" class="CategoryId" data-id="{{ $allCategory->id }}" onclick="redirectUrl('{{ route("front.categoryproducts.view", $allCategory->id) }}')">
                                <img src="{{asset('frontend-assets/images/svg-icon/dashboard.svg')}}" class="img-fluid" alt="dashboard"><span>{{ $allCategory->name }}</span>
                            </a>
                        @else
                            <a href="{{ route("front.category.view", $allCategory->id) }}" class="CategoryId" data-id="{{ $allCategory->id }}" onclick="redirectUrl('{{ route("front.category.view", $allCategory->id) }}')">
                                <img src="{{asset('frontend-assets/images/svg-icon/dashboard.svg')}}" class="img-fluid" alt="dashboard"><span>{{ $allCategory->name }}</span> <i class="feather icon-chevron-right pull-right"></i>
                            </a>
                        @endif


                        <ul class="vertical-submenu" id="SubCatgoryId">

                            @foreach($allSubCategories as $allSubCategory)

                                @if($allCategory->id == $allSubCategory->category_id)

                                    <li class="" id="subcategoryListID">

                                        @if($allSubCategory->subSubCategories->count() == 0)

                                            <a href="{{ route('front.subCategoryproducts.view',$allSubCategory->id) }}" class="subCategoryId" data-id="{{ $allSubCategory->id }}" onclick="redirectUrl('{{ route("front.subCategoryproducts.view", $allSubCategory->id) }}')" >
                                                {{ $allSubCategory->name }}
                                            </a>

                                        @else

                                            <a href="{{ route('front.subcategory.view', $allSubCategory->id) }}" class="subCategoryId" data-id="{{ $allSubCategory->id }}" onclick="redirectUrl('{{ route("front.subcategory.view", $allSubCategory->id) }}')" >
                                                {{ $allSubCategory->name }} <i class="feather icon-chevron-right pull-right"></i>
                                            </a>

                                        @endif



                                        <ul class="vertical-submenu">
                                            @foreach($allSubSubCategories as $allSubSubCategory)
                                                @if($allSubCategory->id == $allSubSubCategory->subcategory_id )
                                                    <li>
                                                        <a href="{{ route('front.subsubproducts.view',$allSubSubCategory->id) }}">
                                                            {{ $allSubSubCategory->name  }}
                                                        </a>
                                                        @else

                                                        @endif
                                                    </li>
                                            @endforeach
                                        </ul>
                                        @else

                                        @endif

                                    </li>
                                    @endforeach
                        </ul>

                    </li>
                @endforeach


                @guest('customer')

                @else

                    @if(Auth::guard('customer')->user()->type == 2)
                        <li>
                            <a href="{{ route('front.wholesaleProducts.view') }}" class="CategoryId">
                                <img src="{{asset('frontend-assets/images/svg-icon/dashboard.svg')}}" class="img-fluid" alt="dashboard"><span>Special for Wholesaler</span>
                            </a>
                        </li>
                    @elseif(Auth::guard('customer')->user()->type == 3)
                        <li>
                            <a href="{{ route('front.corporateProducts.view') }}" class="CategoryId">
                                <img src="{{asset('frontend-assets/images/svg-icon/dashboard.svg')}}" class="img-fluid" alt="dashboard"><span>Special for Corporate</span>
                            </a>
                        </li>
                    @endif

                @endguest



            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>
<!-- End Leftbar -->






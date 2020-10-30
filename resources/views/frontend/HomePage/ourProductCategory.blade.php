<!-- Our Product Categories Start -->
<h4 class="mt-4 mb-5 text-center custom-h4-font-weight">{{ $sectionTitle->product_category }}</h4>
<!-- Our Product Categories End -->

<!-- Inside Menu Start -->
<div class="inside-menug">

    <div class="row">
        @foreach($AllCategories as $AllCategory)
             <div class="col-lg-4 col-md-6 col-sm-6 py-4 border border-light">
                 @if($AllCategory->subCategories->count() == 0)
                     <a href="{{ route('front.categoryproducts.view',$AllCategory->id) }}">{{ $AllCategory->name }}
                         <span class="float-right"><i class="fas fa-fish text-danger"></i></span>
                     </a>
                 @else
                     <a href="{{ route('front.category.view',$AllCategory->id) }}">{{ $AllCategory->name }}
                         <span class="float-right"><i class="fas fa-fish text-danger"></i></span>
                     </a>
                 @endif


             </div>
        @endforeach

        @foreach($AllSubCategories as $AllSubCategory)
            <div class="col-lg-4 col-md-6 col-sm-6 py-4 border border-light">

                @if($AllSubCategory->subSubCategories->count() == 0)

                    <a href="{{ route('front.subCategoryproducts.view', $AllSubCategory->id) }}">{{ $AllSubCategory->name }}
                        <span class="float-right"><i class="fas fa-fish text-danger"></i>
                    </span>
                    </a>

                @else

                    <a href="{{ route('front.subcategory.view', $AllSubCategory->id) }}">{{ $AllSubCategory->name }}
                        <span class="float-right"><i class="fas fa-fish text-danger"></i>
                    </span>
                    </a>

                @endif


            </div>
        @endforeach

        @foreach($AllSubSubCategories as $AllSubSubCategory)
            <div class="col-lg-4 col-md-6 col-sm-6 py-4 border border-light">
                <a href="{{ route('front.subsubproducts.view',$AllSubSubCategory->id) }}">{{ $AllSubSubCategory->name }}
                    <span class="float-right"><i class="fas fa-fish text-danger"></i></span>
                </a>
            </div>
        @endforeach
    </div>



</div>

<!-- Inside Menu End -->

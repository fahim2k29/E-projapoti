@extends('backend.layout.master')
@section('content')


    <div class="container">

        <h2 class="bg-primary" style="padding: 10px">Product Information</h2>

        <form  method="post" action="{{ route('product.update.confirm',$products->id) }}" enctype="multipart/form-data">
            @csrf
            @include('backend.layout.message')
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Product Name</label>
                    <input type="text" value="{{ $products->name }}" class="form-control" id="inputEmail4" name="product_name">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Product Title</label>
                    <input type="text" value="{{ $products->title }}" class="form-control" id="inputEmail4" name="product_title">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Product Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="product_description">{{ $products->description }}</textarea>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">MRP Price</label>
                    <input type="text" value="{{ $products->mrp_price }}" class="form-control" id="inputEmail4" name="mrp_price">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Wholesale Price</label>
                    <input type="text" value="{{ $products->business_price }}" class="form-control" id="inputEmail4" name="business_price">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Corporate Price</label>
                    <input type="text" value="{{ $products->corporate_price }}" class="form-control" id="inputEmail4" name="corporate_price">
                </div>



                <div class="form-group col-md-6">

                    <h4>Special Product</h4>

                    <div class="col-md-6">

                        <div class="checkbox" >
                            <label><input @if($products->wholesaleCheck ==1) checked @endif id="WholesaleCheckboxId" type="checkbox" value="1" name="wholesaleName">Wholesale</label>
                        </div>

                        <div class="checkbox" >
                            <label><input @if($products->corporateCheck ==1) checked @endif id="CorporateCheckboxId" type="checkbox" value="1" name="corporateName">Corporate</label>
                        </div>

                    </div>

                </div>


                <div id="wholesaleClickCheck" class="form-group col-md-6 hidden">
                    <label for="inputEmail4">Wholesale Minimum Quantity</label>
                    <input  value="{{ $products->minimumWholesale }}" type="number" class="form-control" id="inputEmail4" name="wholesale_minimum_price">
                </div>

                <div id="corporateClickCheck" class="form-group col-md-6 hidden">
                    <label for="inputEmail4">Corporate Minimum Quantity</label>
                    <input  value="{{ $products->minimumCorporate }}" type="number" class="form-control" id="inputEmail4" name="corporate_minimum_price">
                </div>








                <div class="form-group col-md-6">
                    <label for="inputEmail4">Discount (%)</label>
                    <input type="text" value="{{ $products->discount_price }}" class="form-control" id="inputEmail4" name="discount_price">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Has Offer</label>
                    <select class="form-control" id="inputEmail4" name="has_offer">
                        @if($products->has_offer == 1)
                            <option selected value="1">Yes</option>
                            <option value="0">No</option>
                        @else
                            <option  value="1">Yes</option>
                            <option selected value="0">No</option>
                        @endif

                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Product Code</label>
                    <input type="text" value="{{ $products->product_code }}" class="form-control" id="inputEmail4" name="product_code">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Quantity</label>
                    <input class="form-control" value="{{ $products->quantity }}" type="text" name="product_quantity">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Brand</label>
                    <select class="form-control" name="product_brand" id="">
                        @foreach($allbrands as $allbrand)
                            <option value="{{ $products->brand_id }}" @if($brands->pro_brand->name == $allbrand->name) selected @else @endif>
                                {{ $allbrand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Category</label>
                    <select class="form-control" name="product_category" id="">
                        @foreach($allcategories as $allcategory)
                        <option value="{{ $products->category_id }}" @if($categories->pro_category->name == $allcategory->name) selected @else @endif >
                            {{ $allcategory->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Sub Category</label>
                    <select class="form-control" name="product_subcategory" id="">
                        @foreach($allsubCategories as $allsubCategory)

                            <option value="{{ $products->subcategory_id }}" @if(optional($subcategories->pro_subCategory)->name == $allsubCategory->name) selected @else @endif >
                                {{ $allsubCategory->name }}
                            </option>

                        @endforeach
                    </select>
                </div>


                <div class="form-group col-md-6">
                    <label for="inputPassword4">Child Category</label>
                    <select class="form-control" name="product_subsubcategory" id="">
                        @foreach($allsubSubCategories as $allsubSubCategory)
                            <option value="{{ $products->subsubcategory_id }}" @if(optional($subsubcategories->pro_subSubCategory)->name == $allsubSubCategory->name) selected @else @endif >
                                {{ $allsubSubCategory->name }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group col-md-6">
                    <label for="inputPassword4">Status</label>
                    <select class="form-control" name="status" id="">
                        @if($products->status == 1)
                            <option selected value="1">Publish</option>
                            <option value="0">Unpublish</option>
                        @else
                            <option  value="1">Publish</option>
                            <option selected value="0">Unpublish</option>
                        @endif
                    </select>
                </div>

                @foreach($images as $image)

                <div class="form-group col-md-6">
                    <img src="{{ asset('images/'.$image->product_image) }}" alt="" style="width: 60px; height: 50px; margin-top: 10px">
                    <a href="{{ route('product.image.delete',$image->id) }}">Delete Image</a>

                </div>

                @endforeach


                <h4>Upload More Image</h4>


                <div class="form-group col-md-6">
                    <label for="inputPassword4">Image One</label>
                    <input  type="file" class="form-control" name="product_extra_image[]">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Image One</label>
                    <input  type="file" class="form-control" name="product_extra_image[]">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Image One</label>
                    <input  type="file" class="form-control" name="product_extra_image[]">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Image One</label>
                    <input  type="file" class="form-control" name="product_extra_image[]">
                </div>



            </div>

            <button type="submit" class="btn btn-success btn-block">Update</button>
        </form>

    </div>




@endsection

@extends('backend.layout.master')
@section('content')


    <div class="container">

        <h2 class="bg-primary" style="padding: 10px">Product Information</h2>

        <form  method="post" action="{{ route('product.insert') }}" enctype="multipart/form-data">
            @csrf
            @include('backend.layout.message')
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Product Name</label>
                    <input type="text" class="form-control" id="inputEmail4" name="product_name">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Product Title</label>
                    <input type="text" class="form-control" id="inputEmail4" name="product_title">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Product Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="product_description"></textarea>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">MRP Price</label>
                    <input type="text" class="form-control" id="inputEmail4" name="mrp_price">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Business Price</label>
                    <input type="text" class="form-control" id="inputEmail4" name="business_price">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Corporate Price</label>
                    <input type="text" class="form-control" id="inputEmail4" name="corporate_price">
                </div>

                <div class="form-group col-md-6">

                    <h4>Special Product</h4>

                    <div class="col-md-6">

                        <div class="checkbox" >
                            <label><input id="WholesaleCheckboxId" type="checkbox" value="1"  name="wholesaleName">Wholesale</label>
                        </div>

                        <div class="checkbox" >
                            <label><input id="CorporateCheckboxId" type="checkbox" value="2" name="corporateName">Corporate</label>
                        </div>

                    </div>

                </div>

                <div id="wholesaleClickCheck" class="form-group col-md-6 hidden">
                    <label for="inputEmail4">Wholesale Minimum Quantity</label>
                    <input type="number" class="form-control" id="inputEmail4" name="wholesale_minimum_price">
                </div>

                <div id="corporateClickCheck" class="form-group col-md-6 hidden">
                    <label for="inputEmail4">Corporate Minimum Quantity</label>
                    <input type="number" class="form-control" id="inputEmail4" name="corporate_minimum_price">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Discount (%)</label>
                    <input type="text" class="form-control" id="inputEmail4" name="discount_price">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Has Offer</label>
                    <select class="form-control" id="inputEmail4" name="has_offer">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Product Code</label>
                    <input type="text" class="form-control" id="inputEmail4" name="product_code">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Quantity</label>
                    <input class="form-control" type="text" name="product_quantity">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Brand</label>
                    <select class="form-control" name="product_brand" id="">
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>

                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Category</label>
                    <select class="form-control dynamicCategory" name="product_category" id="categoryDropdown" data-dependent="categoryDropdown">
                        <option selected="" disabled="">Select Category</option>
                        @foreach($categories as $category)

                            <option value="{{ $category->id }}">{{ $category->name.'-'.$category->id  }}</option>

                        @endforeach

                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Sub Category</label>
                    <select class="form-control dynamicSubCategory" name="product_subcategory" id="subCategoryDropdown" data-dependent="subCategoryDropdown">

                        <option selected="" disabled="">Select SubCategory</option>

                            <option value=""></option>

                    </select>
                </div>


                <div class="form-group col-md-6">
                    <label for="inputPassword4">Child Category</label>
                    <select class="form-control" name="product_subsubcategory" id="childCategoryDropdown">


                        <option selected="" disabled="">Select Child</option>
                        <option value=""></option>

                    </select>
                </div>


                <div class="form-group col-md-6">
                    <label for="inputPassword4">Status</label>
                    <select class="form-control" name="status" id="">
                        <option value="1">publish</option>
                        <option value="0">unpublish</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Image One</label>
                    <input  type="file" class="form-control" name="product_image[]">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Image Two</label>
                    <input  type="file" class="form-control" name="product_image[]">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Image Three</label>
                    <input  type="file" class="form-control" name="product_image[]">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Image Four</label>
                    <input  type="file" class="form-control" name="product_image[]">
                </div>

            </div>

            <button type="submit" class="btn btn-success btn-block">Save</button>
        </form>

    </div>




@endsection

<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use App\ProductImage;
use App\SubCategory;
use App\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;



class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $data['products'] = Product::with('pro_category')->get();
        return view('backend.pages.products.product',$data);
    }

    public function show()
    {
        $data['categories'] = Category::get();

//        $data['subCategories'] = SubCategory::get();
//
//        $data['subSubCategories'] = SubSubCategory::get();

        $data['brands'] = Brand::get();

        return view('backend.pages.products.productInsert',$data);
    }


    function categoryDependSub(Request $request)
    {
        $id =  $request->input('id');

        $data =   SubCategory::where('category_id','=',$id)->get();
        return $data;
    }

    function subCategoryDependSub(Request $request)
    {
        $id =  $request->input('id');

        $data =   SubSubCategory::where('subcategory_id','=',$id)->get();
        return $data;
    }


    public function insert(Request $request)
    {

        $request->validate([
            'product_name' => 'required',
            'product_title' => 'required',
            'product_description' => 'required',
            'mrp_price' => 'required',
            'business_price' => 'required',
            'corporate_price' => 'required',
            'wholesale_minimum_price' => 'nullable',
            'corporate_minimum_price' => 'nullable',
            'discount_price' => 'nullable',
            'has_offer' => 'nullable',
            'product_code' => 'required|unique:products',
            'product_quantity' => 'required',
            'product_brand' => 'required',
            'product_category' => 'required',
            'product_subcategory' => 'nullable',
            'product_subsubcategory' => 'nullable',
            'status' => 'required',
            'product_image_one' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_image_two' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_image_three' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_image_four' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $productObject = new Product();
        $productObject->name = $request->product_name;
        $productObject->title = $request->product_title;
        $productObject->description = $request->product_description;
        $productObject->mrp_price = $request->mrp_price;
        $productObject->business_price = $request->business_price;
        $productObject->corporate_price = $request->corporate_price;
        $productObject->wholesaleCheck = $request->wholesaleName;
        $productObject->corporateCheck = $request->corporateName;
        $productObject->minimumWholesale = $request->wholesale_minimum_price;
        $productObject->minimumCorporate = $request->corporate_minimum_price;
        $productObject->discount_price = $request->discount_price;
        $productObject->has_offer = $request->has_offer;
        $productObject->product_code = $request->product_code;
        $productObject->quantity = $request->product_quantity;

        $productObject->slug = $slug = Str::slug($productObject->name);

        $productObject->brand_id = $request->product_brand;
        $productObject->category_id = $request->product_category;
        $productObject->subcategory_id = $request->product_subcategory;
        $productObject->subsubcategory_id = $request->product_subsubcategory;
        $productObject->status = $request->status;

        $productObject->save();

        //Image Insert

        if ($request->file('product_image') == NULL){
            session()->flash('error','At-least One Product Image is Required!');
            return back();
        }
        else{
            $images = $request->file('product_image');
            foreach ($images as $image){
                $rand = rand();
                $imageName = $rand.'.'.$image->getClientOriginalExtension();
                $image->move(public_path("images/product/".date("Y").'/'.date('M')),$imageName);
                $imgPath = "product/".date("Y").'/'.date('M').'/' .$imageName;
                $product_image = new ProductImage;
                $product_image->product_id = $productObject->id;
                $product_image->product_image = $imgPath;
                $product_image->save();
            }
        }
        return redirect()->route('product')->with('success','Product Insert successfully!');

    }

    public function singleDetails(Request $request,$id)
    {
        $data['products'] = Product::find($id);
        $data['brands'] = Product::with('pro_brand')->find($id);
        $data['categories'] = Product::with('pro_category')->find($id);
        $data['subcategories'] = Product::with('pro_subCategory')->find($id);
        $data['subsubcategories'] = Product::with('pro_subSubCategory')->find($id);


        $data['allbrands'] = Brand::get();
        $data['allcategories'] = Category::get();
        $data['allsubCategories'] = SubCategory::get();
        $data['allsubSubCategories'] = SubSubCategory::get();


        $data['images'] = ProductImage::with('product')->where('product_id', $id)->get();


        return view('backend.pages.products.singleProductDetails',$data);
    }



    public function updateConfirm(Request $request,$id)
    {

        $request->validate([
            'product_name' => 'required',
            'product_title' => 'required',
            'product_description' => 'required',
            'mrp_price' => 'required',
            'business_price' => 'required',
            'corporate_price' => 'required',
            'wholesale_minimum_price' => 'nullable',
            'corporate_minimum_price' => 'nullable',

            'discount_price' => 'required',
            'has_offer' => 'required',
            'product_code' => 'required|unique:products,product_code,'.$request->id,
            'product_quantity' => 'required',
            'product_brand' => 'required',
            'product_category' => 'required',
            'product_subcategory' => 'nullable',
            'product_subsubcategory' => 'nullable',
            'status' => 'required',
            'product_image_one' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_image_two' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_image_three' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_image_four' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $productObject = Product::find($id);
        $productObject->name = $request->product_name;
        $productObject->title = $request->product_title;
        $productObject->description = $request->product_description;
        $productObject->mrp_price = $request->mrp_price;
        $productObject->business_price = $request->business_price;
        $productObject->corporate_price = $request->corporate_price;
        $productObject->discount_price = $request->discount_price;

        $productObject->wholesaleCheck = $request->wholesaleName;
        $productObject->corporateCheck = $request->corporateName;

        $productObject->minimumWholesale = $request->wholesale_minimum_price;
        $productObject->minimumCorporate = $request->corporate_minimum_price;

        $productObject->has_offer = $request->has_offer;
        $productObject->product_code = $request->product_code;
        $productObject->quantity = $request->product_quantity;

        $productObject->slug = $slug = Str::slug($productObject->name);

        $productObject->brand_id = $request->product_brand;
        $productObject->category_id = $request->product_category;
        $productObject->subcategory_id = $request->product_subcategory;
        $productObject->subsubcategory_id = $request->product_subsubcategory;
        $productObject->status = $request->status;

        $productObject->save();

        //Image Insert
       if ($request->file('product_extra_image')){
           $images = $request->file('product_extra_image');
           foreach ($images as $image){
               $rand = rand();
               $imageName = $rand.'.'.$image->getClientOriginalExtension();

               $image->move(public_path("images/product/".date("Y").'/'.date('M')),$imageName);

               $imgPath = "product/".date("Y").'/'.date('M').'/' .$imageName;


               $product_image = new ProductImage;

               $product_image->product_id = $productObject->id;
               $product_image->product_image = $imgPath;
               $product_image->save();
           }
       }

        return redirect()->route('product')->with('success','Product Update successfully!');

    }


    public function delete(Request $request, $id)
    {
        ProductImage::with('product_id',$id)->delete();
        $productObj = Product::find($id);
        $productObj->delete();
        return redirect()->route('product')->with('success','Product Delete successfully!');
    }


    public function imageDelete(Request $request, $id)
    {
        $singleImage = ProductImage::find($id);
        $singleImage->delete();
        return redirect()->route('product')->with('success','Product Image Delete successfully!');
    }

}

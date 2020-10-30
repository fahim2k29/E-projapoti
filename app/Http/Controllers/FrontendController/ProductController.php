<?php

namespace App\Http\Controllers\FrontendController;

use App\Category;
use App\SubCategory;
use App\Http\Controllers\Controller;
use App\Product;
use App\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function test()
    {
        return $allSubCategories = SubCategory::with('category','subSubCategories')->get();
    }

    public function subSubDetails(Request $request)
    {
        $id = $request->input('id');
        $subSubDetails = Product::with('pro_subSubCategory', 'images')->findOrFail($id);

        return $subSubDetails;
    }

    public function subSubProducts(Request $request, $id)
    {
        $subSubProducts = Product::with('pro_subSubCategory', 'images')->where('subsubcategory_id',$id)->get();
        $SubSubCategoryName =  SubSubCategory::find($id);
        return view('frontend.products.subSubProducts',['subSubProducts'=>$subSubProducts,'SubSubCategoryName'=>$SubSubCategoryName]);
    }


    public function categoryProducts(Request $request,$id)
    {
        $categoryProducts = Product::with('pro_category','images')->where('category_id','=',$id)->get();

//        if(Auth::guard('customer')->user()->type == 2){
//            $categoryProducts->whereIn('wholesaleCheck',[1, null]);
//        }
       $categoryName =  Category::find($id);
       return view('frontend.products.categoryProducts',['categoryProducts'=>$categoryProducts,'categoryName'=>$categoryName]);
    }

    public function subCategoryProducts(Request $request,$id)
    {
        $subCategoryProducts = Product::with('pro_subCategory','images')->where('subcategory_id','=',$id)->get();
       $SubCategoryName =  SubCategory::find($id);
       return view('frontend.products.subCategoryProduct',['subCategoryProducts'=>$subCategoryProducts,'SubCategoryName'=>$SubCategoryName]);
    }

    public function wholesaleProducts()
    {
       $wholesaleProducts = Product::where('wholesaleCheck','=',1)->get();
        return view('frontend.products.wholesaleProducts',['wholesaleProducts'=>$wholesaleProducts]);
    }

    public function corporateProducts()
    {
       $corporateProducts = Product::where('corporateCheck','=',2)->get();
        return view('frontend.products.corporateProducts',['corporateProducts'=>$corporateProducts]);
    }


}

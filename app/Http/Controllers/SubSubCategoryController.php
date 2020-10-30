<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use App\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubSubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $result = SubSubCategory::with('subCategory')->get();
        return view('backend.pages.subSubCategory',compact('result'));
    }

    public function show()
    {
        $category =  SubCategory::pluck('name','id');
        return view('backend.pages.subSubCategoryInsert',['category'=>$category]);
    }

    public function update(Request $request,$id)
    {
        $SingleSubCategory = SubSubCategory::find($id);
        $category =  SubCategory::pluck('name','id');
        return view('backend.pages.subSubCategoryUpdate',['SingleSubCategory'=>$SingleSubCategory,'category'=>$category]);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'sub_category_serial' => 'required|numeric',
            'sub_category_name' => 'required|unique:sub_sub_categories,name',
            'sub_category_icon' => 'required',
            'sub_category_status' => 'required'
        ]);


        $subCategoryObject = new SubSubCategory();
        $subCategoryObject->serial = $request->sub_category_serial;
        $subCategoryObject->name = $request->sub_category_name;
        $subCategoryObject->subcategory_id = $request->category_id;
        $subCategoryObject->icon = $request->sub_category_icon;
        $subCategoryObject->status = $request->sub_category_status;
        $subCategoryObject->feature_subsubcategory = $request->feature_subcategory;
        $subCategoryObject->slug = $slug = Str::slug($subCategoryObject->name);

        $subCategoryObject->save();

        return redirect()->route('subsubcategory')->with('success','Sub SubCategory Created successfully!');
    }


    public function updateConfirm(Request $request,$id)
    {
        $request->validate([
            'sub_category_serial' => 'required|numeric',
            'sub_category_name' => 'required|unique:sub_sub_categories,name,'.$request->id,
            'sub_category_icon' => 'required',
            'sub_category_status' => 'required'
        ]);
        $SubCategoryObject = SubSubCategory::find($id);
        $SubCategoryObject->serial = $request->sub_category_serial;
        $SubCategoryObject->name = $request->sub_category_name;
        $SubCategoryObject->subcategory_id = $request->category_id;
        $SubCategoryObject->icon = $request->sub_category_icon;
        $SubCategoryObject->status = $request->sub_category_status;
        $SubCategoryObject->feature_subsubcategory = $request->feature_subcategory;
        $SubCategoryObject->slug = $slug = Str::slug($SubCategoryObject->name);

        $SubCategoryObject->save();

        return redirect()->route('subsubcategory')->with('success','Sub SubCategory Update successfully!');
    }

    public function delete(Request $request,$id){
        $subCategoryObject = SubSubCategory::find($id);
        $subCategoryObject->delete();
        return redirect()->route('subsubcategory')->with('success','Sub SubCategory Delete successfully!');
    }

}

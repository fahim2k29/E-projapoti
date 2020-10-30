<?php

namespace App\Http\Controllers;

use App\SubCategory;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $result = SubCategory::with('category')->get();
        return view('backend.pages.subCategory',compact('result'));
    }

    public function show()
    {
       $category =  Category::pluck('name','id');
       return view('backend.pages.subCategoryInsert',['category'=>$category]);
    }

    public function update(Request $request,$id)
    {
        $SingleSubCategory = SubCategory::find($id);
        $category =  Category::pluck('name','id');
        return view('backend.pages.subCategoryUpdate',['SingleSubCategory'=>$SingleSubCategory,'category'=>$category]);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'sub_category_serial' => 'required|numeric',
            'sub_category_name' => 'required|unique:sub_categories,name',
            'sub_category_icon' => 'required',
            'sub_category_status' => 'required'
        ]);


        $subCategoryObject = new SubCategory;
        $subCategoryObject->serial = $request->sub_category_serial;
        $subCategoryObject->name = $request->sub_category_name;
        $subCategoryObject->category_id = $request->category_id;
        $subCategoryObject->icon = $request->sub_category_icon;
        $subCategoryObject->status = $request->sub_category_status;
        $subCategoryObject->feature_subcategory = $request->feature_subcategory;
        $subCategoryObject->slug = $slug = Str::slug($subCategoryObject->name);

        $subCategoryObject->save();

        return redirect()->route('subcategory')->with('success','SubCategory Created successfully!');
    }


    public function updateConfirm(Request $request,$id)
    {
        $request->validate([
            'sub_category_serial' => 'required|numeric',
            'sub_category_name' => 'required|unique:sub_categories,name,'.$request->id,
            'sub_category_icon' => 'required',
            'sub_category_status' => 'required'
        ]);
        $SubCategoryObject = SubCategory::find($id);
        $SubCategoryObject->serial = $request->sub_category_serial;
        $SubCategoryObject->name = $request->sub_category_name;
        $SubCategoryObject->category_id = $request->category_id;
        $SubCategoryObject->icon = $request->sub_category_icon;
        $SubCategoryObject->status = $request->sub_category_status;
        $SubCategoryObject->feature_subcategory = $request->feature_subcategory;
        $SubCategoryObject->slug = $slug = Str::slug($SubCategoryObject->name);

        $SubCategoryObject->save();

        return redirect()->route('subcategory')->with('success','SubCategory Update successfully!');
    }

    public function delete(Request $request,$id){

        try {
            $subCategoryObject = SubCategory::find($id);
            $subCategoryObject->delete();
        }catch (\Exception $e){
            if ($e->getCode()==23000)
            {
                return back()->with('error','Your Should Delete SubSubCategory First!');
            }
        }


        return redirect()->route('subcategory')->with('success','SubCategory Delete successfully!');
    }


}

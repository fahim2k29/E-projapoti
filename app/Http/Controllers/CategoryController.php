<?php

namespace App\Http\Controllers;

use App\Configuration;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;
use App\SubCategory;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $result = Category::all();
        return view('backend.pages.category',['CategoryData'=>$result]);
    }

    public function show()
   {
       return view('backend.pages.categoryInsert');
   }

    public function insert(Request $request)
    {
        $request->validate([
            'category_serial' => 'required|numeric',
            'category_name' => 'required|unique:categories,name',
            'category_icon' => 'required',
            'category_status' => 'required'
        ]);

        $categoryObject = new Category;
        $categoryObject->serial = $request->category_serial;
        $categoryObject->name = $request->category_name;
        $categoryObject->icon = $request->category_icon;
        $categoryObject->status = $request->category_status;
        $categoryObject->feature_category = $request->feature_category;
        $categoryObject->slug = $slug = Str::slug($categoryObject->name);

        $categoryObject->save();

        return redirect()->route('category')->with('success','Category Created successfully!');
    }



   public function update(Request $request,$id)
   {
       $SingleCategory = Category::find($id);
       return view('backend.pages.categoryUpdate',compact('SingleCategory'));
   }

   public function updateConfirm(Request $request,$id)
   {
       $request->validate([
           'category_serial' => 'required|numeric',
           'category_name' => 'required|unique:categories,name,'.$request->id,
           'category_icon' => 'required',
           'category_status' => 'required'
       ]);
       $categoryObject = Category::find($id);
       $categoryObject->serial = $request->category_serial;
       $categoryObject->name = $request->category_name;
       $categoryObject->icon = $request->category_icon;
       $categoryObject->status = $request->category_status;
       $categoryObject->feature_category = $request->feature_category;
       $categoryObject->slug = $slug = Str::slug($categoryObject->name);

       $categoryObject->save();

       return redirect()->route('category')->with('success','Category Update successfully!');
   }

   public function delete(Request $request,$id){
       try {
           $categoryObject = Category::find($id);
           $categoryObject->delete();
       }catch (\Exception $e){

           if ($e->getCode()==23000)
           {
              return  back()->with('error','Your Should Delete SubCategory First!');
           }

       }


       return redirect()->route('category')->with('error','Category Delete successfully!');
   }

}

<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use App\SubSubCategory;
use App\TopTwoOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TopTwoOfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function topTwoOffer()
    {
        $topTwoOfferData =  TopTwoOffer::all();
        return view('backend.pages.topTwoOffer',['topTwoOfferData'=>$topTwoOfferData]);
    }

    public function show()
    {
        $categories =Category::all();
        $subCategories =SubCategory::all();
        $subsubCategories = SubSubCategory::all();
        return view('backend.pages.topTwoOfferInsert',[
            'categories'=>$categories,
            'subCategories'=>$subCategories,
            'subsubCategories'=>$subsubCategories
        ]);
    }


    public function insert(Request $request)
    {
        $request->validate([
            'topOffer_name' => 'required',
            'topOffer_image' => 'required',
            'offer_link' => 'required|url'
        ]);

        $topOffer = new TopTwoOffer();
        $topOffer->offerName = $request->topOffer_name;
        $topOffer->offer_link = $request->offer_link;

        $topOffer->slug = Str::of($topOffer->topOffer_name)->slug('-');


        if($request->file('topOffer_image')){
            $images = $request->file('topOffer_image');
            foreach ($images as $image){
                $rand = rand();
                $imageName = $rand.'.'.$image->getClientOriginalExtension();
                $image->move(public_path("images/offer/".date("Y").'/'.date('M').'/'.date('D')),$imageName);
                $imgPath = "offer/".date("Y").'/'.date('M').'/'.date('D').'/'.$imageName;
                $topOffer->image = $imgPath;
            }
        }

        $topOffer->save();
        return redirect()->route('topTwoOffer')->with('success','Top Two Offer Created successfully!');

    }

//    public function update(Request $request,$id)
//    {
//        $categories =Category::all();
//        $subCategories =SubCategory::all();
//
//        $subsubCategories = SubSubCategory::all();
//        $topOffer = TopTwoOffer::find($id);
//        return view('backend.pages.topTwoOfferUpdate',[
//            'topOffer'=>$topOffer,
//            'categories'=>$categories,
//            'subCategories'=>$subCategories,
//            'subsubCategories'=>$subsubCategories
//        ]);
//    }
//
//    public function updateConfirm (Request $request,$id)
//    {
//        $request->validate([
//            'topOffer_name' => 'required',
//            'topOffer_image' => 'required',
//            'topOffer_category' => 'required'
//        ]);
//
//
//
//        $topOfferName = $request->topOffer_name;
//        $topOfferCategory = $request->topOffer_category;
//
//        $topOfferslug = Str::of($topOfferName)->slug('-');
//
//
//        if($request->file('topOffer_image')){
//            $images = $request->file('topOffer_image');
//            foreach ($images as $image){
//                $rand = rand();
//                $imageName = $rand.'.'.$image->getClientOriginalExtension();
//                $image->move(public_path("images/offer/".date("Y").'/'.date('M').'/'.date('D')),$imageName);
//                $imgPath = "offer/".date("Y").'/'.date('M').'/'.date('D').'/'.$imageName;
//
//            }
//        }
//
//
//
//
//        $result = TopTwoOffer::where('id','=',$id)->update([
//            'offerName'=>$topOfferName,
//            'image'=>$images,
//            'offerCategory'=>$topOfferCategory,
//            'slug'=>$topOfferslug
//        ]);
//
//
//        return redirect()->route('topTwoOffer');
//    }

    public function delete(Request $request,$id){

        $Object = TopTwoOffer::find($id);
        $Object->delete();


        return redirect()->route('topTwoOffer')->with('success','Top Two Offer Delete successfully!');
    }
}

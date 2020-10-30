<?php

namespace App\Http\Controllers\FrontendController;

use App\Category;
use App\Configuration;
use App\ContactUs;
use App\FooterQuick;
use App\FooterQuickThree;
use App\FooterQuickTwo;
use App\FooterSectionMenu;
use App\HomeSectionTitle;
use App\Http\Controllers\Controller;
use App\QuickFooter;
use App\SubCategory;
use App\SubSubCategory;
use App\ClientComment;
use App\Product;
use App\HowToOrder;
use App\TopTwoOffer;
use App\WhyPeopleLove;

use App\TopBackground;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function homeIndex()
    {

        $data['AllCategories'] = Category::with('subCategories')->where('feature_category','=',1)->orderBy('id','desc')->limit(4)->get();
        $data['AllSubCategories'] = SubCategory::with('subSubCategories')->where('feature_subcategory','=',1)->orderBy('id','desc')->limit(4)->get();
        $data['AllSubSubCategories'] = SubSubCategory::where('feature_subsubcategory','=',1)->orderBy('id','desc')->limit(4)->get();
        $data['clientComments'] = ClientComment::all();

        $data['Configurations'] = Configuration::first();
        $data['TopBackground'] = TopBackground::first();

        $data['offers'] = Product::with('images')->get();

        $data['howToOrders'] = HowToOrder::all();

        $data['whyPeopleLoves'] = WhyPeopleLove::all();

        $data['rightContentImg'] = TopTwoOffer::limit(2)->get();

        $data['sectionTitle'] = HomeSectionTitle::first();

        $data['configuration'] =  Configuration::first();

        $data['footerMenu'] = FooterSectionMenu::first();

        $data['quickFooters'] = QuickFooter::all();

        return view('frontend.HomePage.homePage',$data);
    }

    public function categoryView(Request $request,$id)
    {

         $singleSubCategory = SubCategory::with('category','subSubCategories')->where('category_id','=',$id)->get();
         $categoryName = Category::find($id);
         return view('frontend.pages.subCategoryView',['singleSubCategory'=>$singleSubCategory,'categoryName'=>$categoryName]);

//        $singleSubCategory = SubCategory::with('category')->find($id);
//        return view('frontend.pages.subCategoryView',['singleSubCategory'=>$singleSubCategory]);

    }

    public function subCategoryView(Request $request,$id)
    {
         $singleSubSubCategory = SubSubCategory::with('subCategory')->where('subcategory_id','=',$id)->get();
         $SubCategoryName = SubCategory::find($id);
         return view('frontend.pages.subSubCategoryView',['singleSubSubCategory'=>$singleSubSubCategory,'SubCategoryName'=>$SubCategoryName]);
    }

    public function contactUs()
    {
        $Configuration = Configuration::first();
        return view('frontend.footer.contactUs',['Configuration'=>$Configuration]);
    }

    public function contactUsMsg(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|max:11',
            'message' => 'required|max:255'
        ]);

        $obj = new ContactUs();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->phone = $request->phone;
        $obj->message = $request->message;

        $obj->save();

        return redirect()->route('contactUs')->with('success','Contact Us Message Insert Successfully!');
    }

    public function frontView(Request $request,$id)
    {
        $result =  QuickFooter::find($id);
        return view('frontend.footer.quickFooter',['result'=>$result]);
    }





}

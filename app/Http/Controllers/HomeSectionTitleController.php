<?php

namespace App\Http\Controllers;

use App\ContactUs;
use App\Fqa;
use App\HomeSectionTitle;
use Illuminate\Http\Request;

class HomeSectionTitleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sectionTitle()
    {
        $result = HomeSectionTitle::all();
        return view('backend.pages.homeSectionTitles',['result'=>$result]);
    }

    public function sectionTitleUpdate(Request $request,$id)
    {
        $request->validate([
            'product_category' => 'nullable',
            'how_to_order' => 'nullable',
            'special_offer' => 'nullable',
            'why_love_us' => 'nullable',
            'what_clients_say' => 'nullable',
            'be_a_family' => 'nullable'
        ]);


        $product_category = $request->input('product_category');
        $how_to_order = $request->input('how_to_order');
        $special_offer = $request->input('special_offer');
        $why_love_us = $request->input('why_love_us');
        $what_clients_say = $request->input('what_clients_say');
        $be_a_family = $request->input('be_a_family');

        $result = HomeSectionTitle::where('id','=',$id)->update([
            'product_category'=>$product_category,
            'how_to_order'=>$how_to_order,
            'special_offer'=>$special_offer,
            'why_love_us'=>$why_love_us,
            'what_clients_say'=>$what_clients_say,
            'be_a_family'=>$be_a_family
        ]);

        return redirect()->route('sectiontitle')->with('success','Section Title Update successfully!');

    }

    public function contactUs()
    {
        $ContactUs =  ContactUs::all();
       return view('backend.pages.footer.contactUs',['ContactUs'=>$ContactUs]);
    }

    public function contactUsDelete(Request $request,$id)
    {
        $contactus =  ContactUs::find($id);
        $contactus->delete();

        return redirect()->back()->with('success','Contact Us Delete successfully!');

    }

    public function fqa()
    {
        $fqas = Fqa::all();
        return view('backend.pages.footer.fqa',['fqas'=>$fqas]);
    }

    public function fqaShow()
    {
        return view('backend.pages.footer.fqaInsert');
    }

    public function fqaInsert(Request $request)
    {
        $fqa = new Fqa();
        $fqa->question = $request->question;
        $fqa->answer = $request->answer;

        $fqa->save();

        return redirect()->route('backend.fqa')->with('success','FQA Created successfully!');
    }

    public function update(Request $request,$id)
    {
        $fqas = Fqa::find($id);
        return view('backend.pages.footer.fqaUpdate',['fqas'=>$fqas]);
    }

    public function updateConfirm (Request $request,$id)
    {
        $fqa = Fqa::find($id);
        $fqa->question = $request->question;
        $fqa->answer = $request->answer;

        $fqa->save();

        return redirect()->route('backend.fqa')->with('success','FQA Update successfully!');
    }

    public function delete(Request $request,$id){

        $fqaObject = Fqa::find($id);
        $fqaObject->delete();


        return redirect()->route('backend.fqa')->with('success','FQA Delete successfully!');
    }

}

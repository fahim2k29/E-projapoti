<?php

namespace App\Http\Controllers\Footer;

use App\FooterQuick;
use App\FooterQuickThree;
use App\FooterQuickTwo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FooterQuickController extends Controller
{



    public function footerQuick()
    {
        $FooterQuicks = FooterQuick::all();

        return view('backend.pages.footer.footerQuick',['FooterQuicks'=>$FooterQuicks]);
    }

    public function footerQuickShow(Request $request)
    {
        return view('backend.pages.footer.footerQuickInsert');
    }

    public function footerQuickInsert(Request $request)
    {

        $request->validate([
            'menu_name' => 'required',
            'description' => 'required'
        ]);

        $quick = new FooterQuick();
        $quick->menu = $request->menu_name;
        $quick->description = $request->description;
        $quick->save();
        return redirect()->route('footerQuick')->with('success','Quick Page Insert Successfully!');
    }

    public function footerQuickUpdate(Request $request,$id)
    {
        $FooterQuick = FooterQuick::find($id);
        return view('backend.pages.footer.footerQuickUpdate',['FooterQuick'=>$FooterQuick]);
    }

    public function footerQuickUpdateConfrim (Request $request,$id)
    {
        $request->validate([
            'menu_name' => 'required',
            'description' => 'required'
        ]);

        $FooterQuick = FooterQuick::find($id);
        $FooterQuick->menu = $request->menu_name;
        $FooterQuick->description = $request->description;

        $FooterQuick->save();

        return redirect()->route('footerQuick')->with('success','Quick Page Update Successfully!');
    }

    public function delete(Request $request,$id){

        $FooterQuick = FooterQuick::find($id);
        $FooterQuick->delete();


        return redirect()->route('footerQuick')->with('success','Quick Page Delete Successfully!');
    }


    //section two


    public function footerQuickTwo()
    {
        $FooterQuicks = FooterQuickTwo::all();

        return view('backend.pages.footer.footerQuickTwo',['FooterQuicks'=>$FooterQuicks]);
    }

    public function footerQuickShowTwo(Request $request)
    {

        return view('backend.pages.footer.footerQuickInsertTwo');
    }

    public function footerQuickInsertTwo(Request $request)
    {
        $request->validate([
            'menu_name' => 'required',
            'description' => 'required'
        ]);

        $quick = new FooterQuickTwo();
        $quick->menu = $request->menu_name;
        $quick->description = $request->description;

        $quick->save();

        return redirect()->route('footerQuickTwo')->with('success','Quick Page Insert Successfully!');
    }

    public function footerQuickUpdateTwo(Request $request,$id)
    {
        $FooterQuick = FooterQuickTwo::find($id);
        return view('backend.pages.footer.footerQuickUpdateTwo',['FooterQuick'=>$FooterQuick]);
    }

    public function footerQuickUpdateConfrimTwo (Request $request,$id)
    {
        $FooterQuick = FooterQuickTwo::find($id);
        $FooterQuick->menu = $request->menu_name;
        $FooterQuick->description = $request->description;

        $FooterQuick->save();

        return redirect()->route('footerQuickTwo')->with('success','Quick Page Update Successfully!');
    }

    public function deleteTwo(Request $request,$id){

        $FooterQuick = FooterQuickTwo::find($id);
        $FooterQuick->delete();


        return redirect()->route('footerQuickTwo')->with('success','Quick Page Delete Successfully!');
    }

    //section three


    public function footerQuickThree()
    {
        $FooterQuicks = FooterQuickThree::all();

        return view('backend.pages.footer.footerQuickThree',['FooterQuicks'=>$FooterQuicks]);
    }

    public function footerQuickShowThree(Request $request)
    {

        return view('backend.pages.footer.footerQuickInsertThree');
    }

    public function footerQuickInsertThree(Request $request)
    {
        $request->validate([
            'menu_name' => 'required',
            'description' => 'required'
        ]);

        $quick = new FooterQuickThree();
        $quick->menu = $request->menu_name;
        $quick->description = $request->description;

        $quick->save();

        return redirect()->route('footerQuickThree')->with('success','Quick Page Insert Successfully!');
    }

    public function footerQuickUpdateThree(Request $request,$id)
    {
        $FooterQuick = FooterQuickThree::find($id);
        return view('backend.pages.footer.footerQuickUpdateThree',['FooterQuick'=>$FooterQuick]);
    }

    public function footerQuickUpdateConfrimThree (Request $request,$id)
    {
        $FooterQuick = FooterQuickThree::find($id);
        $FooterQuick->menu = $request->menu_name;
        $FooterQuick->description = $request->description;

        $FooterQuick->save();

        return redirect()->route('footerQuickThree')->with('success','Quick Page Update Successfully!');
    }

    public function deleteThree(Request $request,$id){

        $FooterQuick = FooterQuickThree::find($id);
        $FooterQuick->delete();


        return redirect()->route('footerQuickThree')->with('success','Quick Page Delete Successfully!');
    }

    public function quickPageOne(Request $request,$id)
    {
       $result =  FooterQuick::find($id);
       return view('frontend.footer.quickPageOne',['result'=>$result]);
    }

    public function quickPageTwo(Request $request,$id)
    {
       $result =  FooterQuickTwo::find($id);
       return view('frontend.footer.quickPageTwo',['result'=>$result]);
    }

    public function quickPageThree(Request $request,$id)
    {
       $result =  FooterQuickThree::find($id);
       return view('frontend.footer.quickPageThree',['result'=>$result]);
    }

}

<?php

namespace App\Http\Controllers;

use App\QuickFooter;
use Illuminate\Http\Request;

class QuickFooterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $QuickFooter = QuickFooter::all();

        return view('backend.pages.footer.quickFooter',['QuickFooter'=>$QuickFooter]);
    }

    public function quickFooterShow(Request $request)
    {
        return view('backend.pages.footer.quickFooterInsert');
    }

    public function quickFooterInsert(Request $request)
    {

        $request->validate([
            'title'   => 'required',
            'menu'   => 'required',
            'section'   => 'required',
            'description' => 'required'
        ]);

        $quick = new QuickFooter();
        $quick->title         = $request->title;
        $quick->menu          = $request->menu;
        $quick->section       = $request->section;
        $quick->status        = $request->status;
        $quick->description   = $request->description;

        $quick->save();
        return redirect()->route('quickFooter')->with('success','Quick Page Insert Successfully!');
    }

    public function quickFooterUpdate(Request $request,$id)
    {
        $quickFooters = QuickFooter::find($id);
        return view('backend.pages.footer.quickFooterUpdate',['quickFooters'=>$quickFooters]);
    }

    public function quickFooterUpdateConfrim (Request $request,$id)
    {
        $request->validate([
            'title'   => 'required',
            'menu'   => 'required',
            'section'   => 'required',
            'description' => 'required'
        ]);

        $quick = QuickFooter::find($id);
        $quick->title         = $request->title;
        $quick->menu          = $request->menu;
        $quick->section       = $request->section;
        $quick->status        = $request->status;
        $quick->description   = $request->description;

        $quick->save();

        return redirect()->route('quickFooter')->with('success','Quick Page Update Successfully!');
    }

    public function quickFooterDelete(Request $request,$id){

        $FooterQuick = QuickFooter::find($id);
        $FooterQuick->delete();


        return redirect()->route('quickFooter')->with('success','Quick Page Delete Successfully!');
    }



}

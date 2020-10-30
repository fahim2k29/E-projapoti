<?php

namespace App\Http\Controllers\Footer;

use App\FooterSectionMenu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FooterMenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function footerMenu()
    {
        $result = FooterSectionMenu::all();
        return view('backend.pages.footer.footerMenu',['result'=>$result]);
    }

    public function footerMenuUpdate(Request $request,$id)
    {
        $request->validate([
            'title_one' => 'nullable',
            'title_two' => 'nullable',
            'title_three' => 'nullable'
        ]);


        $title_one = $request->input('title_one');
        $title_two = $request->input('title_two');
        $title_three = $request->input('title_three');


        $result = FooterSectionMenu::where('id','=',$id)->update([
            'title_one'=>$title_one,
            'title_two'=>$title_two,
            'title_three'=>$title_three
        ]);

        return redirect()->route('footermenu')->with('success','Footer Menu Update Successfully!');

    }
}

<?php

namespace App\Http\Controllers;

use App\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function seoView()
    {
        $result = Seo::all();
        return view('backend.pages.seo.seo',['result'=>$result]);
    }

    public function seoUpdate(Request $request,$id)
    {
        $request->validate([
            'seo_description' => 'nullable',
            'seo_keyword' => 'nullable',
            'seo_author' => 'nullable'
        ]);


        $seo_description = $request->input('seo_description');
        $seo_keyword = $request->input('seo_keyword');
        $seo_author = $request->input('seo_author');

        $result = Seo::where('id','=',$id)->update([
            'web_description'=>$seo_description,
            'web_keyword'=>$seo_keyword,
            'author'=>$seo_author
        ]);

        return redirect()->route('seo')->with('success','Update successfully!');

    }


}

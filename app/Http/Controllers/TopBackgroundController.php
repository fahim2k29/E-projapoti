<?php

namespace App\Http\Controllers;

use App\TopBackground;
use Illuminate\Http\Request;

class TopBackgroundController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function topbackground()
    {
        $result =  TopBackground::all();
        return view('backend.pages.TopBackground',['result'=>$result]);
    }

    public function topbackgrounUpdate(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'topBackgroud_name' => 'required',
            'topBackgroud_logo' => 'required|image|mimes:jpeg,webp,png,jpg,gif,svg|max:2048',
        ]);

        $id = $request->input('id');
        $topBackgroud_name = $request->input('topBackgroud_name');

        $topBackgroud_logo = time().'.'.$request->topBackgroud_logo->extension();

        $request->topBackgroud_logo->move(public_path('images'), $topBackgroud_logo);

        $topBackgroud_name = $request->input('topBackgroud_name');



         TopBackground::where('id','=',$id)->update([
            'text'=>$topBackgroud_name,
            'image'=>$topBackgroud_logo
        ]);

        return redirect()->route('topbackground')->with('success','Top Backgroud Update successfully!');

    }



}

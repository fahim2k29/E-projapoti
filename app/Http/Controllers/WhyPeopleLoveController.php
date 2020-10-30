<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WhyPeopleLove;

class WhyPeopleLoveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $whyPeopleLoves = WhyPeopleLove::all();
        return view('backend.pages.whyPeopleLove',compact('whyPeopleLoves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.whyPeopleLoveInsert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required',
            'status' => 'required'
        ]);

        $whyPeopleLove = new WhyPeopleLove;
        $whyPeopleLove->status = $request->status;
             if($request->file('image')){
                 $images = $request->file('image');
                 foreach ($images as $image){
                     $rand = rand();
                     $imageName = $rand.'.'.$image->getClientOriginalExtension();
                     $image->move(public_path("images/whyPeopleLove/".date("Y").'/'.date('M').'/'.date('D')),$imageName);
                     $imgPath = "whyPeopleLove/".date("Y").'/'.date('M').'/'.date('D').'/'.$imageName;
                     $whyPeopleLove->image = $imgPath;
                 }
             }

         $whyPeopleLove->save();
         return redirect()->route('whyPeopleLove')->with('success','Why People Love Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,$id)
   {
       $whyPeopleLoves = WhyPeopleLove::find($id);
       return view('backend.pages.whyPeopleLoveUpdate',compact('whyPeopleLoves'));
   }

    public function updateConfirm(Request $request, $id)
    {
        $request->validate([
            'image' => 'required',
            'status' => 'required'
        ]);

        $whyPeopleLoves = WhyPeopleLove::find($id);
        $whyPeopleLoves->status =  $request->get('status');

        if ($request->file('image')){
            $images = $request->file('image');
            foreach ($images as $image){
                $rand = rand();
                $imageName = $rand.'.'.$image->getClientOriginalExtension();
                $image->move(public_path("images/whyPeopleLove/".date("Y").'/'.date('M').'/'.date('D')),$imageName);
                $imgPath = "whyPeopleLove/".date("Y").'/'.date('M').'/'.date('D').'/'.$imageName;
                $whyPeopleLoves->image = $imgPath;
            }
        }

        $whyPeopleLoves->save();

        return redirect()->route('whyPeopleLove')->with('success','Why People Love Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $delete = WhyPeopleLove::find($id);
        $delete->delete();
        return back()->with('success','Why People Love Delete successfully!');
    }
}


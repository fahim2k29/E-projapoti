<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HowToOrder;

class HowToOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = HowToOrder::all();
        return view('backend.pages.howToOrder', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.howToOrderInsert');
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
           'image' => 'required',
           'section' => 'required|unique:how_to_orders'
        ]);

       $howToorder = new HowToOrder;
       $howToorder->section = $request->section;
            if($request->file('image')){
                $images = $request->file('image');
                foreach ($images as $image){
                    $rand = rand();
                    $imageName = $rand.'.'.$image->getClientOriginalExtension();
                    $image->move(public_path("images/HowToOrder/".date("Y").'/'.date('M').'/'.date('D')),$imageName);
                    $imgPath = "HowToOrder/".date("Y").'/'.date('M').'/'.date('D').'/'.$imageName;
                    $howToorder->image = $imgPath;
                }
            }

        $howToorder->save();
        return redirect()->route('howToOrder')->with('success','How To Order Created successfully!');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $howToOrder = HowToOrder::find($id);
        $howToOrder->delete();
        return back()->with('success','How To Order Delete successfully!');

    }
}

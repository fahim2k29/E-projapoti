<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function area()
    {
        $areas = Area::all();
        return view('backend.pages.area.area',['areas'=>$areas]);
    }

    public function areaShow()
    {
        return view('backend.pages.area.areaInsert');
    }

    public function areaInsert(Request $request)
    {
        $request->validate([
            'area_name'=>'required|unique:areas'
        ]);

        $area = new Area();
        $area->area_name = $request->area_name;
        $area->save();
        return redirect()->route('backend.area')->with('success','Area Insert successfully!');
    }

    public function update(Request $request,$id)
    {
        $areas = Area::find($id);
        return view('backend.pages.area.areaUpdate',['areas'=>$areas]);
    }

    public function updateConfirm (Request $request,$id)
    {
        $request->validate([
            'area_name'=>'required|unique:areas,area_name,'.$request->id,
        ]);
        $area = Area::find($id);
        
        $area->area_name = $request->area_name;

        $area->save();

        return redirect()->route('backend.area')->with('success','Area Update successfully!');
    }

    public function delete(Request $request,$id){

        $area = Area::find($id);
        $area->delete();

        return redirect()->route('backend.area')->with('success','Area Delete successfully!');
    }
}

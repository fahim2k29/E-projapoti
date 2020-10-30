<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function index(){
        $coupons = Coupon::all();
        return view('backend.pages.coupon',compact('coupons'));
    }

    public function create(){
        return view('backend.pages.couponInsert');
    }


    public function store(Request $request){
        $request->validate([
            'coupon_code'=>'required|unique:coupons',
            'discount_percentage' =>'required|max:2',
            'expire_date'=>'required'
        ]);

        if($request->expire_date >= Carbon::now())
        {
            $coupons = new Coupon;
            $coupons->coupon_code = $request->coupon_code;
            $coupons->discount_percentage = $request->discount_percentage;
            $coupons->expire_date = $request->expire_date;
            $coupons->save();
            return redirect()->route('coupon')->with('success','Coupon Created successfully!');
        }
        else {
            return back()->with('error','Date is not Correct!');
        }
    }


    public function delete(Request $request, $id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        return back()->with('success','Coupon Deleted successfully!');
    }

    public function couponName(Request $request)
    {

    }
}

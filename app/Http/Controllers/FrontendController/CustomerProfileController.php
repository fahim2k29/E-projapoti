<?php

namespace App\Http\Controllers\FrontendController;

use App\Area;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use App\Order;
use App\OrderHistory;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class CustomerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $result = Area::all();
        return view('customer.profile',['result'=>$result]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:customers,email,'.$request->id,
            'phone' => 'required|unique:customers,phone,'.$request->id,
            'area' => 'required',
            'address' => 'required',
        ]);

        Customer::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'area' => $request->area,
            'address' => $request->address,
        ]);

       return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword()
    {
        return view('customer.changePassword');

    }

    public function changePassword_store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword()],
            'new_password' => ['required|min:6'],
            'confirm_new_password' => ['same:new_password'],
        ]);

        Customer::find(auth()->guard('customer')->user()->id)->update(['password' => Hash::make($request->new_password)]);
        return redirect()
            ->back()
            ->with('success', 'Your Password Changed successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function customerOrders()
    {
        $orders = Order::with('customers')->where('user_id', Auth::guard('customer')->user()->id)->get();

        return view('customer.orders',compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function orderDetails($order_id)
    {
       $order_details =  OrderHistory::where('order_id',$order_id)->get();
       return view('customer.orderDetails',compact('order_details'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

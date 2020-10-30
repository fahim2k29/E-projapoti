<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('customers','billinginfo')->get();
        return view('backend.pages.order',compact('orders'));
    }
    public function orderShipping()
    {
        $orders = Order::with('customers','billinginfo')->get();
        return view('backend.pages.orderShipping',compact('orders'));
    }
    public function deliveredOrder()
    {
        $orders = Order::with('customers','billinginfo')->get();
        return view('backend.pages.deliveredOrder',compact('orders'));
    }
    public function cancelOrder()
    {
        $orders = Order::with('customers','billinginfo')->get();
        return view('backend.pages.cancelOrder',compact('orders'));
    }

    public function orderDetails(Request $request,$id)
    {
          $orders = Order::with('customers','orderhistory','billinginfo')->where('id','=',$id)->get();
        return view('backend.pages.orderDetails',compact('orders'));
    }

    public function orderStatus(Request $request,$id)
    {
        $order =  Order::where('id','=',$id)->first();
        return view('backend.pages.orderStatus',['order'=>$order]);
    }

    public function orderUpdate(Request $request,$id)
    {

       Order::where('id',$id)->update([
            'delivery_status'=>$request->orderStatus
        ]);

       return redirect('/home/order')->with('success','Order Update successfully!');

    }

    public function orderDelete(Request $request,$id)
    {
       $data =  Order::find($id);
       $data->delete();

       return back()->with('success','Order Delete successfully!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}

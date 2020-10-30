<?php

namespace App\Http\Controllers\FrontendController;
use App\Cart;
use Carbon\Carbon;
use App\Product;
use App\Coupon;
use App\Customer;
use App\ProductImage;
use App\BillingInfo;
use App\Order;
use App\Http\Controllers\Controller;
use App\OrderHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addtocart(Request $request, $product_id)
    {

        $ip_address = $_SERVER['REMOTE_ADDR'];
        if (Cart::where('customer_ip', $ip_address)->where('product_id', $product_id)->exists()) {
            Cart::where('customer_ip', $ip_address)->where('product_id', $product_id)->increment('product_quantity', 1);
        }
        else {
            Cart::insert([
                'customer_ip' => $ip_address,
                // session()->put('item_price',$price),
                'product_id' => $product_id,
                'created_at' => Carbon::now(+6),
            ]);
        }
        return back()->with('success','Product Add To Cart Successfully!');
    }


    public function cart($coupon_name = "")
    {
        if($coupon_name != ""){
            if(Coupon::where('coupon_code',$coupon_name)->exists()){
                if(Carbon::now(+6)->format('Y-m-d') <= Coupon::where('coupon_code',$coupon_name)->first()->expire_date){
                    $coupon_percentage = Coupon::where('coupon_code',$coupon_name)->first()->discount_percentage;
                    $cartItems = Cart::where('customer_ip', $_SERVER["REMOTE_ADDR"])->get();
                    return view('frontend.cart.index', compact('cartItems','coupon_percentage','coupon_name'));
                }
                else{
                    return back()->withErrors("Your Coupon Is date over");
                }
            }
            else{
                return back()->withErrors("Your Coupon is Invalid");
            }
        }
        else{
            $coupon_percentage = 0;
            $cartItems = Cart::where('customer_ip', $_SERVER["REMOTE_ADDR"])->get();
            return view('frontend.cart.index', compact('cartItems','coupon_percentage','coupon_name'));
        }

    }


    public function updateQuantity(Request $request)
    {

        $pId = $request->p_id;
        $qty = $request->qty;

        $actual_p_qtn = Product::where('id','=',$pId)->pluck('quantity')->toArray();
        $actual_p_qtn = implode(":", $actual_p_qtn);
        if($actual_p_qtn > $qty){
            Cart::where('customer_ip', $_SERVER['REMOTE_ADDR'])->where('product_id', $pId)->update([
                'product_quantity' => $qty
            ]);

            return redirect()->back()->with('success','Quantity Update Successfully!');
        }
        else{
            return back()->with('error','Out of Stock');
        }

    }


    public function deletefromcart($cart_id)
    {
        Cart::find($cart_id)->delete();
        return back()->with('success','Delete Successfully!');
    }


    public function deletefromcartall()
    {
        $cart = Cart::where('customer_ip', $_SERVER["REMOTE_ADDR"]);
        $cart->delete();
        return back()->with('success','Delete Successfully!');
    }


    public function checkout(Request $request)
    {
        $final_total_amount = $request->final_total_amount;
        $total_amount = $request->total_amount;
        $coupon_discount = $request->coupon_discount;

        $today = Carbon::now()->format('M-d');
        $todays_details = Carbon::now(+6)->format('H');
        $tomorrow = Carbon::tomorrow()->format('M-d');
        $tomorrow_1 = Carbon::tomorrow()->addDays(6)->format('M-d');

        return view('frontend.cart.checkout',compact('today','tomorrow','tomorrow_1','todays_details','final_total_amount','total_amount','coupon_discount'));
    }

    public function addressUpdate(Request $request, $id)
    {

        Customer::where('id','=',$id)->update([
            'address' => $request->address,
            'area' => $request->area,
        ]);
       return redirect('cart')->with('success','Your Address update Successfully!');
    }

    public function placeOrder()
    {
        return view('frontend.cart.payment');
    }

    public function checkoutSubmit(Request $request)
    {


        $order_id = Order::insertGetId([
            'user_id' => Auth::guard('customer')->user()->id,
            'final_total_amount'=> $request->final_total_amount,
            'total_amount'=> $request->total_amount,
            'coupon_discount'=> $request->coupon_discount,
            'payment_type'=> $request->payment_type,
            'payment_status'=> 1,
            'created_at' => Carbon::now(+6)
        ]);
        BillingInfo::insert([
            'order_id'=> $order_id,
            'full_name'=> $request->full_name,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'address'=> $request->address,
            'area'=> $request->area,
            'dr_date'=> $request->dr_date,
            'dr_time'=> $request->dr_time,
            'created_at' => Carbon::now(+6)
         ]);
      $cart_items =   Cart::where('customer_ip',$_SERVER['REMOTE_ADDR'])->get();
      foreach($cart_items as $cart_item){

          OrderHistory::insert([
              'order_id' => $order_id,
              'product_id' => $cart_item->product_id,
              'product_name' => Product::find($cart_item->product_id)->name,
              'product_price' => Product::find($cart_item->product_id)->mrp_price,
              'product_quantity' => $cart_item->product_quantity,
              'total_price' => (Product::find($cart_item->product_id)->mrp_price) * ($cart_item->product_quantity),
              'created_at' => Carbon::now(+6),
              'discount' => Product::find($cart_item->product_id)->discount_price
              ]);
          $cart_item->delete();
        }
        return redirect('/customer/orders')->with('success','Order Submit Successfully!');
    }

}

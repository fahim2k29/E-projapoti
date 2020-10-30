<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Order;
use App\Product;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;



class InvoiceController extends Controller
{


    public function createPDF(Request $request,$id)
    {

        $orders = Order::with('customers','orderhistory','billinginfo')->where('id','=',$id)->get();

        $configuration =  Configuration::first();

        $pdf = PDF::loadView('backend.pages.invoice',['orders'=>$orders,'configuration'=>$configuration]);

        return $pdf->download('invoice.pdf');
    }
}

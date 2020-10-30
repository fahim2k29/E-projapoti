<?php

namespace App\Http\Controllers\Customer;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerBackendController extends Controller
{

    public function show()
    {
        return view('backend.pages.customers.customerInsert');
    }

    public function backendCustomer()
    {
        $allCustomers = Customer::all();
        return view('backend.pages.customers.customer',['allCustomers'=>$allCustomers]);
    }

    public function update(Request $request,$id)
    {
        $SingleCustomer = Customer::find($id);
        return view('backend.pages.customers.customerUpdate',compact('SingleCustomer'));
    }

    public function updateConfirm (Request $request,$id)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_email' => 'required',
            'customer_type' => 'required',
            'customer_area' => 'required',
            'customer_address' => 'required'
        ]);
        $customerObject = Customer::find($id);
        $customerObject->name = $request->customer_name;
        $customerObject->phone = $request->customer_phone;
        $customerObject->email  = $request->customer_email;
        $customerObject->type = $request->customer_type;
        $customerObject->area = $request->customer_area;
        $customerObject->address = $request->customer_address;

        $customerObject->save();

        return redirect()->route('backendCustomer')->with('success','Update Successfully!');
    }

    public function delete(Request $request,$id){

        $customerObject = Customer::find($id);
        $customerObject->delete();


        return redirect()->route('backendCustomer')->with('success','Delete Successfully!');
    }

    public function insert(Request $request)
    {

        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'same:password',
            'name' => 'required',
            'email' => 'required|unique:customers',
            'phone' => 'required|unique:customers',
            'area' => 'required',
            'address' => 'required',
        ]);


        $customerObj = new Customer();

        $customerObj->name   = $request->name;
        $customerObj->email  = $request->email;
        $customerObj->phone = $request->phone;
        $customerObj->area = $request->area;
        $customerObj->address = $request->address;
        $customerObj->password = Hash::make($request->password);

        $customerObj->save();

        return redirect('/')->with('success','Registration Successfully!');




    }
}

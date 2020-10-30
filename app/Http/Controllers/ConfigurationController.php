<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuration;


class ConfigurationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function configuration()
    {
        $result = Configuration::all();
        return view('backend.pages.configuration',['result'=>$result]);
    }

    public function configurationUpdate(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'company_title' => 'required',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'company_email' => 'nullable|email',
            'company_head_number' => 'nullable|numeric|min:11',
            'company_footer_number' => 'nullable|numeric|min:11',
            'company_map_code' => 'nullable',
            'company_social_link_one' => 'nullable',
            'company_social_link_two' => 'nullable',
            'company_social_link_three' => 'nullable',
            'company_social_link_four' => 'nullable',
        ]);

        $id = $request->input('id');
        $company_name = $request->input('company_name');

        $company_logo = time().'.'.$request->company_logo->extension();

        $request->company_logo->move(public_path('images'), $company_logo);

        $company_email = $request->input('company_email');
        $company_title = $request->input('company_title');
        $company_description = $request->input('company_description');
        $head_number = $request->input('company_head_number');
        $footer_number = $request->input('company_footer_number');
        $address = $request->input('company_address');
        $map_code = $request->input('company_map_code');
        $link_one = $request->input('company_social_link_one');
        $link_two = $request->input('company_social_link_two');
        $link_three = $request->input('company_social_link_three');
        $link_four = $request->input('company_social_link_four');

        $result = Configuration::where('id','=',$id)->update([
            'company_name'=>$company_name,
            'company_logo'=>$company_logo,
            'company_email'=>$company_email,
            'company_title'=>$company_title,
            'company_description'=>$company_description,
            'company_head_number'=>$head_number,
            'company_footer_number'=>$footer_number,
            'company_address'=>$address,
            'company_map_code'=>$map_code,
            'company_social_link_one'=>$link_one,
            'company_social_link_two'=>$link_two,
            'company_social_link_three'=>$link_three,
            'company_social_link_four'=>$link_four
        ]);

        return redirect()->route('configuration')->with('success','Configuration successfully!');

    }




}

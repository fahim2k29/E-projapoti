<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function getVerify()
    {
        return view('verify');
    }

    public function postVerify(Request $request)
    {
        
    }
}

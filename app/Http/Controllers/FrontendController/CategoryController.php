<?php

namespace App\Http\Controllers\FrontendController;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategory()
    {
        return view('frontend.layout.master');
    }
}

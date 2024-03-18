<?php

namespace App\Http\Controllers;

use App\Models\Admin\Slider;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $sliders=Slider::where('status',1)->get();
        $categories=Category::where('status',1)->get();
        return view('frontend.index',compact('sliders','categories'));
    }

    public function collection(){
        $categories=Category::where('status',1)->get();
        return view('frontend.categories',compact('categories'));
    }
}

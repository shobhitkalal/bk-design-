<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use App\Models\DesignCategory;

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


    public function designcollection(){
        $designcategory=DesignCategory::get();
        return view('frontend.designCategories',compact('designcategory'));
    }

    public function cdesigns($designcategory){
        $designcategory=DesignCategory::where('name',$designcategory)->first();
        if($designcategory){
            $designs=$designcategory->designs()->get();
            return  view('frontend.cdesigns',compact('designs','designcategory'));
        }
        else {
            return redirect()->back();
        }
    }
    public function cproducts($category){
        $category=Category::where('name',$category)->first();
        if($category){
            $products=$category->products()->where('status','1')->get();
            return  view('frontend.cproducts',compact('products','category'));
        }
        else {
            return redirect()->back();
        }
    }

    public function viewproduct($category,$product){
        $category=Category::where('name',$category)->first();
        if($category){
            $product=$category->products()->where('name',$product)->where('status','1')->first();
            if($product)
              return view('frontend.viewproduct',compact('product','category'));
        }
        else {
            return redirect()->back();
        }
    }

    public function searchproducts(Request $request){
        if($request->search != null){
            $products=Products::where('name','LIKE',"%".$request->search."%")->latest()->paginate(5);
            return view('frontend.searchproduct',compact('products'));
        }
        else {
            $products=Products::paginate(5);
            return view('frontend.searchproduct',compact('products'));
        }
    }

}

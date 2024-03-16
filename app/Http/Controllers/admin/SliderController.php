<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){
        $slider=Slider::paginate(2);
        return view("admin.slider.index",compact("slider"));
    }
    public function create(){
        return view("admin.slider.create");
    }
    public function store(Request $request){
       if($request->hasFile('image')){
        $file=$request->file('image');
        $ext=$file->getClientOriginalExtension();
        $filename=time().'.'.$ext;
        $file->move('uploads/sliders/',$filename);
        $path='uploads/sliders/'.$filename;
    }
    Slider::create([
        'title'=>$request->title,
        'description'=>$request->description,
        'status'=>$request->status==true?'1':'0',
        'image'=>$path
    ]);
    return redirect('/admin/slider/view')->with('message','slider image added');
}
}

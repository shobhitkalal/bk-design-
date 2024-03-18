<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\DesignCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class DesignCategoryController extends Controller
{
    public function index(){
       $designcategory=DesignCategory::all();
         return view('admin.Design category.index',compact('designcategory'));
}

public function create(){
    return view('admin.Design category.create');
}

public function store(Request $request){
   $validated=$request->validate(['name'=>'required']);
   $designcategory=new DesignCategory;
   $designcategory->name=$validated['name'];
   $designcategory->description=$request->description;
   if($request->hasfile('image')){
    $file=$request->file('image');
    $ext=$file->getClientOriginalExtension();
    $filename=time().'.'.$ext;
    $file->move('uploads/Designcategory/',$filename);
    $path='uploads/Designcategory/'.$filename;
    $designcategory->image=$path;
    if($designcategory->save()){
        return redirect('/admin/Designcategory/view')->with('message','Category Added Successfully!!!!!');
    }
   }
}

public function delete($id){
    $designcategory=DesignCategory::find($id);
    if($designcategory){
     if(File::exists($designcategory->image)){
         File::delete($designcategory->image);
     }
     $designcategory->delete();
     return redirect('/admin/Designcategory/view')->with('message','Category Deleted successfully....');
    }
   }
   public function edit($id){
    $designcategory=DesignCategory::find($id);
    return view('admin.Design category.edit',compact('designcategory'));
   }

   public function update(Request $request,$id){
     $validated=$request->validate(['name'=>'required']);
     $designcategory=DesignCategory::find($id);
     $designcategory->name=$validated['name'];
     $designcategory->description=$request->description;
     if($request->hasFile('image')){
         if(File::exists($designcategory->image)){
             File::delete($designcategory->image);
         }
     $file=$request->file('image');
     $ext=$file->getClientOriginalExtension();
     $filename=time().'.'.$ext;
     $file->move('uploads/Designcategory/',$filename);
     $path='uploads/Designcategory/'.$filename;
     $designcategory->image=$path;
     }
     if($designcategory->update()){
         return redirect('/admin/Designcategory/view')->with('message','Category updated successfully....');
   }
 }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index(){
       $categories=Category::all();
        return view('admin.category.index',compact('categories'));
    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(Request $request){
       $validated=$request->validate(['name'=>'required']);
       $category=new Category;
       $category->name=$validated['name'];
       $category->description=$request->description;
       $category->status=$request->status==true ? '1':'0';
       if($request->hasfile('image')){
        $file=$request->file('image');
        $ext=$file->getClientOriginalExtension();
        $filename=time().'.'.$ext;
        $file->move('uploads/category/',$filename);
        $path='uploads/category/'.$filename;
        $category->image=$path;
        if($category->save()){
            return redirect('/admin/category/view')->with('message','Category Added');
        }
       }
    }
      public function delete($id){
       $category=Category::find($id);
       if($category){
        if(File::exists($category->image)){
            File::delete($category->image);
        }
        $category->delete();
        return redirect('/admin/category/view')->with('message','Category Deleted');
       }
      }
      public function edit($id){
       $category=Category::find($id);
       return view('admin.category.edit',compact('category'));
      }

      public function update(Request $request,$id){
        $validated=$request->validate(['name'=>'required']);
        $category=Category::find($id);
        $category->name=$validated['name'];
        $category->description=$request->description;
        $category->status=$request->status==true ? '1':'0';
        if($request->hasFile('image')){
            if(File::exists($category->image)){
                File::delete($category->image);
            }
        $file=$request->file('image');
        $ext=$file->getClientOriginalExtension();
        $filename=time().'.'.$ext;
        $file->move('uploads/category/',$filename);
        $path='uploads/category/'.$filename;
        $category->image=$path;
        }
        if($category->update()){
            return redirect('/admin/category/view')->with('message','Category updated');
      }
    }
}

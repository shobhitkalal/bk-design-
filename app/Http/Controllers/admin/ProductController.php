<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\ProductImages;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(){
        $products=Products::orderBy('created_at','desc')->paginate(2);
        return view('admin.products.index',compact('products'));
    }
    public function create(){
        $categories=Category::all();
        return view('admin.products.create',compact('categories'));
    }
    public function store(ProductRequest $request){
        $validatedData=$request->validated();
        $category=Category::FindOrFail($validatedData['category_id']);
        $product=$category->products()->create([
            'category_id'=>$validatedData['category_id'],
            'name'=>$validatedData['name'],
            'brand'=>$request->brand,
            'selling_price'=>$validatedData['selling_price'],
            'original_price'=>$validatedData['original_price'],
            'qty'=>$validatedData['qty'],
            'status'=>$request->status==true?'1':'0',
            'description'=>$request->description
        ]);
        if($request->hasFile('image')){
            $uploadPath='uploads/products/';
            $i=1;
            foreach($request->file('image') as $imageFile){
                $extension=$imageFile->getClientOriginalExtension();
                $filename=time().$i++.'.'.$extension;
                $imageFile->move($uploadPath,$filename);
                $fileImagePathName=$uploadPath.$filename;
                $product->productImages()->create([
                    'product_id'=>$product->id,
                    'image'=>$fileImagePathName
                ]);
            }
        }
        return redirect('/admin/product/view')->with('message','Product Added');
    }
    public function edit($id){
        $product=Products::find($id);
        $categories=Category::all();
        return view('admin.products.edit',compact('product','categories'));
    }

    public function update(ProductRequest $request,$id){
            $validatedData=$request->validated();
            $product=Products::where('id',$id)->first();
            if($product){
                $product->update([
                    'category_id'=>$validatedData['category_id'],
                    'name'=>$validatedData['name'],
                    'brand'=>$request->brand,
                    'selling_price'=>$validatedData['selling_price'],
                    'original_price'=>$validatedData['original_price'],
                    'qty'=>$validatedData['qty'],
                    'status'=>$request->status==true?'1':'0',
                    'description'=>$request->description
                ]);
                if($request->hasFile('image')){
                    $uploadPath='uploads/products/';
                    $i=1;
                    foreach($request->file('image') as $imageFile){
                        $extension=$imageFile->getClientOriginalExtension();
                        $filename=time().$i++.'.'.$extension;
                        $imageFile->move($uploadPath,$filename);
                        $fileImagePathName=$uploadPath.$filename;
                        $product->productImages()->create([
                            'product_id'=>$product->id,
                            'image'=>$fileImagePathName
                        ]);
                    }
                }
            }
     return redirect('/admin/product/view')->with('message','Product Updated');
    }

    public function delete($id){
        $product=Products::find($id);
        if($product->productImages()){
            foreach($product->productImages() as $images){
                if(File::exists($images->image))
                    File::delete($images->image);
            }
        }
        $product->delete();
        return redirect('/admin/product/view')->with('message','Product Deleted');
    }

    public function destroy($id){
        $productImage=ProductImages::FindOrFail($id);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message','image deleted');
    }
}

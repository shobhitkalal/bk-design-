<?php

namespace App\Http\Controllers\Admin;

use App\Models\Designss;
use Illuminate\Http\Request;
use App\Models\DesignCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\DesignRequest;
use App\Models\DesignImages;
use Illuminate\Support\Facades\File;

class DesignController extends Controller
{
    public function index(){
        $Designs=Designss::orderBy('created_at','desc')->paginate(2);
            return view('admin.designs.index',compact('Designs'));
        }
        public function create(){
            $designcategory=DesignCategory::all();
            return view('admin.designs.create',compact('designcategory'));
        }


    public function store(DesignRequest $request){
        // dd($request->all());
        $validatedData=$request->validated();
        $designcategory=DesignCategory::FindOrFail($validatedData['designcategory_id']);
        $designs=$designcategory->Designs()->create([
            'designcategory_id'=>$validatedData['designcategory_id'],
            'name'=>$validatedData['name'],
            'description'=>$request->description
        ]);
        if($request->hasFile('image')){
            $uploadPath='uploads/designs/';
            $i=1;
            foreach($request->file('image') as $imageFile){
                $extension=$imageFile->getClientOriginalExtension();
                $filename=time().$i++.'.'.$extension;
                $imageFile->move($uploadPath,$filename);
                $fileImagePathName=$uploadPath.$filename;
                $designs->DesignImages()->create([
                    'design_id'=>$designs->id,
                    'image'=>$fileImagePathName
                ]);
            }
        }
        return redirect('/admin/Designs/view')->with('message','New Designs Added');
    }
    public function edit($id){
        $designs=Designss::find($id);
        $designcategory=DesignCategory::all();
        return view('admin.Designs.edit',compact('designs','designcategory'));
    }

    public function update(DesignRequest $request,$id){
        $validatedData=$request->validated();
        $designs=Designss::where('id',$id)->first();

        if($designs){
            $designs->update([
                'designcategory_id'=>$validatedData['designcategory_id'],
                'name'=>$validatedData['name'],
                'DesignCategory'=>$request->DesignCategory,
                'description'=>$request->description
            ]);
            if($request->hasFile('image')){
                $uploadPath='uploads/Designs/';
                $i=1;
                foreach($request->file('image') as $imageFile){
                    $extension=$imageFile->getClientOriginalExtension();
                    $filename=time().$i++.'.'.$extension;
                    $imageFile->move($uploadPath,$filename);
                    $fileImagePathName=$uploadPath.$filename;
                    $designs->DesignImages()->create([
                        'design_id'=>$designs->id,
                        'image'=>$fileImagePathName
                    ]);
                }
            }

 return redirect('/admin/Designs/view')->with('message','New design Added');
}

    }
    public function delete($id){
            $designs=Designss::find($id);
            if($designs->DesignImages()){
                foreach($designs->DesignImages() as $images){
                    if(File::exists($images->image))
                        File::delete($images->image);
                }
            }
            $designs->delete();
            return redirect('/admin/Designs/view')->with('message','Product Deleted');
        }

        public function destroy($id){
            $DesignImage=DesignImages::findOrFail( $id );
            if(File::exists($DesignImage->image)){
                File::delete($DesignImage->image);
            }
            $DesignImage->delete();
            return redirect()->back()->with('message','Design Image Deleted');

}
}

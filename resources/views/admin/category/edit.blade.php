@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    @if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('message')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

     <div class="card">
        <div class="card-header">
            <h1>Update category
                <a class="btn btn-primary float-end"
                href="{{url('/admin/category/view')}}"
                role="button">View Categories</a>
            </h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{url('/admin/category/update/'.$category->id)}}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input  type="text" name="name"  class="form-control" value={{$category->name}} />
                @error('name')
                     <small id="helpId" class="text-danger">{{$message}}</small>
                @enderror

            </div>
                 <div class="mb-3">
                    <label for="" class="form-label">Choose file</label>
                    <input type="file"class="form-control"name="image"/>
                    <small id="helpId" class="text-danger"></small>
                 </div>
                 @if ($category->image)
                      <img src="{{asset($category->image)}}" class="mb-3" width="50px" height="50px"/>
                 @endif
      <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <textarea class="form-control" name="description" rows="3">
            {{$category->description}}
        </textarea>
        <small id="helpId" class="text-danger"></small>
      </div>
           <div class="mb-3">
            <label class="form-check-label" for="">status </label>
            <input class="form-check-input" type="checkbox" value="1" name="status"
            {{$category->status=='1' ? 'checked':''}}/>
           </div>
               <button
                type="submit" class="btn btn-primary"> Confirm</button>

        </form>
        </div>

  </div>
@endsection

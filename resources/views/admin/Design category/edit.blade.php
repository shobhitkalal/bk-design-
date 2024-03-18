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
            <h1> Update Design Category
                 <a class="btn btn-success float-end" href="{{url('/admin/Designcategory/view')}}" role="button">View Categories</a>
            </h1>
        </div>
        <div class="card-body">
          <form method="POST" action="{{url('/admin/Designcategory/update/'.$designcategory->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
             <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $designcategory->name }}"/>
                 @error('name')
                        <small id="helpId" class="text-danger">{{$message}}</small>
                 @enderror
             </div>
            <div class="mb-3">
                <label for="" class="form-label">Choose file</label>
                <input type="file"  class="form-control" name="image"/>
                <small id="helpId" class="text-muted"></small>
            </div>
            @if ($designcategory->image)
            <img src="{{asset($designcategory->image)}}" class="mb-3" width="50px" height="50px"/>
            @endif
             <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="" rows="3" {{$designcategory->description }}></textarea>
              <small id="helpId" class="text-muted"></small>
             </div>
            <button type="submit" class="btn btn-primary">
                Confirm
            </button>

          </form>
        </div>


  </div>
@endsection









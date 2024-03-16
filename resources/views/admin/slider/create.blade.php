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
            <h1>ADD SLIDER
                <a class="btn btn-primary float-end"
                href="{{url('/admin/slider/view')}}"
                role="button">View SLIDER</a>
            </h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{url('/admin/slider/add')}}"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input  type="text" name="title"  class="form-control"/>
            </div>
                 <div class="mb-3">
                    <label for="" class="form-label">Choose file</label>
                    <input type="file"class="form-control"name="image"/>
                    <small id="helpId" class="text-danger"></small>
                 </div>


        </div>
      <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <textarea class="form-control" name="description" rows="3"></textarea>
        <small id="helpId" class="text-danger"></small>
      </div>
           <div class="mb-3">
            <label class="form-check-label" for="">status </label>
            <input class="form-check-input" type="checkbox" value="1" name="status" />
           </div>
               <button
                type="submit" class="btn btn-primary"> Confirm</button>

        </form>
        </div>

  </div>
@endsection

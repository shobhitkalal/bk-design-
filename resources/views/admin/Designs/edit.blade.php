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
            <h1>Add Designs
                <a class="btn btn-primary float-end"
                href="{{url('/admin/Designs/view')}}"
                role="button">View Designs</a>
            </h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{url('/admin/Designs/update/'.$designs->id)}}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                  <button class="nav-link" id="nav-details-tab" data-bs-toggle="tab" data-bs-target="#nav-details" type="button" role="tab" aria-controls="nav-details" aria-selected="false">Details</button>
                  <button class="nav-link" id="nav-images-tab" data-bs-toggle="tab" data-bs-target="#nav-images" type="button" role="tab" aria-controls="nav-images" aria-selected="false">Images</button>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="" class="form-label">Design Categories</label>
                                <select name="designcategory_id" class="form-select">
                                    <option selected disabled>select</option>
                                    @foreach ($designcategory as $c)
                                        <option value="{{ $c->id }}"
                                            {{ $designs->designcategory_id==$c->id ?"selected":null}}>{{ $c->name }}</option>
                                    @endforeach
                                </select>
                                @error('designcategory_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" id="" class="form-control"
                                    placeholder="" aria-describedby="helpId" value="{{$designs->name}}">
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Design Categories</label>
                                <input type="text" name="DesignCategories" id="" class="form-control"
                                    placeholder="" value="{{$designs->designcategories}}">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab" tabindex="0">
                    <div class="card mt-3">
                        <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea  name="description" id="" class="form-control">
                                {{$designs->description}}
                            </textarea>
                        </div>
                  </div>
                </div>
                </div>

                <div class="tab-pane fade" id="nav-images" role="tabpanel" aria-labelledby="nav-images-tab" tabindex="0">
                    <div class="card mt-2">
                        <div class="card-body">
                          <div class="mb-3">
                            <label for="" class="form-label">Upload Design Images</label>
                            <input type="file" class="form-control" multiple  name="image[]" id=""
                            placeholder="" aria-describedby="fileHelpId">
                          </div>
                          <div>
                            @if ($designs->DesignImages)
                            @foreach ($designs->DesignImages as $image)
                                <img src="{{asset($image->image)}}" width='100px' height='100px' class="mb-2 p-2" style="border:2px solid black"/>
                                <a class="text-danger text-decoration-none"
                                href="{{url('/admin/Designs/designimage/delete/'.$image->id)}}" style="position:relative;top:-50px;left:-11x">X</a>
                            @endforeach
                        @else
                            <h1>No Image Found</h1>
                        @endif

                          </div>
                          <input name="save" id="" class="btn btn-primary" type="submit" value="submit">
                        </div>
                      </div>

                </div>
              </div>

          </form>
        </div>


  </div>
@endsection









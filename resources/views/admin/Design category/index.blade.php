@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    @if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('message')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <div class="card"
        <div class="card-header">
            <h1> View Design Category
                 <a class="btn btn-primary float-end" style="background-color: gold" href="{{url('/admin/Designcategory/add')}}" role="button">Add Category</a>
            </h1>
        </div>

        <div class="card-body">

            <div class="table-responsive" >
                <table   class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">IMAGE</th>
                            <th> ACTION</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($designcategory as $z)
                        <tr class="">
                            <td scope="row">{{$z->id}}</td>
                            <td>{{$z->name}}</td>
                            <td>
                            <img src="{{asset($z->image)}}"
                            height='50px' width='50px'/>
                        </td>
                        <td>
                            <a name="" class="btn btn-success me-2"  href="{{url('/admin/Designcategory/edit/'.$z->id)}}">
                                <i class="bi bi-arrow-repeat"></i></a>
                            <a name="" class="btn btn-danger"  href="{{url('/admin/Designcategory/delete/'.$z->id)}}"
                                onclick="return window.confirm('are you sure you want to delete this??')">
                                <i class="bi bi-x-circle-fill"></i></a>
                        </td>
                        </tr>
                         @empty
                          <tr>
                            <td colspan="5"> No Category Found </td>
                          </tr>
                         @endforelse
                    </tbody>
                </table>
            </div>
        </div>

  </div>
@endsection









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
          <h1>View Categories
              <a class="btn btn-info float-end"
              href="{{url('/admin/category/add')}}"
              role="button">Add Category</a>
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
                        <th> STATUS </th>
                        <th> ACTION</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $c)
                    <tr class="">
                        <td scope="row">{{$c->id}}</td>
                        <td>{{$c->name}}</td>
                        <td>
                        <img src="{{asset($c->image)}}"
                        height='50px' width='50px'/>
                    </td>
                    <td>
                        @if ($c->status=='1')
                        <span class="badge rounded-pill text-bg-success">Active</span>
                         @else
                         <span class="badge rounded-pill text-bg-danger">InActive</span>
                        @endif
                    </td>
                    <td>
                        <a name="" class="btn btn-success me-2"  href="{{url('/admin/category/edit/'.$c->id)}}">
                            <i class="bi bi-arrow-repeat"></i></a>
                        <a name="" class="btn btn-danger"  href="{{url('/admin/category/delete/'.$c->id)}}"
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
  </div>
@endsection

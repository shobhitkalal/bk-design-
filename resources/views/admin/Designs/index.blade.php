@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    @if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('message')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      e

      <div class="card">
        <div class="card-header">
            <h1> View Designs
                 <a class="btn btn-primary float-end" style="background-color: gold" href="{{url('/admin/Designs/add')}}" role="button">Add Designs</a>
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
                        @forelse ($Designs  as  $design)
                        <tr>
                          <td>{{$design->id}}</td>
                          <td>{{$design->name}}</td>
                          <td>{{$design->name}}</td>
                          <td>
                           @if ($design->DesignImages()->count() > 0)
                             <img src={{asset($design->DesignImages[0]->image)}}  height='50px' width='50px'/>
                           @endif
                         </td>
                          <td><a name="" class="btn btn-success me-2" href="{{url('/admin/Designs/edit/'.$design->id)}}">
                           <i class="bi bi-pencil-square"></i></a>
                         <a name="" class="btn btn-danger" href="{{url('/admin/Designs/delete/'.$design->id)}}"
                          onclick="return window.confirm('are you sure you want to delete this??')" >
                           <i class="bi bi-trash"></i></a></td>
                        </tr>
                        @empty
                          <tr><td colspan="9">No Designs Found</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

  </div>
@endsection









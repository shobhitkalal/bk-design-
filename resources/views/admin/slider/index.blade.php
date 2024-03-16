{{-- category view --}}
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
      <h1>View Slider Images
          <a class="btn btn-info float-end"
          href="{{url('/admin/slider/add')}}"
          role="button">Add Slider</a>
      </h1>
  </div>
  <div class="card-body">
   <div  class="table-responsive mb-3" >
    <table class="table table-primary"  >
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Title</th>
          <th scope="col">Image</th>
          <th>Status</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($slider as $c)
          <tr class="">
            <td scope="row">{{$c->id}}</td>
            <td>{{$c->title}}</td>
            <td>
              <img src="{{asset($c->image)}}" height='50px' width='50px'/>

            </td>
            <td>
                @if ($c->status=='1')
                    <span class="badge rounded-pill text-bg-success">active</span>
                @else
                   <span class="badge rounded-pill text-bg-danger">inactive</span>
                @endif
            </td>
            <td>
              {{$c->description}}
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5">No Slider Found</td>
          </tr>
        @endforelse

      </tbody>
    </table>
   </div>

    {{$slider->links('pagination::bootstrap-5')}}
  </div>
</div>


  </div>
@endsection

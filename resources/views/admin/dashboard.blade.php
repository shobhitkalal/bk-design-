@extends('layouts.admin')

@section('content')
<div class="container mt-5">
@if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{session('message')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <h1>My Dashboard</h1>
    <div class="row">
      <div class="col-3">
          <div class="card">
              <div class="card-body bg-primary text-white text-center">
                    <label>Total Orders</label>
                    <h1>{{$ordercount}}</h1>
                    <a class="btn btn-warning" href="{{url('admin/orders')}}">View</a>
              </div>
          </div>
      </div>
      <div class="col-3">
        <div class="card">
            <div class="card-body bg-primary text-white text-center">
                  <label>Total Products</label>
                  <h1>{{$productscount}}</h1>
                  <a class="btn btn-warning" href="{{url('admin/product/view')}}">View</a>
            </div>
        </div>
    </div>
    <div class="col-3">
      <div class="card">
          <div class="card-body bg-primary text-white text-center">
                <label>Total Users</label>
                <h1>{{$usercount}}</h1>
                <a class="btn btn-warning" href="#">View</a>
          </div>
      </div>
  </div>
  <div class="col-3">
    <div class="card">
        <div class="card-body bg-primary text-white text-center">
              <label>Total Categories</label>
              <h1>{{$categorycount}}</h1>
              <a class="btn btn-warning" href="{{url('/admin/category/view')}}">View</a>
        </div>
    </div>
</div>
    </div>

  </div>
@endsection

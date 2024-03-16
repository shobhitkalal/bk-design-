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
      <h1>View Products
          <a class="btn btn-info float-end"
          href="{{url('/admin/product/add')}}"
          role="button">Add Product</a>
      </h1>
  </div>
  <div class="card-body">
   <div  class="table-responsive mb-3" >
    <table class="table table-primary"  >
      <thead>
        <tr>
          <th>ID</th>
          <th>Category</th>
          <th>Name</th>
          <th>Image</th>
          <th>Quantity</th>
          <th>Selling Price</th>
          <th>Original Price</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
       @forelse ($products as  $product)
       <tr>
         <td>{{$product->id}}</td>
         <td>{{$product->category->name}}</td>
         <td>{{$product->name}}</td>
         <td>
          @if ($product->productImages()->count() > 0)
            <img src={{asset($product->productImages[0]->image)}}  height='50px' width='50px'/>
          @endif
        </td>
           <td>{{$product->qty}}</td>
         <td>{{$product->selling_price}}</td>
         <td>{{$product->original_price}}</td>
         <td>
              @if ($product->status=='1')
                  <span class="badge rounded-pill text-bg-success">active</span>
              @else
                <span class="badge rounded-pill text-bg-danger">inactive</span>
              @endif</td>
         <td><a name="" class="btn btn-success me-2" href="{{url('/admin/product/edit/'.$product->id)}}">
          <i class="bi bi-pencil-square"></i></a>
        <a name="" class="btn btn-danger" href="{{url('/admin/product/delete/'.$product->id)}}"
         onclick="return window.confirm('are you sure you want to delete this??')" >
          <i class="bi bi-trash"></i></a></td>
       </tr>
       @empty
         <tr><td colspan="9">No Product Found</td></tr>
       @endforelse
      </tbody>
    </table>
   </div>
   {{$products->links("pagination::bootstrap-5")}}
  </div>
</div>


  </div>
@endsection

@extends('layouts.admin')

@section('content')
<div class="container m-5">
    @if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{session('message')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <div class="card">
        <div class="card-body shadow p-4 bg-white">
            <h1><i class="bi bi-cart-fill"></i> Order Details
                <a name="" id="" class="btn btn-danger float-end" href="{{url('/admin/orders')}}" role="button">Back</a>
                <a name="" id="" class="btn btn-primary float-end me-2" href="{{url('/admin/order/sendmail/'.$order->id)}}" role="button">Send Mail</a>
                <a name="" id="" class="btn btn-warning float-end me-2" href="{{url('/admin/order/invoice/'.$order->id)}}" role="button">View Invoice</a>
                <a name="" id="" class="btn btn-success float-end me-2" href="{{url('/admin/order/invoice/download/'.$order->id)}}" role="button">Download Invoice</a>
            </h1>
                <hr/>
        <div class="row shadow">
            <div class="col-6 p-2">
               <h2> Order Details</h2>
               <hr/>
               <p>Order Id: {{$order->id}}</p>
               <p>Tracking Id/No: {{$order->tracking_no}}</p>
               <p>Ordered Date: {{$order->created_at}}</p>
               <p>Payment Mode: {{$order->payment_mode}}</p>
               <p class="text-success p-3 border">Order Status Message: {{$order->status_message}}</p>

            </div>
            <div class="col-6 p-2">
                <h2> User Details</h2><hr>
                <p>Fullname: {{$order->fullname}}</p>
                <p>Phone: {{$order->phone}}</p>
                <p>Email: {{$order->email}}</p>
                <p>Address: {{$order->address}}</p>
                <p>Pincode : {{$order->pincode}}</p>
            </div>
        </div>
        <div class="row shadow mt-4">
            <h1>Order Items</h1>
            <hr/>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Item ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalPrice=0;
                        @endphp
                        @forelse ($order->orderItems as $orderItem)
                        <tr class="">
                            <td>{{$orderItem->id}}</td>
                            <td>
                                @if ($orderItem->product?->productImages->count()>0)
                                    <img src="{{asset($orderItem->product?->productImages[0]->image)}}" alt="{{$orderItem->product?->name}}" style="width: 50px; height: 50px" >
                                    @else
                                    <img src="" alt="{{$orderItem->product?->name}}" style="width: 50px; height: 50px" >
                                    @endif

                            </td>
                            <td>{{$orderItem->product->name ?? '' }}</td>
                            <td>{{$orderItem->price}}</td>
                            <td>{{$orderItem->quantity}}</td>
                            <td>{{$orderItem->price * $orderItem->quantity}}
                            @php
                                $totalPrice += $orderItem->price * $orderItem->quantity
                            @endphp
                            </td>
                        </tr>
                        @empty
                            <tr><td colspan="6">No Order Item Found</td></tr>
                        @endforelse
                        <tr>
                            <td colspan="5" class="fw-bold">Total Amount:</td>
                            <td colspan="1" class="fw-bold">{{$totalPrice}}</td>
                        </tr>
                    </tbody>
                </table>
                </div>
        </div>
        <div class="row shadow mt-4">
            <div class="card">
                <div class="card-body">
                    <h4>Order Process (Order Status Update)</h4>
                    <hr/>
                    <div class="row">
                        <div class="col-5">
                            <form action="{{url('admin/orders/'.$order->id)}}" method="post">
                            @csrf
                            @method('PUT')

                            <label>Update your Order Status </label>
                            <div class="input-group">
                                <select name="order_status" class="form-select">
                                    <option>Select All Status</option>
                                    <option>in progress</option>
                                    <option>completed</option>
                                    <option>pending</option>
                                    <option>cancelled</option>
                                    <option>out for delivery</option>
                                    <option>delivered</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            </form>
                        </div>
                        <div class="col-7">
                            <h4 class="mt-3">Current Order Status: <span class="text-uppercase">
                                {{$order->status_message}}
                            </span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@extends('layouts.admin')

@section('content')
    <div class="container mt-5 p-3 shadow">
        <h1>All Orders</h1> <hr/>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">tracking_no</th>
                        <th scope="col">Username</th>
                        <th>Payment Mode</th>
                        <th>Order Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                      <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->tracking_no }}</td>
                        <td>{{ $order->fullname }}</td>
                        <td>{{ $order->payment_mode }}</td>
                        <td>{{ $order->created_at->format('d-m-y')}}</td>
                        <td>{{ $order->status_message }}</td>
                        <td>
                            <a class="btn btn-primary"
                            href="{{ url('/admin/vieworder/'.$order->id)}}">view</a>
                        </td>
                      </tr>

                    @empty
                             <tr><td colspan="7">No Order Found</td></tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        {{$orders->links('pagination::bootstrap-5')}}
    </div>
@endsection

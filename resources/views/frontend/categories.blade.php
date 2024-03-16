@extends('layouts.app')

@section('content')


<div class="container mt-5">
    <div class="row">
        @forelse ($categories as $c)
        <div class="col-3">
            <div class="card">
                <img src="{{ asset($c->image) }}" class="card-img-top"/>
                <div class="card-body">
                    <h4> {{ $c->name }}</h4>
                    <p>{{ $c->description }}</p>
                </div>
        @empty
                   <h1> No Categories Found </h1>
        @endforelse
    </div>
</div>
@endsection


@extends('layouts.app')

@section('content')


<div class="container mt-5">
    <div class="row">
        @forelse ($designcategory as $z)
        <div class="col-3">
            <div class="card">
                <a href="{{ ('/designcollection/').$z->name }}">
                <img src="{{ asset($z->image) }}" class="card-img-top"/>
                </a>
                <div class="card-body">
                    <h4> {{ $z->name }}</h4>
                    <p>{{ $z->description }}</p>
                </div>
            </div>
        </div>
        @empty
                   <h1> No Designs Found </h1>
        @endforelse
    </div>
</div>
@endsection


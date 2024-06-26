@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container col-6">
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
</div>
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($sliders as $key=>$s)
        <div class="carousel-item {{ $key==0 ? 'active':null }}">
            <img src="{{ asset($s->image) }}" class="d-block w-100" alt="{{$s->title}}"
            height="650x">
          </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container">
    <div class="row mt-5">
            @forelse ($categories as $c)
            <div class="col-3">
            <div class="card">
                <img src="{{asset($c->image)}}" class="card-img-top" height="200px">
                <div class="card-body">
                    <h5 class="card-title"> {{($c->name)}} </h5>
                    <p class="card-text"> </p>
                    <a href="#" class="btn btn-primary"> click </a>
                </div>
            </div>
            </div>
        @empty
        <h1> No Category Found </h1>
        @endforelse
  </div>
  </div>
@endsection

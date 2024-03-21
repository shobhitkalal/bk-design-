@extends('layouts.app')

@section('content')
  <livewire:frontend.cdesigns :designs="$designs" :designcategory="$designcategory"/>
@endsection


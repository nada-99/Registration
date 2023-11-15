@extends('layout.app')
@section('title', 'Home')

@section('content')
    @auth
        <div class="text-center mt-3">
            <h1>Welcome {{ auth()->user()->name }}</h1>
        </div>
    @else
        <div class="text-center mt-3" style="color: red;">
            <h3>you need to login</h3>
        </div>
    @endauth
@endsection

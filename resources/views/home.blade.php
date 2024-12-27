@extends('layout')

@section('content')

<link rel="stylesheet" href="{{ asset('css/home.css') }}">

<div class="container mt-5 text-center">
    <div class="jumbotron bg-light p-5 rounded-lg shadow-sm">
        <h1 class="display-4">Welcome to Blogify</h1>
        <p class="lead">Explore the latest articles and join our community.</p>
        <hr class="my-4">
        <p>To get started, please login or register.</p>
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg mx-2">Login</a>
        <a href="{{ route('register') }}" class="btn btn-secondary btn-lg mx-2">Register</a>
    </div>
</div>

@endsection
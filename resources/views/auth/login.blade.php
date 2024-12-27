@extends('layout')

@section('content')

<link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <div class="container">
        <h1 class="text-center mt-5">Login</h1>
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('login.post') }}" method="POST" class="mt-4">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
    
        <p class="mt-3 text-center">Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
        <p class="mt-3 text-center"><a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a></p>
    </div>

@endsection
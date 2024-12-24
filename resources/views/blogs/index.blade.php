<!-- resources/views/blogs/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Blogs</h1>
        @foreach ($blogs as $blog)
            <div class="blog">
                <h2>{{ $blog->title }}</h2>
                <p>{{ $blog->content }}</p>
                <a href="{{ route('blogs.show', $blog) }}">Read more</a>
            </div>
        @endforeach
    </div>
@endsection
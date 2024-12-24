<!-- resources/views/blogs/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $blog->title }}</h1>
        <p>{{ $blog->content }}</p>

        <h3>Comments</h3>
        @foreach ($blog->comments as $comment)
            <div class="comment">
                <p>{{ $comment->content }}</p>
            </div>
        @endforeach

        @auth
            <form action="{{ route('blogs.comments.store', $blog) }}" method="POST">
                @csrf
                <textarea name="content" required></textarea>
                <button type="submit">Add Comment</button>
            </form>
        @endauth
    </div>
@endsection
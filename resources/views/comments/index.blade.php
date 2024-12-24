<!-- resources/views/comments/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Comments</h1>
        @foreach ($comments as $comment)
            <div class="comment">
                <p>{{ $comment->content }}</p>
                <p>By User ID: {{ $comment->user_id }}</p>
            </div>
        @endforeach
    </div>
@endsection
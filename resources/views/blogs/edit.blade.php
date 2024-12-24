<!-- resources/views/blogs/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Blog</h1>
        <form action="{{ route('blogs.update', $blog) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ $blog->title }}" required>
            </div>
            <div>
                <label for="content">Content</label>
                <textarea name="content" id="content" required>{{ $blog->content }}</textarea>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
@endsection
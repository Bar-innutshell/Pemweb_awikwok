@extends('layout')

@section('content')

<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <h1>{{ $article->title }}</h1>
            <p>{{ $article->content }}</p>
        </div>
    </div>
    <hr>
    <h3>Comments</h3>

    {{-- Form untuk menambahkan komentar --}}
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="article_id" value="{{ $article->id }}">
        @if(Auth::check())
            <input type="hidden" name="name" value="{{ Auth::user()->name }}">
        @else
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
        @endif
        <div class="form-group">
            <label for="content">Komentar:</label>
            <textarea name="content" id="content" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
    <p class="mt-3 text-center"><a href="{{ route('articles.index') }}" class="btn btn-secondary">Back to Articles</a></p>
    <hr>
    
    {{-- Menampilkan daftar komentar --}}
    @if($article->comments && $article->comments->isNotEmpty())
        @foreach($article->comments as $comment)
            <div class="comment">
                <div class="card mt-3">
                    <div class="card-body">
                        <p><strong>{{ $comment->name }}</strong></p>
                        <p>{{ $comment->content }}</p> 
                        <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>   
            </div>
        @endforeach
    @endif
    
</div>

@endsection

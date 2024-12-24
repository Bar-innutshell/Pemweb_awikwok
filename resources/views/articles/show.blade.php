@extends('layout')

@section('content')
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->content }}</p>

    <hr>
    <h3>Comments</h3>

    {{-- Form untuk menambahkan komentar --}}
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="article_id" value="{{ $article->id }}">
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Komentar:</label>
            <textarea name="content" id="content" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>


    <hr>
    
    {{-- Menampilkan daftar komentar --}}
    @if($article->comments && $article->comments->isNotEmpty())
        @foreach($article->comments as $comment)
            <div class="mt-3">
                <strong>{{ $comment->name }}</strong>
                <p>{{ $comment->content }}</p>
            </div>
        @endforeach
    @else
        <p>No comments available.</p>
    @endif
@endsection

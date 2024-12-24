@extends('layout')

@section('content')
<h1>Articles</h1>
<a href="{{ route('articles.create') }}" class="btn btn-primary">Create New Article</a>

@foreach($articles as $article)
    <div class="card mt-3">
        <div class="card-body">
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->content }}</p>
            <a href="{{ route('articles.show', $article) }}" class="btn btn-info">View</a>
            <a href="{{ route('articles.edit', $article) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endforeach
@endsection

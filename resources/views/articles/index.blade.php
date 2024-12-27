@extends('layout')

@section('content')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/articles.css') }}">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-4">Blogify</h1>
        @if(Auth::user()->is_admin)
            <a href="{{ route('articles.create') }}" class="btn btn-primary">Create New Article</a>
        @endif
    </div>

    @if($articles->isEmpty())
        <div class="alert alert-warning mt-3">No articles found.</div>
    @else
        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('articles.show', $article) }}" class="btn btn-sm btn-outline-info">View</a>
                                    @if(Auth::user()->is_admin)
                                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                        <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    @endif
                                </div>
                                <small class="text-muted">{{ $article->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    @endif
</div>

@endsection
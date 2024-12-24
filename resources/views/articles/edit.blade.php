@extends('layout')

@section('content')
<h1>{{ $article->exists ? 'Edit Article' : 'Create Article' }}</h1>

<form action="{{ $article->exists ? route('articles.update', $article) : route('articles.store') }}" method="POST">
    @csrf
    @if($article->exists) @method('PUT') @endif
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $article->title) }}">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" class="form-control">{{ old('content', $article->content) }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>
@endsection
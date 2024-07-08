@extends('layouts.app')

@section('title', 'Blog')

@section('content')
<div class="container">
    <h1>Blog Posts</h1>

    @auth
    <div class="card mb-3">
        <div class="card-header">
            Create New Post
        </div>
        <div class="card-body">
            <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Post</button>
            </form>
        </div>
    </div>
    @endauth

    @foreach ($posts as $post)
    <div class="card mb-3">
        <div class="card-header">
            <h2>{{ $post->title }}</h2>
        </div>
        <div class="card-body">
            <p>{{ $post->content }}</p>
            @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid mb-3">
            @endif
            <div class="mt-2">
                <form action="{{ route('reactions.store', $post->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="type" value="like">
                    <button type="submit" class="btn btn-outline-primary">Like</button>
                </form>
                <form action="{{ route('reactions.store', $post->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="type" value="dislike">
                    <button type="submit" class="btn btn-outline-danger">Dislike</button>
                </form>
                <span class="ml-2">Likes: {{ $post->reactions->where('type', 'like')->count() }}</span>
                <span class="ml-2">Dislikes: {{ $post->reactions->where('type', 'dislike')->count() }}</span>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

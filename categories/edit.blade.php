@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Edit a Category</div>
    <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="post" action="{{ route('categories.update', ['category' => $category]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}" />
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $category->description }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
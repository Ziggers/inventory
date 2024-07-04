@extends('layouts.app')

@section('content')

<link href="{{ asset('layouts/app.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-header">Categories</div>
    <div class="card-body" style="background-color: #FBE9D0">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Create a Category</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ route('categories.edit', ['category' => $category]) }}" class="btn btn-warning">Edit</a>
                        <form method="post" action="{{ route('categories.destroy', ['category' => $category]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
    
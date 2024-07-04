@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Create a Category</div>
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

        <form method="post" action="{{ route('categories.store') }}">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" />
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" placeholder="Description"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save a New Category</button>
            </div>
        </form>
    </div>
</div>
@endsection

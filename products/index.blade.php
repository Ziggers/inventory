@extends('layouts.app')

@section('content')
<div class="card">
    <link href="{{ asset('layouts/app.css') }}" rel="stylesheet">

    <div class="card-header">Products</div>
    <div class="card-body" >
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">Create a Product</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <div> </div>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->category->name }}</td>
                    make a logical sidebar for my inventory system that should cover the problems
                    <td>
                        <a href="{{ route('product.edit', ['product' => $product]) }}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('product.destroy', ['product' => $product]) }}">
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

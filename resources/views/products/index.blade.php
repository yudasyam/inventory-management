@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Product List</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        <a href="/products/{{ $product->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                        <form action="/products/{{ $product->id }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        </form>
                        <form action="/products/{{ $product->id }}/checkout" method="POST" style="display:inline-block;">
                            @csrf
                            <div class="input-group">
                                <input type="number" name="quantity" class="form-control" placeholder="Qty" min="1" max="{{ $product->quantity }}" required>
                                <button type="submit" class="btn btn-warning btn-sm">Check Out</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

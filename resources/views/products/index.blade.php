<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Product List</h1>
        <!-- Tambahkan tombol Add Product -->
        <a href="/products/create" class="btn btn-success mb-3">Add Product</a>
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
                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                    <td>
                    <td>
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

                    </td>

                    </td>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Product</h1>
        <form action="/products/{{ $product->id }}" method="POST">
            @csrf
            @method('PUT') <!-- Menandakan bahwa ini adalah request PUT untuk update -->

            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $product->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description">{{ old('description', $product->description) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" name="price" class="form-control" id="price" value="{{ old('price', $product->price) }}" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" id="quantity" value="{{ old('quantity', $product->quantity) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
</body>
</html>

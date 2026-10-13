<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <h1>Product Details</h1>
    <p>ID: {{ $product->id }}</p>
    <p>Name: {{ $product->name }}</p>
    <p>Price: {{ $product->price }}</p>
    <p>Price: {{ $product->created_at }}</p>
    <p>Category: {{ $product->category->name ?? 'N/A' }}</p>
    <br><br><br>
    <a class="action-link" href="{{ route('products.index') }}">Listar</a>
</body>
</html>

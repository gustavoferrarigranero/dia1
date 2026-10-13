<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Products</title>
</head>
<body>
<form method="POST" action="{{ route('products.store') }}" style="zoom: 2">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <br>
    <br>
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" step="0.01" required>
    <br>
    <br>
    <button type="submit">Create Product</button>


</form>
</body>
</html>
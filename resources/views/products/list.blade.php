<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product List</title>
    <style>

        :root {
            --bg: #f5f7fa;
            --surface: #ffffff;
            --surface-soft: #eef4f2;
            --ink: #172033;
            --muted: #667085;
            --line: #d9e1e7;
            --accent: #146c63;
            --accent-strong: #0e4f49;
            --warning: #a15c07;
            --code-bg: #eef2f6;
            --shadow: 0 18px 50px rgba(22, 32, 51, 0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 680px;
            background: #fff;
        }
        th, td {
            padding: 13px 14px;
            border-bottom: 1px solid var(--line);
            text-align: left;
            vertical-align: top;
        }
        th {
            background: #f1f5f8;
            color: #344054;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: .04em;
        }
        tr:last-child td { border-bottom: 0; }
        .empty-state {
            padding: 18px;
            border: 1px dashed var(--line);
            border-radius: 8px;
            background: #fffaf0;
            color: var(--warning);
        }
    </style>
</head>
<body>
<h1>Product List</h1>
<br>
<a class="action-link" href="{{ route('products.create') }}">Criar</a>
<br>
<br>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($products as $product)
        <tr>
            <td>{{ $product['id'] }}</td>
            <td>{{ $product['name'] }}</td>
            <td>{{ $product['price'] }}</td>
            <td>
                @if(isset($product['category']))
                    {{ $product['category']['name'] }}
                @endif
            </td>
            <td>{{ $product['created_at'] }}</td>
            <td><a class="action-link" href="{{ route('products.show', $product['id']) }}">Ver detalhes</a></td>
        </tr>
    @empty
        <tr><td colspan="4">Nenhum produto cadastrado.</td></tr>
    @endforelse
    </tbody>
</table>
</body>
</html>

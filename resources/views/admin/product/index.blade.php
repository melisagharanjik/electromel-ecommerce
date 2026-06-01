<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>

<h1>Product List</h1>

<a href="{{ route('admin.product.create') }}">
    Add Product
</a>

<br><br>

@foreach($data as $rs)

    {{ $rs->id }} -
    {{ $rs->title }}

    <br>

    Category:
    {{ $rs->category->title }}

    <br>

    Price:
    {{ $rs->price }}

    <br>

    <a href="{{ route('admin.product.edit', ['id' => $rs->id]) }}">
        Edit
    </a>

    |

    <a href="{{ route('admin.product.delete', ['id' => $rs->id]) }}"
       onclick="return confirm('Are you sure?')">
        Delete
    </a>

    <br><br>

@endforeach

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>

<h1>Add Product</h1>

<form action="{{ route('admin.product.store') }}" method="post">

    @csrf

    <p>Category</p>
    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->title }}
            </option>
        @endforeach
    </select>

    <p>Title</p>
    <input type="text" name="title">

    <p>Keywords</p>
    <input type="text" name="keywords">

    <p>Description</p>
    <textarea name="description"></textarea>

    <p>Price</p>
    <input type="number" name="price">

    <p>Quantity</p>
    <input type="number" name="quantity">

    <p>Status</p>
    <input type="number" name="status" value="1">

    <br><br>

    <button type="submit">
        Save Product
    </button>

</form>

</body>
</html>

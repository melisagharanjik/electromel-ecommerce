<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>

<h1>Edit Product</h1>

<form action="{{ route('admin.product.update', $data->id) }}" method="post">

    @csrf

    <p>Category</p>
    <select name="category_id">

        @foreach($categories as $category)

            <option value="{{ $category->id }}"
                    @if($category->id == $data->category_id) selected @endif>

                {{ $category->title }}

            </option>

        @endforeach

    </select>

    <p>Title</p>
    <input type="text" name="title" value="{{ $data->title }}">

    <p>Keywords</p>
    <input type="text" name="keywords" value="{{ $data->keywords }}">

    <p>Description</p>
    <textarea name="description">{{ $data->description }}</textarea>

    <p>Price</p>
    <input type="number" name="price" value="{{ $data->price }}">

    <p>Quantity</p>
    <input type="number" name="quantity" value="{{ $data->quantity }}">

    <p>Status</p>
    <input type="number" name="status" value="{{ $data->status }}">

    <br><br>

    <button type="submit">
        Update Product
    </button>

</form>

</body>
</html>

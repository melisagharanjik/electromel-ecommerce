<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
</head>
<body>

<h1>Edit Category</h1>

<form action="{{ route('admin.category.update', $data->id) }}" method="post">

    @csrf

    <p>Title</p>
    <input type="text" name="title" value="{{ $data->title }}">

    <p>Keywords</p>
    <input type="text" name="keywords" value="{{ $data->keywords }}">

    <p>Description</p>
    <textarea name="description">{{ $data->description }}</textarea>

    <p>Status</p>
    <input type="number" name="status" value="{{ $data->status }}">

    <br><br>

    <button type="submit">
        Update Category
    </button>

</form>

</body>
</html>

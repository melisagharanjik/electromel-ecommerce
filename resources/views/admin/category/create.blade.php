<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
</head>
<body>

<h1>Add Category</h1>

<form action="{{ route('admin.category.store') }}" method="post">

    @csrf

    <p>Title</p>
    <input type="text" name="title">

    <p>Keywords</p>
    <input type="text" name="keywords">

    <p>Description</p>
    <textarea name="description"></textarea>

    <p>Status</p>
    <input type="number" name="status" value="1">

    <br><br>

    <button type="submit">
        Save Category
    </button>

</form>

</body>
</html>

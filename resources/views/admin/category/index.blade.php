<!DOCTYPE html>
<html>
<head>
    <title>Category List</title>
</head>
<body>

<h1>Category List</h1>

<a href="{{ route('admin.category.create') }}">Add Category</a>

<br><br>

@foreach($data as $row)

    <p>
        {{ $row->id }} - {{ $row->title }}

        <a href="{{ route('admin.category.edit', ['id' => $row->id]) }}">
            Edit
        </a>

        |

        <a href="{{ route('admin.category.delete', ['id' => $row->id]) }}"
           onclick="return confirm('Are you sure?')">
            Delete
        </a>
    </p>

@endforeach

</body>
</html>

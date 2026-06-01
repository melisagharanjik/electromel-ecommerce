<!DOCTYPE html>
<html>
<head>
    <title>Category List</title>
</head>
<body>

<h1>Category List</h1>

@foreach($data as $row)

    <p>
        {{ $row->id }}
        -
        {{ $row->title }}
    </p>

@endforeach

</body>
</html>

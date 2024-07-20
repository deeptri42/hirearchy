<!DOCTYPE html>
<html>
<head>
    <title>Category Details</title>

</head>
<body>
    <h1>Category Details</h1>

    <p><strong>Category Name:</strong> {{ $category->name }}</p>

    @if ($parent)
        <p><strong>Parent Category:</strong> {{ $parent->name }}</p>
    @else
        <p><strong>Parent Category:</strong> None</p>
    @endif

    @if ($children->isNotEmpty())
        <h2>Child Categories</h2>
        <ul>
            @foreach ($children as $child)
                <li>
                    {{ $child->name }}
                    <a href="{{ route('categories.show', $child->id) }}">View</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No child categories.</p>
    @endif

    <a href="{{ route('categories.index') }}">Back to Categories List</a>
</body>
</html>

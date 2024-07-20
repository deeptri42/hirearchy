<li id="{{ $category->id }}" class="mb-2">
    <div class="flex items-center">
        <span class="mr-2">{{ $category->name }}</span>
        <a href="{{ route('categories.show', $category->id) }}" class="bg-green-500 text-white px-2 py-1 rounded mr-2">View</a>
        <a href="{{ route('categories.edit', $category->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded mr-2">Edit</a>
        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
        </form>
    </div>
    @if ($category->children->isNotEmpty())
        <ul class="pl-5">
            @foreach ($category->children as $child)
                @include('categories.partials.category', ['category' => $child])
            @endforeach
        </ul>
    @endif
</li>

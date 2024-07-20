<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-white text-lg font-bold">Home</a>
        <div>
            <a href="{{ route('categories.index') }}" class="text-gray-300 hover:text-white px-3 py-2">Categories</a>
            <a href="{{ route('categories.create') }}" class="text-gray-300 hover:text-white px-3 py-2">Create Category</a>
        </div>
    </div>
</nav>

@extends('layouts.app')

@section('title', 'Categories')

@section('head')
@endsection

@section('content')
    <div class="container mx-auto mt-4 p-4">
        <h1 class="text-3xl font-bold mb-4">Categories</h1>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-3 inline-block">Create New Category</a>

        <ul id="category-list" class="list-group space-y-2">
            @foreach ($categories as $category)
                @include('categories.partials.category', ['category' => $category])
            @endforeach
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var el = document.getElementById('category-list');
            var sortable = Sortable.create(el, {
                onEnd: function(evt) {
                    var order = sortable.toArray();
                    fetch('{{ route('categories.order') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ order: order })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('Order updated successfully.');
                        }
                    });
                }
            });
        });
    </script>
@endsection

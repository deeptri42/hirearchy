@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Category</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name:</label>
            <input type="text" id="name" name="name" class="form-input mt-1 block w-full" value="{{ old('name', $category->name) }}" required>
        </div>

        <div class="mb-4">
            <label for="parent_id" class="block text-gray-700">Parent Category:</label>
            <select id="parent_id" name="parent_id" class="form-select mt-1 block w-full">
                <option value="">None</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $cat->id == old('parent_id', $category->parent_id) ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('categories.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded text-center inline-block">Back</a>

    </form>
@endsection

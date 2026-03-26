@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Book</h1>
        <a href="{{ route('admin.dashboard') }}" class="text-indigo-600 hover:text-indigo-800">&larr; Back</a>
    </div>

    <form action="{{ route('admin.books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>
        <div class="mb-4">
            <label for="author" class="block text-gray-700 font-medium mb-2">Author</label>
            <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
            <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('description', $book->description) }}</textarea>
        </div>
        <div class="flex gap-4 mb-4">
            <div class="w-1/2">
                <label for="price" class="block text-gray-700 font-medium mb-2">Price ($)</label>
                <input type="number" step="0.01" min="0" name="price" id="price" value="{{ old('price', $book->price) }}" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            </div>
            <div class="w-1/2">
                <label for="isbn" class="block text-gray-700 font-medium mb-2">ISBN</label>
                <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $book->isbn) }}" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
        </div>
        <div class="mb-6 flex items-center">
            <input type="checkbox" name="is_available" id="is_available" value="1" class="mr-2" {{ old('is_available', $book->is_available) ? 'checked' : '' }}>
            <label for="is_available" class="text-gray-700 font-medium">Is Available</label>
        </div>
        <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700">Update Book</button>
    </form>
</div>
@endsection

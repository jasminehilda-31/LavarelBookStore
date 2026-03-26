@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Admin Dashboard - Manage Books</h1>
        <a href="{{ route('admin.books.create') }}" class="bg-green-600 text-white font-bold py-2 px-4 rounded hover:bg-green-700">Add New Book</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-4 text-left font-semibold text-gray-600 border-b">Title</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-600 border-b">Author</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-600 border-b">Price</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-600 border-b">Status</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-600 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                    <tr class="hover:bg-gray-50 border-b">
                        <td class="py-3 px-4">{{ $book->title }}</td>
                        <td class="py-3 px-4">{{ $book->author }}</td>
                        <td class="py-3 px-4">${{ number_format($book->price, 2) }}</td>
                        <td class="py-3 px-4">
                            @if($book->is_available)
                                <span class="text-green-600 font-semibold text-sm bg-green-100 px-2 py-1 rounded">Available</span>
                            @else
                                <span class="text-red-600 font-semibold text-sm bg-red-100 px-2 py-1 rounded">Unavailable</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 flex space-x-2">
                            <a href="{{ route('admin.books.edit', $book) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form action="{{ route('admin.books.destroy', $book) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this book?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-4 px-4 text-center text-gray-500">No books found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="mt-6">
        {{ $books->links() }}
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 max-w-4xl mx-auto">
    <div class="flex flex-col md:flex-row gap-8">
        <div class="w-full md:w-2/3">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $book->title }}</h1>
            <p class="text-lg text-gray-600 mb-4">Author: <span class="font-semibold">{{ $book->author }}</span></p>
            
            <div class="bg-gray-50 p-4 rounded-md mb-6 border">
                <p class="text-2xl text-indigo-600 font-bold mb-2">${{ number_format($book->price, 2) }}</p>
                <p class="text-sm {{ $book->is_available ? 'text-green-600' : 'text-red-600' }} font-semibold">
                    {{ $book->is_available ? 'In Stock' : 'Out of Stock' }}
                </p>
                @if($book->isbn)
                    <p class="text-sm text-gray-500 mt-2">ISBN: {{ $book->isbn }}</p>
                @endif
            </div>
            
            <div class="prose max-w-none text-gray-700">
                <h3 class="text-xl font-semibold mb-2">Description</h3>
                <p>{{ $book->description ?: 'No description available for this book.' }}</p>
            </div>
        </div>
    </div>
    
    <div class="mt-8 pt-6 border-t flex justify-between">
        <a href="{{ route('books.index') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">&larr; Back to Collection</a>
    </div>
</div>
@endsection

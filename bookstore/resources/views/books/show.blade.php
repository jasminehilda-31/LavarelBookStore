@extends('layouts.app')

@section('content')
<div class="mb-6 flex items-center">
    <a href="{{ route('books.index') }}" class="text-indigo-600 hover:text-indigo-800 flex items-center transition-colors font-medium">
        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Back to Catalog
    </a>
</div>

<div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
    <div class="md:flex">
        <div class="md:w-1/3 bg-gray-50 flex items-center justify-center p-8 border-r border-gray-100">
            @if($book->cover_image)
                <img src="{{ Storage::url($book->cover_image) }}" alt="{{ $book->title }}" class="max-w-full h-auto max-h-96 rounded-lg shadow-md">
            @else
                <div class="w-full h-80 bg-gray-200 rounded-xl flex flex-col items-center justify-center text-gray-400 shadow-inner">
                    <svg class="w-24 h-24 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    <span class="font-medium text-lg">No Cover Image</span>
                </div>
            @endif
        </div>
        <div class="p-8 md:w-2/3 flex flex-col">
            <div class="flex justify-between items-start mb-4">
                <h1 class="text-4xl font-extrabold text-gray-900 leading-tight">{{ $book->title }}</h1>
                <div class="bg-indigo-50 text-indigo-700 px-4 py-2 rounded-xl text-2xl font-black shadow-sm ml-4">
                    ${{ number_format($book->price, 2) }}
                </div>
            </div>
            
            <p class="text-xl text-gray-600 mb-6 font-medium border-b pb-4">By <span class="text-indigo-600">{{ $book->author }}</span></p>
            
            <div class="prose max-w-none text-gray-700 mb-8 leading-relaxed flex-grow">
                @if($book->description)
                    {!! nl2br(e($book->description)) !!}
                @else
                    <p class="italic text-gray-400">No description available.</p>
                @endif
            </div>
            
            <div class="grid grid-cols-2 gap-4 mt-auto border-t pt-6 text-sm">
                <div>
                    <span class="text-gray-500 block mb-1">Status</span>
                    @if($book->is_available)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800">
                            <span class="w-2 h-2 mr-1.5 bg-green-500 rounded-full"></span>
                            In Stock
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-800">
                            <span class="w-2 h-2 mr-1.5 bg-red-500 rounded-full"></span>
                            Out of Stock
                        </span>
                    @endif
                </div>
                <div>
                    <span class="text-gray-500 block mb-1">ISBN</span>
                    <span class="font-mono text-gray-800 bg-gray-100 px-2 py-1 rounded">{{ $book->isbn ?? 'N/A' }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
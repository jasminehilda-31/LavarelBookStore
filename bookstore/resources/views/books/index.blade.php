@extends('layouts.app')

@section('content')
<div class="flex justify-between items-end mb-8 border-b pb-4 mt-6">
    <h1 class="text-4xl font-extrabold text-gray-800">Book Catalog</h1>
    <p class="text-gray-500 text-sm">{{ $books->total() }} available books</p>
</div>

@if(!empty($recommendedBooks))
    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-indigo-100 p-6 rounded-2xl mb-12 shadow-sm">
        <div class="flex items-center mb-6">
            <svg class="w-6 h-6 text-indigo-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            <h2 class="text-2xl font-bold text-indigo-900">Recommended for You <span class="text-sm font-normal text-indigo-600 ml-2">(Powered by Google Books API)</span></h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($recommendedBooks as $googleBook)
                <div class="bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition-shadow group cursor-pointer border border-transparent hover:border-indigo-100">
                    <div class="relative overflow-hidden rounded-lg mb-4 flex justify-center bg-gray-50 p-2 h-48">
                        @if(isset($googleBook['volumeInfo']['imageLinks']['thumbnail']))
                            <img src="{{ $googleBook['volumeInfo']['imageLinks']['thumbnail'] }}" alt="Cover" class="h-full object-contain transform group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            </div>
                        @endif
                    </div>
                    <h3 class="font-bold text-gray-800 text-base mb-1 truncate" title="{{ $googleBook['volumeInfo']['title'] ?? 'Unknown' }}">
                        {{ $googleBook['volumeInfo']['title'] ?? 'Unknown' }}
                    </h3>
                    <p class="text-sm text-gray-500 truncate">
                        {{ isset($googleBook['volumeInfo']['authors']) ? implode(', ', $googleBook['volumeInfo']['authors']) : 'Unknown Author' }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
@endif

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
    @forelse($books as $book)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
            <div class="relative overflow-hidden h-64 bg-gradient-to-br from-gray-50 to-gray-200">
                @if($book->cover_image)
                    <img src="{{ Storage::url($book->cover_image) }}" alt="{{ $book->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                @else
                    <div class="w-full h-full flex flex-col items-center justify-center text-gray-400">
                        <svg class="w-16 h-16 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        <span class="text-sm font-medium">No Cover</span>
                    </div>
                @endif
                <div class="absolute top-4 right-4 bg-white/95 backdrop-blur text-gray-800 text-sm font-bold px-3 py-1 rounded-full shadow-md">
                    ${{ number_format($book->price, 2) }}
                </div>
            </div>
            
            <div class="p-6 flex-grow flex flex-col">
                <h2 class="text-xl font-bold text-gray-800 mb-1 leading-tight group-hover:text-indigo-600 transition-colors line-clamp-2" title="{{ $book->title }}">{{ $book->title }}</h2>
                <p class="text-sm text-gray-500 mb-4 font-medium block">by {{ $book->author }}</p>
                
                <p class="text-gray-600 text-sm flex-grow mb-6 leading-relaxed line-clamp-3">
                    {{ $book->description ?? 'No description available for this book.' }}
                </p>
                
                <div class="mt-auto">
                    <a href="{{ route('books.show', $book) }}" class="block w-full text-center bg-indigo-50 hover:bg-indigo-600 text-indigo-700 hover:text-white font-semibold py-2.5 px-4 rounded-xl transition-colors duration-300">View Details</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full py-20 text-center">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gray-50 mb-4 text-gray-400">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-700 mb-2">No books found</h3>
            <p class="text-gray-500 max-w-sm mx-auto">We couldn't find any books in our catalog at the moment. Please check back later.</p>
        </div>
    @endforelse
</div>

<div class="mt-12 flex justify-center">
    {{ $books->links() }}
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Our Collection</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($books as $book)
            <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col">
                <div class="p-4 flex-grow">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $book->title }}</h2>
                    <p class="text-gray-600 mb-2">by {{ $book->author }}</p>
                    <p class="text-indigo-600 font-bold mb-4">${{ number_format($book->price, 2) }}</p>
                </div>
                <div class="bg-gray-50 p-4 border-t">
                    <a href="{{ route('books.show', $book) }}" class="text-indigo-600 hover:text-indigo-800 font-medium">View Details &rarr;</a>
                </div>
            </div>
        @empty
            <div class="col-span-full py-8 text-center text-gray-500">
                <p>No books available right now.</p>
            </div>
        @endforelse
    </div>
    
    <div class="mt-8">
        {{ $books->links() }}
    </div>
</div>

@if(!empty($recommendedBooks))
<div class="mt-12 bg-indigo-50 p-6 rounded-lg">
    <h2 class="text-2xl font-bold text-indigo-900 mb-6">Recommended Programming Books (Powered by Google Books API)</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        @foreach($recommendedBooks as $apiBook)
            @php $volInfo = $apiBook['volumeInfo'] ?? []; @endphp
            <div class="bg-white rounded-lg shadow-sm overflow-hidden p-4">
                @if(isset($volInfo['imageLinks']['thumbnail']))
                    <img src="{{ $volInfo['imageLinks']['thumbnail'] }}" alt="Cover" class="h-32 object-contain mb-4 mx-auto">
                @endif
                <h3 class="font-semibold text-gray-800 line-clamp-2" title="{{ $volInfo['title'] ?? 'Unknown' }}">
                    {{ $volInfo['title'] ?? 'Unknown Title' }}
                </h3>
                <p class="text-sm text-gray-600 mt-1">
                    {{ isset($volInfo['authors']) ? implode(', ', $volInfo['authors']) : 'Unknown Author' }}
                </p>
            </div>
        @endforeach
    </div>
</div>
@endif

@endsection

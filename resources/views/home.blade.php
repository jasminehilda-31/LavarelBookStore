@extends('layouts.app')

@section('content')
<div class="text-center py-12">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Welcome to the Online Book Store</h1>
    <p class="text-lg text-gray-600 mb-8">Discover your next great read.</p>
    <a href="{{ route('books.index') }}" class="bg-indigo-600 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700">Browse Our Collection</a>
</div>

<!-- Displaying some generic random content or you could also load Google Books directly via API here using JS if preferred -->
<div class="mt-12 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">About Us</h2>
    <p class="text-gray-600">This is a simple online book store application built with Laravel and Tailwind CSS for the interview task.</p>
</div>
@endsection

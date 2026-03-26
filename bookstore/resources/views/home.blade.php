@extends('layouts.app')

@section('content')
<div class="text-center py-20 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl shadow-lg text-white">
    <h1 class="text-5xl font-extrabold mb-6">Welcome to Laravel Book Store</h1>
    <p class="text-xl font-light mb-10 max-w-2xl mx-auto">Discover your next great read with our perfectly crafted interactive UI. Find trending books, bestsellers, and manage your collections seamlessly.</p>
    <a href="{{ route('books.index') }}" class="bg-white text-indigo-600 font-bold py-3 px-8 rounded-full shadow-lg hover:bg-gray-100 transition duration-300">Browse Our Collection</a>
</div>

<div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8">
    <div class="bg-white p-8 rounded-xl shadow-md transform hover:-translate-y-1 transition duration-300">
        <div class="text-indigo-500 mb-4">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Extensive Library</h2>
        <p class="text-gray-600">Explore a vast collection of books tailored to your interests, beautifully presented with a powerful and interactive user interface.</p>
    </div>
    <div class="bg-white p-8 rounded-xl shadow-md transform hover:-translate-y-1 transition duration-300">
        <div class="text-purple-500 mb-4">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Lightning Fast</h2>
        <p class="text-gray-600">Experience a fluid and dynamic browsing experience engineered on top of the robust Laravel framework.</p>
    </div>
</div>
@endsection

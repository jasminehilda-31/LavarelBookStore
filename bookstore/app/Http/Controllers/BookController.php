<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{
    public function index()
    {
        // Fetch recommendations from Google Books API
        $recommendedBooks = [];
        try {
            $response = Http::timeout(5)->get('https://www.googleapis.com/books/v1/volumes?q=programming+laravel&maxResults=4');
            if ($response->successful()) {
                $recommendedBooks = $response->json()['items'] ?? [];
            }
        } catch (\Exception $e) {
            // Silently fail if API is down
        }

        $books = Book::where('is_available', true)->latest()->paginate(12);
        
        return view('books.index', compact('books', 'recommendedBooks'));
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $books = Book::latest()->paginate(10);
        return view('admin.dashboard', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'isbn' => 'nullable|string|max:13',
            'is_available' => 'boolean'
        ]);

        $validated['is_available'] = $request->has('is_available');

        Book::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Book created successfully.');
    }

    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'isbn' => 'nullable|string|max:13',
            'is_available' => 'boolean'
        ]);

        $validated['is_available'] = $request->has('is_available');

        $book->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Book deleted successfully.');
    }
}

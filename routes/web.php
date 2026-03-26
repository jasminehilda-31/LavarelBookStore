<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

Auth::routes(); // The user will need Laravel UI or Breeze, but we can provide basic Auth routes manually or ask them to use Breeze.
// Wait, the task says "basic login optional" or "users (basic login optional)". I can just make basic login views or use Laravel UI.
// For simplicity, let's just make an admin login route manually.

Route::get('/admin/login', function() {
    return view('admin.login');
})->name('admin.login');

Route::post('/admin/login', function(\Illuminate\Http\Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('admin.dashboard');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
});

Route::post('/admin/logout', function(\Illuminate\Http\Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('admin.logout');

// Admin Routes protected by a closure middleware checking if the user is_admin
Route::middleware(['auth', function ($request, $next) {
    if (!Auth::user() || !Auth::user()->is_admin) {
        abort(403, 'Unauthorized access.');
    }
    return $next($request);
}])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/books/create', [AdminController::class, 'create'])->name('books.create');
    Route::post('/books', [AdminController::class, 'store'])->name('books.store');
    Route::get('/books/{book}/edit', [AdminController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}', [AdminController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [AdminController::class, 'destroy'])->name('books.destroy');
});

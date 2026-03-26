<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookStoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_loads_correctly()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Welcome to the Online Book Store');
    }

    public function test_books_index_displays_available_books()
    {
        Book::factory()->create([
            'title' => 'Test Book 1',
            'is_available' => true,
        ]);

        $response = $this->get('/books');
        $response->assertStatus(200);
        $response->assertSee('Test Book 1');
    }

    public function test_admin_dashboard_is_protected()
    {
        $response = $this->get('/admin/dashboard');
        $response->assertStatus(403); // Or redirect depending on auth handling
    }

    public function test_admin_can_access_dashboard()
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->get('/admin/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Admin Dashboard - Manage Books');
    }

    public function test_admin_can_create_book()
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/books', [
            'title' => 'New Admin Book',
            'author' => 'Author Name',
            'description' => 'Test Description',
            'price' => 19.99,
            'is_available' => 1,
        ]);

        $response->assertRedirect('/admin/dashboard');
        $this->assertDatabaseHas('books', ['title' => 'New Admin Book']);
    }
}

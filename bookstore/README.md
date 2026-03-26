# Laravel Book Store

A beautiful, interactive, and fully functional online book store built with Laravel and Tailwind CSS.

## Features

- **Powerful UI/UX**: Clean, responsive, and interactive design built with Tailwind CSS.
- **Dynamic Book Catalog**: Browse an extensive library of books with beautiful cover designs and detailed individual book pages.
- **Admin Dashboard**: Secure administrative area to Add, Edit, and Delete books from the catalog. Manage book availability, prices, and descriptions.
- **API Integration**: Integrated seamlessly with the Google Books API to automatically fetch and display contextual book recommendations on the catalog page.
- **Testing**: Comprehensive feature tests ensuring high reliability and code quality.

## Prerequisites

- PHP >= 8.1
- Composer
- Node.js & NPM (optional, for advanced frontend compilation if needed, though Tailwind is used via CDN for simplicity)
- SQLite (configured by default) or MySQL

## Installation & Setup Instructions

Follow these instructions to get the project up and running locally.

### 1. Clone or Extract the Project
Navigate to the project root directory in your terminal:
```bash
cd bookstore
```

### 2. Install Backend Dependencies
Run Composer to install all the required PHP packages:
```bash
composer install
```

### 3. Environment Setup
Copy the example environment file and generate a new application encryption key:
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Configuration & Migrations
By default, the application is set up to use SQLite. Run the following command to run the migrations and seed the database with initial users:
```bash
php artisan migrate
```

### 5. Create an Admin User
To access the admin dashboard, you need an administrator account. Run Laravel Tinker:
```bash
php artisan tinker
```
Then, execute the following command inside Tinker to create the admin user:
```php
App\Models\User::create(['name' => 'Admin', 'email' => 'admin@admin.com', 'password' => Hash::make('password'), 'is_admin' => true]);
```
*Note: The `is_admin` attribute explicitly gives this user access to the restricted admin dashboard.*

### 6. Start the Local Server
Run Laravel's built-in development server:
```bash
php artisan serve
```
You can now visit the application in your browser at:
`http://localhost:8000`

## Accessing the Admin Dashboard

- Navigate to `http://localhost:8000/admin/login`
- **Email:** `admin@admin.com`
- **Password:** `password`

## Running Tests

To run the automated test suite, use the following command:
```bash
php artisan test
```
All feature and unit tests will execute to verify that the application and its admin protections are functioning correctly.

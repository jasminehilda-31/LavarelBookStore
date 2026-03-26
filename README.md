# Online Book Store - Laravel Interview Task

## Prerequisites
1. **PHP >= 8.1** (You can install via PowerShell: `winget install --id=PHP.PHP -e`)
2. **Composer** (You can install via PowerShell: `winget install --id=Composer.Composer -e`)
3. **Node.js & NPM** (For compiling frontend assets, via `winget install OpenJS.NodeJS`)
4. **MySQL or SQLite** (MySQL is recommended as per task guidelines)

## Setup Instructions

### 1. Create a Fresh Laravel Project
Open a new PowerShell window (so PATH changes take effect if you just installed PHP/Composer), and run:
```bash
composer create-project laravel/laravel bookstore
cd bookstore
```

### 2. Copy Provided Source Files
Copy all the directories provided (`app`, `database`, `resources`, `routes`) from the `D:\BookStore` directory and merge them into your new `bookstore` Laravel directory. This will overwrite and add the custom files to your project.

### 3. Database Configuration
By default, the `.env` file in the fresh Laravel project will use SQLite. If you want to use SQLite, you don't need to change anything. 
If you want to use MySQL, open your `.env` file and update:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bookstore
DB_USERNAME=root
DB_PASSWORD=
```
Make sure you create a database named `bookstore` in MySQL before continuing.

### 4. Run Migrations & Seed Admin User
```bash
php artisan migrate
```
After migrating, register an admin user manually via tinker, or use the provided tinker command:
```bash
php artisan tinker
User::create(['name'=>'Admin', 'email'=>'admin@admin.com', 'password'=>Hash::make('password'), 'is_admin'=>true]);
```
*(Note: A migration has been provided that automatically adds the `is_admin` column to the users table.)*

### 5. Install Frontend Dependencies
```bash
npm install
npm run build
```
*(Tailwind is used via CDN in our layout file for simplicity so you don't actually have to compile assets for the basic views, but it's good practice).*

### 6. Run the Application
```bash
php artisan serve
```
Visit `http://localhost:8000/`

## Features Included
- **UI/UX**: Clean responsive UI using Blade & TailwindCSS via CDN.
- **Pages**: Home page, Book listing page, Book details page.
- **Admin**: Dashboard, Add, Edit, Delete Books (Protected by `is_admin` auth middleware).
- **Database**: Relational DB schema (Books, Users).
- **API**: Google Books API integration to fetch and display random book recommendations on the Home page.

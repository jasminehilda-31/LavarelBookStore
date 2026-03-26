<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Book Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal flex flex-col min-h-screen">
    <nav class="bg-indigo-600 p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-white text-2xl font-extrabold tracking-tight">Laravel Book Store</a>
            <div>
                <a href="{{ route('books.index') }}" class="text-white hover:text-gray-200 px-3">Browse Books</a>
                @auth
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-gray-200 px-3">Admin Dashboard</a>
                    @endif
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-white hover:text-gray-200 px-3">Logout</button>
                    </form>
                @else
                    <a href="{{ route('admin.login') }}" class="text-white hover:text-gray-200 px-3">Admin Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-8 px-4 flex-grow">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-gray-800 p-4 mt-8">
        <div class="container mx-auto text-center text-white">
            <p>&copy; {{ date('Y') }} Laravel Book Store. Built with powerful UI components.</p>
        </div>
    </footer>
</body>
</html>

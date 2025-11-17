<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jestli</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">

<div class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r shadow-md flex flex-col p-6">
        <h1 class="text-2xl font-bold mb-6 " style="color:#106849">Jestli</h1>

        <nav class="space-y-3 flex-1">
            <a href="{{ route('dashboard') }}" class="block py-2 px-3 rounded-lg hover:bg-gray-100">🏠 Feed</a>
            <a href="{{ route('posts.create') }}" class="block py-2 px-3 rounded-lg hover:bg-gray-100">➕ New Post</a>
            <a href="{{ route('explore') }}" class="block py-2 px-3 rounded-lg hover:bg-gray-100">🌎 Explore</a>
            <a href="{{ route('profile.show', auth()->user()->id) }}" class="block py-2 px-3 rounded-lg hover:bg-gray-100">👤 Profile</a>
        </nav>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-red-600 font-semibold hover:text-red-800">
                Logout
            </button>
        </form>
    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col overflow-y-auto">

        <!-- Top bar -->
        <header class="bg-white shadow px-6 py-4 flex items-center justify-between">
            <!-- Search -->
            <form action="{{ route('search') }}" method="GET" class="w-1/2">
                <input type="text" name="q" placeholder="Search posts or users..."
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-300 focus:outline-none">
            </form>

            <!-- Right section -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('profile.show', auth()->user()->id) }}" class="font-semibold hover:text-blue-600">
                    {{ auth()->user()->name }}
                </a>
                <a href="{{ route('profile.edit', auth()->user()->id) }}" class="text-gray-500 hover:text-blue-500">⚙️</a>
            </div>
        </header>

        <!-- Page content -->
        <main class="flex-1 p-6 overflow-y-auto">
            @yield('content')
        </main>
    </div>
</div>

</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Polindra Event Hub' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100">

    <!-- 🔹 Navbar -->
    <nav class="bg-blue-600 text-white px-6 py-3 flex justify-between items-center shadow-md">
        <a href="/" class="text-lg font-semibold hover:text-gray-200">
            Polindra Event Hub
        </a>

        <div class="flex items-center space-x-3">
            @auth
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-white text-blue-600 px-3 py-1 rounded hover:bg-gray-100">
                        Keluar
                    </button>
                </form>
            @endauth

            @guest
                <a href="/login" class="bg-white text-blue-600 px-3 py-1 rounded hover:bg-gray-100">
                    Masuk
                </a>
            @endguest
        </div>
    </nav>

    <!-- 🔹 Konten utama -->
    <main class="container mx-auto p-6">
        {{ $slot ?? '' }}
    </main>

    @livewireScripts
</body>
</html>

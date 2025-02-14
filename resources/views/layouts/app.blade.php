<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Habitants</title>
    <!-- Link to Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4">
        <!-- Navbar -->
        <nav class="bg-white shadow-md p-4">
            <div class="flex items-center justify-between">
                <a class="text-2xl font-semibold text-blue-600" href="{{ url('/') }}">Accueil</a>
                <div class="space-x-4">
                    <a href="{{ route('habitants.index') }}" class="text-lg text-gray-700 hover:text-blue-600">Habitants</a>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="mt-6">
            @yield('content')
        </div>
    </div>
</body>
</html>

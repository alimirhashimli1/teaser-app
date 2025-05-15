<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teaser App</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="w-full max-w-xs mx-auto flex flex-col items-center justify-center gap-8">
        <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 text-center mb-2">
            Welcome to the Teaser App
        </h1>
        <div class="w-full flex flex-col gap-4">
            <a href="{{ route('login') }}"
               class="w-full text-center py-3 rounded-lg bg-gray-900 text-white text-lg font-semibold shadow-md hover:bg-gray-800 transition">
                Login
            </a>
            <a href="{{ route('register') }}"
               class="w-full text-center py-3 rounded-lg bg-white text-gray-900 border border-gray-300 text-lg font-semibold shadow-md hover:bg-gray-50 transition">
                Register
            </a>
        </div>
    </div>
</body>
</html>

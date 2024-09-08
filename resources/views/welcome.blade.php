<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Interactive Storytelling') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-xl font-bold text-gray-800">
                <a href="{{ route('welcome') }}">{{ config('app.name', 'Interactive Storytelling') }}</a>
            </div>
            <div>
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 px-4">Login</a>
                <a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900 px-4">Register</a>
            </div>
        </div>
    </nav>

    <header class="bg-cover bg-center h-screen" style="background-image: url('https://example.com/hero-background.jpg');">
        <div class="bg-black bg-opacity-50 h-full flex items-center justify-center">
            <div class="text-center text-white px-6 md:px-12">
                <h1 class="text-4xl md:text-6xl font-bold">Welcome to the World of Interactive Storytelling</h1>
                <p class="mt-6 text-lg md:text-2xl">Create, explore, and experience stories like never before.</p>
                <div class="mt-8">
                    <a href="{{ route('register') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-lg mr-4">Get Started</a>
                </div>
            </div>
        </div>
    </header>

    <section class="py-12 bg-gray-100">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Why Choose Interactive Storytelling?</h2>
            <div class="flex flex-wrap justify-center">
                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11h-6m-2 4H5m2-4H5m14-4h-6m-2-4H5m2 4H5" />
                        </svg>
                        <h3 class="text-xl font-bold mb-2">Branching Narratives</h3>
                        <p class="text-gray-600">Craft stories with multiple outcomes and empower readers to choose their own path.</p>
                    </div>
                </div>

                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7l6 6-6 6M21 7l-6 6 6 6" />
                        </svg>
                        <h3 class="text-xl font-bold mb-2">Engage Your Audience</h3>
                        <p class="text-gray-600">Make your stories interactive and keep your readers immersed in unique storytelling experiences.</p>
                    </div>
                </div>

                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-.883-.993L12 5a1 1 0 00-1 1v10a1 1 0 00.883.993L12 17a1 1 0 001-1zm-1 4h.01" />
                        </svg>
                        <h3 class="text-xl font-bold mb-2">Track Reader Insights</h3>
                        <p class="text-gray-600">Analyze how readers interact with your stories and improve based on real-time feedback.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-indigo-600 py-12">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-white">Start Your Storytelling Journey Now</h2>
            <p class="text-indigo-200 mt-4">Sign up today and start creating your own interactive stories.</p>
            <a href="{{ route('register') }}" class="bg-white text-indigo-600 hover:bg-gray-100 font-semibold py-3 px-6 rounded-lg mt-6 inline-block">Get Started</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 py-6">
        <div class="container mx-auto px-6 text-center text-gray-400">
            <p>&copy; {{ date('Y') }} Iqbal Ahmed Jhimel. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
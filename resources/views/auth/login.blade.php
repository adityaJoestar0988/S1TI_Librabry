<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - S1TI Library</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-gray-900 dark:to-gray-800 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl p-8 border border-gray-200 dark:border-gray-700">
            <div class="text-center mb-8">
                <div class="inline-block bg-gradient-to-br from-blue-600 to-blue-800 rounded-full p-4 mb-4 shadow-lg">
                    <span class="text-4xl">📚</span>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">S1TI Library</h1>
                <p class="text-gray-600 dark:text-gray-400">Sistem Informasi Perpustakaan</p>
            </div>

            @if(session('success'))
                <div class="bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-600 text-green-800 dark:text-green-200 px-4 py-3 rounded-lg mb-6 flex items-center gap-2">
                    <span>✓</span>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-600 text-red-800 dark:text-red-200 px-4 py-3 rounded-lg mb-6 flex items-center gap-2">
                    <span>✕</span>
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">📧 Email Address</label>
                    <input type="email" name="email" id="email" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 transition @error('email') border-red-500 dark:border-red-500 @enderror" placeholder="your@email.com" value="{{ old('email') }}" required>
                    @error('email')
                        <p class="text-red-500 dark:text-red-400 text-sm mt-2 flex items-center gap-1"><span>⚠️</span> {{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">🔐 Password</label>
                    <input type="password" name="password" id="password" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 transition @error('password') border-red-500 dark:border-red-500 @enderror" placeholder="••••••••" required>
                    @error('password')
                        <p class="text-red-500 dark:text-red-400 text-sm mt-2 flex items-center gap-1"><span>⚠️</span> {{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="w-4 h-4 text-blue-600 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded focus:ring-2 focus:ring-blue-500 cursor-pointer">
                    <label for="remember" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-300 cursor-pointer">Remember me</label>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-bold py-3 px-4 rounded-lg shadow-lg transition transform hover:scale-105 active:scale-95 mt-6">🔓 Login</button>
            </form>

            <div class="flex items-center gap-4 my-6">
                <div class="flex-1 h-px bg-gray-300 dark:bg-gray-600"></div>
                <span class="text-gray-500 dark:text-gray-400 text-sm">or</span>
                <div class="flex-1 h-px bg-gray-300 dark:bg-gray-600"></div>
            </div>

            <a href="{{ url('/') }}" class="block text-center text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 font-semibold transition">← Back to Home</a>
        </div>
    </div>
</body>
</html>        
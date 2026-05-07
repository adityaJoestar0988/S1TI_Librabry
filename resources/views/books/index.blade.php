<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Buku</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gray-900">
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 bg-white dark:bg-gray-800 shadow-md z-50 border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center">
                    <span class="text-lg font-bold text-white">📚</span>
                </div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">S1TI Library</h1>
            </div>
            <div class="flex items-center gap-6">
                <a href="{{ route('books.index') }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 font-semibold">📖 Buku</a>
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('book-types.index') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium">⚙️ Kategori</a>
                @endif
                <a href="{{ route('transactions.index') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium">📋 Peminjaman</a>
                <div class="flex items-center gap-3 pl-6 border-l border-gray-300 dark:border-gray-600">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 capitalize">{{ auth()->user()->role }}</p>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-semibold text-sm transition">🚪 Keluar</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-20 pb-12">
        <div class="max-w-6xl mx-auto px-4">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Master Buku</h2>
                    <p class="text-gray-600 dark:text-gray-400">Kelola koleksi buku perpustakaan Anda</p>
                </div>
                <a href="{{ route('books.create') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-200 flex items-center gap-2">
                    <span>➕</span> Tambah Buku
                </a>
            </div>

            <!-- Success Alert -->
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-600 text-green-700 p-4 rounded-lg mb-6 flex items-center justify-between animate-pulse">
                    <div class="flex items-center gap-3">
                        <span class="text-xl">✓</span>
                        <p>{{ session('success') }}</p>
                    </div>
                    <button onclick="this.parentElement.style.display='none'" class="text-green-700 hover:text-green-900">
                        ✕
                    </button>
                </div>
            @endif
        </div>

        <!-- Books Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            @forelse($books as $book)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-xl hover:scale-105 transition-all duration-300 overflow-hidden group">
                    <!-- Book Image -->
                    <div class="h-48 bg-gradient-to-br from-blue-500 to-purple-600 overflow-hidden relative">
                        @if($book->image)
                            <img src="{{ asset('storage/' . $book->image) }}" 
                                 alt="{{ $book->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-white">
                                <div class="text-center">
                                    <span class="text-5xl">�</span>
                                    <p class="text-sm mt-2">No Image</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Book Info -->
                    <div class="p-5">
                        <!-- Title -->
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 line-clamp-2">
                            {{ $book->title }}
                        </h3>

                        <!-- Book Type Badge -->
                        <div class="mb-3">
                            <span class="inline-block bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 text-xs font-semibold px-3 py-1 rounded-full">
                                {{ $book->bookType->name }}
                            </span>
                        </div>

                        <!-- Synopsis -->
                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-3">
                            {{ $book->synopsis ?? 'Tidak ada deskripsi' }}
                        </p>

                        <!-- Actions -->
                        <div class="flex gap-2 border-t border-gray-200 dark:border-gray-700 pt-4">
                            <a href="{{ route('books.edit', $book) }}" 
                               class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-200 text-center text-sm">
                                ✏️ Edit
                            </a>
                            @if(auth()->user()->role == "admin")
                                <form action="{{ route('books.destroy', $book) }}" method="POST" class="flex-1"
                                    onsubmit="return confirm('Yakin ingin hapus buku ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-200 text-sm">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="bg-white dark:bg-gray-800 rounded-lg p-12 text-center">
                        <span class="text-6xl mb-4 block">📚</span>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Tidak ada buku</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">Mulai tambahkan buku ke perpustakaan Anda</p>
                        <a href="{{ route('books.create') }}" 
                           class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition-all duration-200">
                            Tambah Buku Pertama
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="flex justify-center">
            {{ $books->links() }}
        </div>
    </div>
</body>

</html>
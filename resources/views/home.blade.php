<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S1TI Library - Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    <!-- Header/Navbar -->
    <nav class="fixed top-0 left-0 right-0 bg-white dark:bg-gray-800 shadow-md z-50 border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-800 rounded-full flex items-center justify-center shadow-lg">
                    <span class="text-xl font-bold text-white">📚</span>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">S1TI Library</h1>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Knowledge Hub</p>
                </div>
            </div>

            <!-- Nav Links -->
            <div class="flex items-center gap-6">
                @auth
                    <a href="{{ route('books.index') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition">
                        📖 Buku
                    </a>
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('book-types.index') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition">
                            ⚙️ Jenis Buku
                        </a>
                    @endif
                    <a href="{{ route('transactions.index') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition">
                        📋 Peminjaman
                    </a>

                    <!-- User Menu -->
                    <div class="flex items-center gap-3 pl-6 border-l border-gray-300 dark:border-gray-600">
                        <div class="text-right">
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 capitalize">{{ auth()->user()->role }}</p>
                        </div>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-semibold text-sm transition shadow-md">
                                🚪 Keluar
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 font-medium transition">
                        Masuk
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-20 pb-12">
        <div class="max-w-6xl mx-auto px-4">
            @auth
                <!-- Welcome Section -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 mb-8 border-l-4 border-blue-600">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                        👋 Selamat datang, {{ auth()->user()->name }}!
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400 text-lg">
                        Selamat datang di S1TI Library. Jelajahi koleksi buku kami dan kelola peminjaman Anda.
                    </p>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Total Books -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 hover:shadow-lg transition">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm font-semibold mb-1">Total Buku</p>
                                <h3 class="text-4xl font-bold text-gray-900 dark:text-white">
                                    @php
                                        $bookCount = \App\Models\Book::count();
                                        echo $bookCount;
                                    @endphp
                                </h3>
                            </div>
                            <div class="bg-blue-100 dark:bg-blue-900 p-4 rounded-lg">
                                <span class="text-3xl">📚</span>
                            </div>
                        </div>
                    </div>

                    <!-- My Borrowed -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 hover:shadow-lg transition">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm font-semibold mb-1">Sedang Dipinjam</p>
                                <h3 class="text-4xl font-bold text-gray-900 dark:text-white">
                                    @php
                                        $borrowedCount = \App\Models\Transaction::where('user_id', auth()->id())
                                            ->where('status', 'borrowed')
                                            ->count();
                                        echo $borrowedCount;
                                    @endphp
                                </h3>
                            </div>
                            <div class="bg-yellow-100 dark:bg-yellow-900 p-4 rounded-lg">
                                <span class="text-3xl">📖</span>
                            </div>
                        </div>
                    </div>

                    <!-- Total Types -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 hover:shadow-lg transition">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm font-semibold mb-1">Kategori Buku</p>
                                <h3 class="text-4xl font-bold text-gray-900 dark:text-white">
                                    @php
                                        $typeCount = \App\Models\BookType::count();
                                        echo $typeCount;
                                    @endphp
                                </h3>
                            </div>
                            <div class="bg-green-100 dark:bg-green-900 p-4 rounded-lg">
                                <span class="text-3xl">🏷️</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <!-- Explore Books -->
                    <div class="bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl shadow-lg p-8 text-white hover:shadow-xl transition">
                        <h3 class="text-2xl font-bold mb-3">📚 Jelajahi Buku</h3>
                        <p class="text-blue-100 mb-6">Temukan buku-buku menarik dalam koleksi perpustakaan kami yang lengkap.</p>
                        <a href="{{ route('books.index') }}" class="inline-block bg-white text-blue-600 hover:bg-blue-50 font-bold py-3 px-6 rounded-lg transition shadow-md">
                            Lihat Semua Buku →
                        </a>
                    </div>

                    <!-- My Transactions -->
                    <div class="bg-gradient-to-br from-purple-500 to-purple-700 rounded-xl shadow-lg p-8 text-white hover:shadow-xl transition">
                        <h3 class="text-2xl font-bold mb-3">📋 Riwayat Peminjaman</h3>
                        <p class="text-purple-100 mb-6">Kelola dan pantau semua peminjaman buku Anda dengan mudah.</p>
                        <a href="{{ route('transactions.index') }}" class="inline-block bg-white text-purple-600 hover:bg-purple-50 font-bold py-3 px-6 rounded-lg transition shadow-md">
                            Lihat Riwayat →
                        </a>
                    </div>

                    @if(auth()->user()->role === 'admin')
                        <!-- Manage Book Types -->
                        <div class="bg-gradient-to-br from-orange-500 to-orange-700 rounded-xl shadow-lg p-8 text-white hover:shadow-xl transition">
                            <h3 class="text-2xl font-bold mb-3">⚙️ Kelola Kategori</h3>
                            <p class="text-orange-100 mb-6">Tambah, edit, atau hapus kategori buku dalam sistem.</p>
                            <a href="{{ route('book-types.index') }}" class="inline-block bg-white text-orange-600 hover:bg-orange-50 font-bold py-3 px-6 rounded-lg transition shadow-md">
                                Manajemen Kategori →
                            </a>
                        </div>

                        <!-- Add New Book -->
                        <div class="bg-gradient-to-br from-pink-500 to-pink-700 rounded-xl shadow-lg p-8 text-white hover:shadow-xl transition">
                            <h3 class="text-2xl font-bold mb-3">➕ Tambah Buku</h3>
                            <p class="text-pink-100 mb-6">Tambahkan buku baru ke dalam koleksi perpustakaan.</p>
                            <a href="{{ route('books.create') }}" class="inline-block bg-white text-pink-600 hover:bg-pink-50 font-bold py-3 px-6 rounded-lg transition shadow-md">
                                Tambah Buku Baru →
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Quick Links -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-8">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">⚡ Akses Cepat</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <a href="{{ route('books.index') }}" class="bg-gray-100 dark:bg-gray-700 hover:bg-blue-100 dark:hover:bg-blue-900 text-center p-4 rounded-lg transition font-semibold text-gray-900 dark:text-white">
                            📖 Daftar Buku
                        </a>
                        <a href="{{ route('transactions.index') }}" class="bg-gray-100 dark:bg-gray-700 hover:bg-purple-100 dark:hover:bg-purple-900 text-center p-4 rounded-lg transition font-semibold text-gray-900 dark:text-white">
                            📋 Peminjaman
                        </a>
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('book-types.index') }}" class="bg-gray-100 dark:bg-gray-700 hover:bg-orange-100 dark:hover:bg-orange-900 text-center p-4 rounded-lg transition font-semibold text-gray-900 dark:text-white">
                                🏷️ Kategori
                            </a>
                            <a href="{{ route('books.create') }}" class="bg-gray-100 dark:bg-gray-700 hover:bg-pink-100 dark:hover:bg-pink-900 text-center p-4 rounded-lg transition font-semibold text-gray-900 dark:text-white">
                                ➕ Tambah Buku
                            </a>
                        @else
                            <a href="{{ route('transactions.create') }}" class="bg-gray-100 dark:bg-gray-700 hover:bg-green-100 dark:hover:bg-green-900 text-center p-4 rounded-lg transition font-semibold text-gray-900 dark:text-white">
                                ✏️ Pinjam Buku
                            </a>
                        @endif
                    </div>
                </div>
            @else
                <!-- Not Authenticated -->
                <div class="flex flex-col items-center justify-center py-20">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl p-12 text-center max-w-md">
                        <div class="text-6xl mb-6">📚</div>
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">S1TI Library</h2>
                        <p class="text-gray-600 dark:text-gray-400 mb-8 text-lg">
                            Sistem Informasi Perpustakaan Modern. Silakan login untuk melanjutkan.
                        </p>
                        <a href="{{ route('login') }}" class="inline-block bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition transform hover:scale-105">
                            🔐 Masuk Sekarang
                        </a>
                    </div>
                </div>
            @endauth
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 dark:bg-black text-gray-300 py-8 mt-12">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <p class="mb-2">&copy; 2026 S1TI Library - Knowledge Hub. All rights reserved.</p>
            <p class="text-sm text-gray-500">Sistem Informasi Perpustakaan Universitas</p>
        </div>
    </footer>
</body>
</html>

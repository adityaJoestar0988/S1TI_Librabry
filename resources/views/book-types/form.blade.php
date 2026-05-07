<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($bookType) ? 'Edit Kategori' : 'Tambah Kategori' }} - S1TI Library</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 bg-white dark:bg-gray-800 shadow-md z-50 border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center">
                    <span class="text-lg font-bold text-white">📚</span>
                </div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">S1TI Library</h1>
            </div>
            <a href="{{ route('book-types.index') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 font-medium">← Kembali</a>
        </div>
    </nav>

    <div class="pt-20 pb-12">
        <div class="max-w-2xl mx-auto px-4">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">{{ isset($bookType) ? '✏️ Edit Kategori Buku' : '➕ Tambah Kategori Baru' }}</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-8">{{ isset($bookType) ? 'Ubah informasi kategori buku' : 'Tambahkan kategori buku baru ke sistem' }}</p>

                <form method="POST" action="{{ isset($bookType) ? route('book-types.update', $bookType) : route('book-types.store') }}" class="space-y-6">
                    @csrf
                    @if(isset($bookType))
                        @method('PUT')
                    @endif

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">🏷️ Nama Kategori</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition @error('name') border-red-500 @enderror" value="{{ old('name', $bookType->name ?? '') }}" placeholder="Contoh: Fiksi, Non-Fiksi, Referensi" required>
                        @error('name')
                            <p class="text-red-500 dark:text-red-400 text-sm mt-2">⚠️ {{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">📋 Deskripsi</label>
                        <textarea id="description" name="description" rows="4" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition @error('description') border-red-500 @enderror" placeholder="Tulis deskripsi kategori...">{{ old('description', $bookType->description ?? '') }}</textarea>
                        @error('description')
                            <p class="text-red-500 dark:text-red-400 text-sm mt-2">⚠️ {{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <button type="submit" class="flex-1 bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition transform hover:scale-105 active:scale-95">
                            �� Simpan
                        </button>
                        <a href="{{ route('book-types.index') }}" class="flex-1 bg-gray-300 dark:bg-gray-700 hover:bg-gray-400 dark:hover:bg-gray-600 text-gray-900 dark:text-white font-bold py-3 px-6 rounded-lg transition text-center">
                            ❌ Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
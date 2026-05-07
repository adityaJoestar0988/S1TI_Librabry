<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($book) ? 'Edit Buku' : 'Tambah Buku' }} - S1TI Library</title>
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
            <a href="{{ route('books.index') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 font-medium">← Kembali</a>
        </div>
    </nav>

    <div class="pt-20 pb-12">
        <div class="max-w-2xl mx-auto px-4">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">{{ isset($book) ? '✏️ Edit Buku' : '➕ Tambah Buku Baru' }}</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-8">{{ isset($book) ? 'Ubah informasi buku yang ada' : 'Tambahkan buku baru ke perpustakaan' }}</p>

                <form method="POST" action="{{ isset($book) ? route('books.update', $book) : route('books.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @if(isset($book))
                        @method('PUT')
                    @endif

                    <!-- Book Type -->
                    <div>
                        <label for="book_type_id" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">🏷️ Jenis Buku</label>
                        <select id="book_type_id" name="book_type_id" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition @error('book_type_id') border-red-500 @enderror" required>
                            <option value="">-- Pilih Jenis Buku --</option>
                            @foreach($bookTypes as $bookType)
                                <option value="{{ $bookType->id }}" {{ $bookType->id == old('book_type_id', $book->book_type_id ?? '') ? ' selected' : '' }}>{{ $bookType->name }}</option>
                            @endforeach
                        </select>
                        @error('book_type_id')
                            <p class="text-red-500 dark:text-red-400 text-sm mt-2">⚠️ {{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">📑 Judul Buku</label>
                        <input type="text" id="title" name="title" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition @error('title') border-red-500 @enderror" value="{{ old('title', $book->title ?? '') }}" placeholder="Masukkan judul buku" required>
                        @error('title')
                            <p class="text-red-500 dark:text-red-400 text-sm mt-2">⚠️ {{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Synopsis -->
                    <div>
                        <label for="synopsis" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">📋 Deskripsi</label>
                        <textarea id="synopsis" name="synopsis" rows="4" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition @error('synopsis') border-red-500 @enderror" placeholder="Tulis deskripsi buku...">{{ old('synopsis', $book->synopsis ?? '') }}</textarea>
                        @error('synopsis')
                            <p class="text-red-500 dark:text-red-400 text-sm mt-2">⚠️ {{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div>
                        <label for="image" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">🖼️ Gambar Buku</label>
                        <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6 text-center cursor-pointer hover:border-blue-500 transition">
                            <input type="file" id="image" name="image" class="hidden" accept="image/*" onchange="previewImage(this)">
                            <label for="image" class="cursor-pointer">
                                <span class="text-4xl block mb-2">🖼️</span>
                                <p class="text-gray-600 dark:text-gray-400">Klik untuk upload gambar atau drag & drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">PNG, JPG, GIF max. 5MB</p>
                            </label>
                        </div>
                        @error('image')
                            <p class="text-red-500 dark:text-red-400 text-sm mt-2">⚠️ {{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Current Image Preview -->
                    @if(isset($book) && $book->image)
                        <div class="p-4 bg-blue-50 dark:bg-blue-900 rounded-lg">
                            <p class="text-sm font-semibold text-gray-900 dark:text-white mb-3">Gambar Saat Ini</p>
                            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" class="w-32 h-auto rounded-lg shadow-md">
                        </div>
                    @endif

                    <!-- Image Preview -->
                    <div id="imagePreview" class="hidden p-4 bg-blue-50 dark:bg-blue-900 rounded-lg">
                        <p class="text-sm font-semibold text-gray-900 dark:text-white mb-3">Preview Gambar Baru</p>
                        <img id="previewImg" src="" alt="Preview" class="w-32 h-auto rounded-lg shadow-md">
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <button type="submit" class="flex-1 bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition transform hover:scale-105 active:scale-95">
                            �� Simpan
                        </button>
                        <a href="{{ route('books.index') }}" class="flex-1 bg-gray-300 dark:bg-gray-700 hover:bg-gray-400 dark:hover:bg-gray-600 text-gray-900 dark:text-white font-bold py-3 px-6 rounded-lg transition text-center">
                            ❌ Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImg').src = e.target.result;
                    document.getElementById('imagePreview').classList.remove('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
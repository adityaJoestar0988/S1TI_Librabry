<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Buku - S1TI Library</title>
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
        <div class="max-w-7xl mx-auto px-4">
            <div class="mb-8">
                <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">📖 Pilih Buku untuk Dipinjam</h2>
                <p class="text-gray-600 dark:text-gray-400">Pilih satu atau lebih buku yang ingin Anda pinjam, kemudian tentukan tanggal pengembalian</p>
            </div>

            <form action="{{ route('transactions.store') }}" method="POST" class="space-y-8">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Books Grid -->
                    <div class="lg:col-span-2">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($books as $book)
                            <label class="cursor-pointer">
                                <input type="checkbox" name="book_ids[]" value="{{ $book->id }}" class="hidden peer book-checkbox" onchange="updateConfirmation()">
                                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-4 hover:shadow-lg hover:scale-105 transition-all peer-checked:ring-2 peer-checked:ring-blue-500 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900">
                                    <!-- Image -->
                                    <div class="relative h-48 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg overflow-hidden mb-4 group">
                                        @if($book->image)
                                            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-white text-4xl">📖</div>
                                        @endif
                                        <!-- Overlay Sinopsis -->
                                        <div class="absolute inset-0 bg-gray-900 bg-opacity-0 group-hover:bg-opacity-90 transition-all duration-300 flex items-center justify-center p-4">
                                            <div class="text-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                <p class="font-bold mb-2">Sinopsis</p>
                                                <p class="text-sm line-clamp-5">{{ $book->synopsis ?? 'Tidak ada deskripsi' }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Info -->
                                    <div>
                                        <span class="inline-block bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 text-xs font-semibold px-3 py-1 rounded-full mb-2">🏷️ {{ $book->bookType->name }}</span>
                                        <h3 class="font-bold text-gray-900 dark:text-white line-clamp-2 text-sm">{{ $book->title }}</h3>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 peer-checked:hidden">Klik untuk memilih</p>
                                        <p class="text-xs text-blue-600 dark:text-blue-400 font-bold mt-1 hidden peer-checked:block">✓ Dipilih</p>
                                    </div>
                                </div>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Confirmation Card -->
                    <div class="lg:col-span-1 h-fit">
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border-2 border-blue-500">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-2">📋 Konfirmasi Pinjaman</h3>

                            <!-- Selected Books Count -->
                            <div class="bg-blue-50 dark:bg-blue-900 p-4 rounded-lg mb-6">
                                <p class="text-sm text-gray-600 dark:text-gray-300 mb-1">Buku yang dipilih</p>
                                <p class="text-3xl font-bold text-blue-600 dark:text-blue-400" id="selectedCount">0</p>
                            </div>

                            <!-- Return Date -->
                            <div class="mb-6">
                                <label for="return_date" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">📅 Tanggal Harus Kembali</label>
                                <input type="date" id="return_date" name="return_date" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition" required min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                                @error('return_date')
                                    <p class="text-red-500 dark:text-red-400 text-sm mt-2">⚠️ {{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Error Message -->
                            @error('book_ids')
                                <div class="bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-600 text-red-800 dark:text-red-200 px-4 py-3 rounded-lg mb-6 text-sm">
                                    ⚠️ {{ $message }}
                                </div>
                            @enderror

                            <!-- Info Box -->
                            <div class="bg-yellow-50 dark:bg-yellow-900 border-l-4 border-yellow-500 p-4 mb-6 text-sm text-yellow-800 dark:text-yellow-200">
                                💡 Pilih minimal satu buku untuk melanjutkan
                            </div>

                            <!-- Buttons -->
                            <div class="space-y-3">
                                <button type="submit" id="submitBtn" disabled class="w-full bg-blue-600 hover:bg-blue-700 disabled:bg-gray-400 text-white font-bold py-3 px-4 rounded-lg shadow-lg transition disabled:cursor-not-allowed">
                                    ✅ Konfirmasi Pinjaman
                                </button>
                                <a href="{{ route('books.index') }}" class="block text-center bg-gray-300 dark:bg-gray-700 hover:bg-gray-400 dark:hover:bg-gray-600 text-gray-900 dark:text-white font-bold py-3 px-4 rounded-lg transition">
                                    ❌ Batal
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function updateConfirmation() {
            const checkboxes = document.querySelectorAll('.book-checkbox:checked');
            const count = checkboxes.length;
            document.getElementById('selectedCount').textContent = count;
            document.getElementById('submitBtn').disabled = count === 0;
        }
    </script>
</body>
</html>
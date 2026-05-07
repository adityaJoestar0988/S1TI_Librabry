
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kategori Buku - S1TI Library</title>
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
            <div class="flex items-center gap-6">
                <a href="{{ route('books.index') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 font-medium">📖 Buku</a>
                <a href="{{ route('book-types.index') }}" class="text-blue-600 dark:text-blue-400 font-semibold">⚙️ Kategori</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-semibold text-sm transition">🚪 Keluar</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="pt-20 pb-12">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Header -->
            <div class="mb-8">
                <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">⚙️ Kelola Kategori Buku</h2>
                <p class="text-gray-600 dark:text-gray-400">Tambah, edit, atau hapus kategori buku dari sistem</p>
            </div>

            <!-- Success Alert -->
            @if(session('success'))
                <div class="bg-green-100 dark:bg-green-900 border-l-4 border-green-600 text-green-700 dark:text-green-200 p-4 rounded-lg mb-6">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <!-- Add Button -->
            <div class="mb-6">
                <a href="{{ route('book-types.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition">➕ Tambah Kategori Baru</a>
            </div>

            <!-- Table -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-100 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                        <tr>
                            <th class="px-6 py-4 text-left font-semibold text-gray-900 dark:text-white">Nama Kategori</th>
                            <th class="px-6 py-4 text-left font-semibold text-gray-900 dark:text-white">Deskripsi</th>
                            <th class="px-6 py-4 text-center font-semibold text-gray-900 dark:text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($bookTypes as $bookType)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <td class="px-6 py-4 text-gray-900 dark:text-white font-semibold">🏷️ {{ $bookType->name }}</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $bookType->description ?? 'Tidak ada deskripsi' }}</td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('book-types.edit', $bookType) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg font-semibold text-sm transition">✏️ Edit</a>
                                    <form action="{{ route('book-types.destroy', $bookType) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin hapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-semibold text-sm transition">🗑️ Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                                <span class="text-5xl mb-4 block">📦</span>
                                Belum ada kategori. <a href="{{ route('book-types.create') }}" class="text-blue-600 hover:text-blue-800 font-bold">Tambah sekarang</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $bookTypes->links() }}
            </div>
        </div>
    </div>
</body>
</html>

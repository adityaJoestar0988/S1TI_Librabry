<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman - S1TI Library</title>
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
                <a href="{{ route('transactions.index') }}" class="text-blue-600 dark:text-blue-400 font-semibold">📋 Peminjaman</a>
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
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">📋 Riwayat Peminjaman</h2>
                    <p class="text-gray-600 dark:text-gray-400">Kelola semua peminjaman buku Anda</p>
                </div>
                <a href="{{ route('transactions.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition">➕ Pinjam Buku</a>
            </div>

            <!-- Success Alert -->
            @if(session('success'))
                <div class="bg-green-100 dark:bg-green-900 border-l-4 border-green-600 text-green-700 dark:text-green-200 p-4 rounded-lg mb-6">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <!-- Table -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-100 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                        <tr>
                            <th class="px-6 py-4 text-left font-semibold text-gray-900 dark:text-white">Tanggal Pinjam</th>
                            <th class="px-6 py-4 text-left font-semibold text-gray-900 dark:text-white">Batas Kembali</th>
                            <th class="px-6 py-4 text-left font-semibold text-gray-900 dark:text-white">Buku yang Dipinjam</th>
                            <th class="px-6 py-4 text-center font-semibold text-gray-900 dark:text-white">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($transactions as $trans)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <td class="px-6 py-4 text-gray-900 dark:text-white font-semibold">{{ \Carbon\Carbon::parse($trans->transaction_date)->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-gray-900 dark:text-white">{{ \Carbon\Carbon::parse($trans->return_date)->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-400">
                                <ul class="space-y-1">
                                    @foreach($trans->transactionDetails as $detail)
                                        <li>📖 {{ $detail->book->title }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if($trans->status === 'borrowed')
                                    <span class="inline-block bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 px-4 py-2 rounded-full font-semibold text-sm">⏳ Dipinjam</span>
                                @else
                                    <span class="inline-block bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 px-4 py-2 rounded-full font-semibold text-sm">✓ Dikembalikan</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                                <span class="text-5xl mb-4 block">📚</span>
                                Belum ada peminjaman. <a href="{{ route('transactions.create') }}" class="text-blue-600 hover:text-blue-800 font-bold">Pinjam buku sekarang</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Back Button -->
            <div class="mt-6">
                <a href="{{ route('books.index') }}" class="inline-block bg-gray-300 dark:bg-gray-700 hover:bg-gray-400 dark:hover:bg-gray-600 text-gray-900 dark:text-white font-bold py-3 px-6 rounded-lg transition">← Kembali ke Katalog</a>
            </div>
        </div>
    </div>
</body>
</html>
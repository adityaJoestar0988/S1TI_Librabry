<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman | S1TI Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>📚 Buku yang Saya Pinjam</h2>
            <a href="{{ route('transactions.create') }}" class="btn btn-primary">+ Pinjam Buku Lagi</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Tanggal Pinjam</th>
                            <th>Batas Kembali</th>
                            <th>Buku yang Dipinjam</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $trans)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($trans->transaction_date)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($trans->return_date)->format('d M Y') }}</td>
                            <td>
                                <ul class="mb-0">
                                    @foreach($trans->transactionDetails as $detail)
                                        <li>{{ $detail->book->title }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <span class="badge {{ $trans->status == 'borrowed' ? 'bg-warning text-dark' : 'bg-success' }}">
                                    {{ ucfirst($trans->status) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada buku yang dipinjam.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali ke Katalog</a>
        </div>
    </div>
</body>
</html>
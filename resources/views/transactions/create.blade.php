<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Buku | S1TI Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7f6; }
        .book-card { cursor: pointer; transition: 0.3s; border: 2px solid transparent; height: 100%; }
        .book-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        /* Style saat buku dipilih */
        .book-checkbox:checked + .book-card { border-color: #198754; background-color: #e8f5e9; }
        .book-checkbox { display: none; }
        .img-container { height: 350px; overflow: hidden; background: #eee; align-items: center; justify-content: center;}
        .img-container img { object-fit: contain; width: 100%; height: 100%; }

    /* Style untuk Sinopsis Overlay */
    .synopsis-overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        width: 100%;
        opacity: 0;
        transition: .5s ease;
        background-color: rgba(25, 135, 84, 0.9); /* Hijau transparan */
        color: white;
        padding: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-size: 0.85rem;
        overflow-y: auto; /* Jika sinopsis panjang, bisa di-scroll */
    }

    /* Munculkan overlay saat hover */
    .book-card:hover .synopsis-overlay {
        opacity: 1;
    }

    /* Berikan efek zoom sedikit pada gambar saat hover */
    .book-card:hover img {
        transform: scale(1.1);
        filter: blur(2px);
    }
    </style>
</head>
<body>
    <div class="container py-5">
        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <h4 class="mb-4">Pilih Buku yang Ingin Dipinjam</h4>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach($books as $book)
                        <div class="col">
                            <label class="w-100 h-100">
                                <input type="checkbox" name="book_ids[]" value="{{ $book->id }}" class="book-checkbox">
                                    <div class="card book-card">
                                        <div class="img-container">
                                            @if($book->image)
                                                <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}">
                                            @else
                                                <div class="d-flex align-items-center justify-content-center h-100 text-muted">No Image</div>
                                            @endif

                                            <div class="synopsis-overlay">
                                                <div>
                                                    <strong class="d-block mb-1 border-bottom pb-1">Sinopsis</strong>
                                                    {{ $book->synopsis ?? 'Tidak ada deskripsi untuk buku ini.' }}
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="card-body p-2 text-center">
                                            <small class="text-primary fw-bold">{{ $book->bookType->name }}</small>
                                            <h6 class="card-title mb-0 text-truncate">{{ $book->title }}</h6>
                                        </div>
                                    </div>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm sticky-top" style="top: 20px;">
                        <div class="card-header bg-success text-white">Konfirmasi Pinjaman</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Tanggal Harus Kembali</label>
                                <input type="date" name="return_date" class="form-control" required min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                            </div>
                            
                            <div class="alert alert-info small">
                                Silakan pilih satu atau lebih buku di sebelah kiri.
                            </div>

                            @error('book_ids')
                                <div class="text-danger small mb-3">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="btn btn-success w-100 py-2">Simpan Peminjaman</button>
                            <a href="{{ route('books.index') }}" class="btn btn-outline-secondary w-100 mt-2">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
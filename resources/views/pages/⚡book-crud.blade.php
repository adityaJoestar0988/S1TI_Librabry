<?php

use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public $bookId = null;
    public $title = '';
    public $image = null;
    public $oldImage = null;
    public $isEdit = false;

    public function getBooks()
    {
        return Book::latest()->get();
    }

    public function resetForm(): void
    {
        $this->bookId = null;
        $this->title = '';
        $this->image = null;
        $this->oldImage = null;
        $this->isEdit = false;

        $this->resetValidation();
    }

    public function saveOrUpdate(): void
    {
        if ($this->isEdit) {
            $this->update();
        } else {
            $this->save();
        }
    }

    public function save(): void
    {
        $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image', 'max:2048'],
        ]);

        $imagePath = $this->image->store('books', 'public');

        Book::create([
            'title' => $this->title,
            'image' => $imagePath,
        ]);

        session()->flash('success', 'Data buku berhasil ditambahkan.');

        $this->resetForm();
    }

    public function edit($id): void
    {
        $book = Book::findOrFail($id);

        $this->bookId = $book->id;
        $this->title = $book->title;
        $this->oldImage = $book->image;
        $this->image = null;
        $this->isEdit = true;

        $this->resetValidation();
    }

    public function update(): void
    {
        $book = Book::findOrFail($this->bookId);

        $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        $imagePath = $book->image;

        if ($this->image) {
            if ($book->image) {
                Storage::disk('public')->delete($book->image);
            }

            $imagePath = $this->image->store('books', 'public');
        }

        $book->update([
            'title' => $this->title,
            'image' => $imagePath,
        ]);

        session()->flash('success', 'Data buku berhasil diperbarui.');

        $this->resetForm();
    }

    public function delete($id): void
    {
        $book = Book::findOrFail($id);

        if ($book->image) {
            Storage::disk('public')->delete($book->image);
        }

        $book->delete();

        session()->flash('success', 'Data buku berhasil dihapus.');

        $this->resetForm();
    }
};

?>

<div>
    <div class="container py-5">

        <div class="text-center mb-4">
            <h1 class="fw-bold">S1TI Library</h1>
            <p class="text-muted mb-0">
                CRUD Buku Sederhana Menggunakan Laravel, PostgreSQL, dan Livewire 4
            </p>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-primary text-white">
                {{ $isEdit ? 'Edit Buku' : 'Tambah Buku' }}
            </div>

            <div class="card-body">
                <form wire:submit="saveOrUpdate">
                    <div class="mb-3">
                        <label class="form-label">Judul Buku</label>
                        <input
                            type="text"
                            class="form-control"
                            wire:model="title"
                            placeholder="Masukkan judul buku"
                        >

                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gambar Buku</label>
                        <input
                            type="file"
                            class="form-control"
                            wire:model="image"
                            accept="image/*"
                        >

                        <div wire:loading wire:target="image" class="text-primary small mt-2">
                            Gambar sedang diunggah sementara...
                        </div>

                        @error('image')
                            <small class="text-danger d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        @if ($image)
                            <p class="mb-1">Preview Gambar Baru:</p>
                            <img
                                src="{{ $image->temporaryUrl() }}"
                                class="img-thumbnail"
                                style="width: 160px; height: 220px; object-fit: cover;"
                                alt="Preview gambar baru"
                            >
                        @elseif ($oldImage)
                            <p class="mb-1">Gambar Saat Ini:</p>
                            <img
                                src="{{ asset('storage/' . $oldImage) }}"
                                class="img-thumbnail"
                                style="width: 160px; height: 220px; object-fit: cover;"
                                alt="Gambar saat ini"
                            >
                        @endif
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            {{ $isEdit ? 'Update' : 'Simpan' }}
                        </button>

                        <button type="button" class="btn btn-secondary" wire:click="resetForm">
                            Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-header bg-dark text-white">
                Daftar Buku
            </div>

            <div class="card-body">
                <div class="row g-4">
                    @forelse ($this->getBooks() as $book)
                        <div class="col-md-4 col-lg-3">
                            <div class="card h-100 shadow-sm">
                                @if ($book->image)
                                    <img
                                        src="{{ asset('storage/' . $book->image) }}"
                                        class="card-img-top"
                                        style="height: 260px; object-fit: cover;"
                                        alt="{{ $book->title }}"
                                    >
                                @else
                                    <div
                                        class="bg-secondary text-white d-flex align-items-center justify-content-center"
                                        style="height: 260px;"
                                    >
                                        Tidak ada gambar
                                    </div>
                                @endif

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold">
                                        {{ $book->title }}
                                    </h5>

                                    <p class="text-muted small mb-3">
                                        ID: {{ $book->id }}
                                    </p>

                                    <div class="mt-auto d-flex gap-2">
                                        <button
                                            type="button"
                                            class="btn btn-warning btn-sm w-50"
                                            wire:click="edit({{ $book->id }})"
                                        >
                                            Edit
                                        </button>

                                        <button
                                            type="button"
                                            class="btn btn-danger btn-sm w-50"
                                            wire:click="delete({{ $book->id }})"
                                            wire:confirm="Apakah Anda yakin ingin menghapus buku ini?"
                                        >
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning text-center mb-0">
                                Belum ada data buku.
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</div>
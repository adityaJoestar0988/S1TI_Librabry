@extends('layouts.index')
@section('content')
    <!-- Contact Content Section -->
    <main class="flex-grow-1 py-5">
      <div class="container my-4">
        <div class="row g-5">
          <!-- Kiri: Form Kontak -->
          <div class="col-lg-7">
            <div class="card border-0 shadow-sm p-4 h-100">
              <div class="card-body">
                <h3 class="fw-bold mb-4">Kirim Pesan</h3>
                <form>
                  <div class="row g-3 mb-3">
                    <div class="col-md-6">
                      <label for="inputNama" class="form-label fw-semibold"
                        >Nama Lengkap</label
                      >
                      <input
                        type="text"
                        class="form-control bg-light"
                        id="inputNama"
                        placeholder="Masukkan nama Anda"
                        required />
                    </div>
                    <div class="col-md-6">
                      <label for="inputEmail" class="form-label fw-semibold"
                        >Alamat Email</label
                      >
                      <input
                        type="email"
                        class="form-control bg-light"
                        id="inputEmail"
                        placeholder="nama@email.com"
                        required />
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="inputSubjek" class="form-label fw-semibold"
                      >Subjek Pesan</label
                    >
                    <input
                      type="text"
                      class="form-control bg-light"
                      id="inputSubjek"
                      placeholder="Contoh: Pertanyaan seputar peminjaman buku"
                      required />
                  </div>
                  <div class="mb-4">
                    <label for="inputPesan" class="form-label fw-semibold"
                      >Isi Pesan</label
                    >
                    <textarea
                      class="form-control bg-light"
                      id="inputPesan"
                      rows="6"
                      placeholder="Tuliskan pesan atau pertanyaan Anda di sini..."
                      required></textarea>
                  </div>
                  <button
                    type="submit"
                    class="btn btn-primary px-5 py-2 fw-semibold">
                    Kirim Sekarang
                  </button>
                </form>
              </div>
            </div>
          </div>

@endsection
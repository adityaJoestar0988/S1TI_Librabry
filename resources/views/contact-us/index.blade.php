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
          <!-- Kanan: Info Kontak & Peta -->
          <div class="col-lg-5">
            <div class="h-100">
              <h3 class="fw-bold mb-4">Informasi Kontak</h3>

              <!-- List Info -->
              <div class="d-flex mb-4 align-items-start">
                <div
                  class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0"
                  style="width: 45px; height: 45px">
                  <!-- Menggunakan emoji sebagai pengganti icon agar tidak perlu load CSS icon tambahan -->
                  <span class="fs-5">📍</span>
                </div>
                <div>
                  <h5 class="fw-bold mb-1">Alamat Kunjungan</h5>
                  <p class="text-muted mb-0">
                    Gedung F, Fakultas Teknologi Informasi UKSW<br />Jl.
                    Diponegoro 52-60, Salatiga 50711, Jawa Tengah
                  </p>
                </div>
              </div>

              <div class="d-flex mb-4 align-items-start">
                <div
                  class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0"
                  style="width: 45px; height: 45px">
                  <span class="fs-5">✉️</span>
                </div>
                <div>
                  <h5 class="fw-bold mb-1">Email Resmi</h5>
                  <p class="text-muted mb-0">perpustakaan.s1ti@uksw.edu</p>
                </div>
              </div>

              <div class="d-flex mb-5 align-items-start">
                <div
                  class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0"
                  style="width: 45px; height: 45px">
                  <span class="fs-5">📞</span>
                </div>
                <div>
                  <h5 class="fw-bold mb-1">Telepon & WhatsApp</h5>
                  <p class="text-muted mb-0">+62 298 321212</p>
                </div>
              </div>

              <!-- Placeholder Peta Lokasi -->
              <div class="card border-0 shadow-sm overflow-hidden">
                <!-- Menggunakan gambar placeholder dari picsum sebagai ilustrasi peta -->
                <img
                  src="https://picsum.photos/600/300?random=10"
                  class="card-img-top object-fit-cover"
                  alt="Peta Lokasi"
                  style="height: 250px" />
                <div class="card-body bg-light text-center py-2">
                  <small class="text-muted"
                    >Ilustrasi Lokasi di Google Maps</small
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>


@endsection
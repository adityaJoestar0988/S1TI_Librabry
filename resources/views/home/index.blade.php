  @extends('layouts.index')
  @section('content') 
   
   
   <!-- SECTION 1: SLIDER -->
    <section id="beranda">
      <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button
            type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide-to="0"
            class="active"></button>
          <button
            type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide-to="1"></button>
          <button
            type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
          <!-- Slide 1 -->
          <div class="carousel-item active">
            <img
              src="https://picsum.photos/1920/600?random=1"
              class="d-block w-100 object-fit-cover"
              alt="Perpustakaan UKSW"
              style="height: 60vh" />
            <div
              class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
              <h2 class="fw-bold">Selamat Datang di Perpustakaan S1TI</h2>
              <p class="lead">
                Pusat sumber belajar bagi mahasiswa Teknik Informatika UKSW.
              </p>
            </div>
          </div>
          <!-- Slide 2 -->
          <div class="carousel-item">
            <img
              src="https://picsum.photos/1920/600?random=2"
              class="d-block w-100 object-fit-cover"
              alt="Ruang Baca"
              style="height: 60vh" />
            <div
              class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
              <h2 class="fw-bold">Fasilitas Nyaman & Modern</h2>
              <p class="lead">
                Ruang baca ber-AC, koneksi Wi-Fi cepat, dan area diskusi
                kelompok.
              </p>
            </div>
          </div>
          <!-- Slide 3 -->
          <div class="carousel-item">
            <img
              src="https://picsum.photos/1920/600?random=3"
              class="d-block w-100 object-fit-cover"
              alt="Koleksi Digital"
              style="height: 60vh" />
            <div
              class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
              <h2 class="fw-bold">Koleksi Digital & Fisik Terlengkap</h2>
              <p class="lead">
                Akses ke ribuan jurnal, e-book, dan literatur teknologi terbaru.
              </p>
            </div>
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#heroCarousel"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#heroCarousel"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>

    <!-- SECTION 2: ABOUT -->
    <section id="tentang" class="py-5 bg-light">
      <div class="container my-5">
        <div class="row align-items-center">
          <div class="col-lg-6 mb-4 mb-lg-0">
            <img
              src="https://picsum.photos/600/400?random=4"
              class="img-fluid rounded shadow-sm"
              alt="Tentang Perpustakaan" />
          </div>
          <div class="col-lg-6">
            <h6 class="text-primary fw-bold text-uppercase">Tentang Kami</h6>
            <h2 class="display-6 fw-bold mb-3">
              Mendukung Riset & Inovasi Mahasiswa IT
            </h2>
            <p class="text-muted fs-5">
              Perpustakaan Program Studi S1 Teknik Informatika (S1TI)
              Universitas Kristen Satya Wacana (UKSW) hadir sebagai pusat
              literasi dan referensi utama untuk civitas akademika.
            </p>
            <p class="text-muted">
              Kami berdedikasi untuk menyediakan koleksi pustaka terbaik di
              bidang Ilmu Komputer, Rekayasa Perangkat Lunak, Jaringan, dan
              Kecerdasan Buatan. Dengan lingkungan yang kondusif, kami mendukung
              penuh kegiatan belajar mengajar dan riset mahasiswa maupun dosen.
            </p>
            <a href="#koleksi" class="btn btn-primary btn-lg mt-3"
              >Lihat Koleksi Kami</a
            >
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 3: KOLEKSI BUKU-BUKU -->
    <section id="koleksi" class="py-5">
      <div class="container my-5">
        <div class="text-center mb-5">
          <h6 class="text-primary fw-bold text-uppercase">Koleksi Kami</h6>
          <h2 class="display-6 fw-bold">Buku & Literatur Unggulan</h2>
          <p class="text-muted">
            Jelajahi koleksi buku IT populer yang tersedia di rak kami.
          </p>
        </div>

        <div class="row g-4">   
            @foreach($books as $book)             
                <div class="col-md-6 col-lg-3" data-aos="flip-up">
                    <div class="card h-100 shadow-sm border-0">
                        <img 
                            src="{{ asset('storage/' . $book->image) }}" 
                            class="card-img-top" 
                            alt="{{ $book->title }}" />
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">
                                {{ $book->title }} ({{ $book->bookType->name }})
                            </h5>
                            <p class="card-text text-muted small">
                                {{ $book->synopsis }}
                            </p>
                            <button class="btn btn-outline-primary mt-auto w-100">
                                Pinjam Buku
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="text-center mt-5">
          <button class="btn btn-primary px-4 py-2">
            Lihat Seluruh Katalog
          </button>
        </div>
      </div>
    </section>

@endsection
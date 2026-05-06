<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perpustakaan S1TI UKSW</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
      <div class="container">
        <a class="navbar-brand fw-bold" href="#">S1TI UKSW Library</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" href="#beranda">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#tentang">Tentang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#koleksi">Koleksi Buku</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="5.html">Hubungi Kami</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

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
          <!-- Buku 1 -->
          <div class="col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm border-0">
              <img
                src="https://picsum.photos/300/400?random=5"
                class="card-img-top"
                alt="Buku Algoritma" />
              <div class="card-body d-flex flex-column">
                <h5 class="card-title fw-bold">Algoritma & Pemrograman</h5>
                <p class="card-text text-muted small">
                  Dasar-dasar logika pemrograman menggunakan C++ dan Python.
                </p>
                <button class="btn btn-outline-primary mt-auto w-100">
                  Pinjam Buku
                </button>
              </div>
            </div>
          </div>
          <!-- Buku 2 -->
          <div class="col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm border-0">
              <img
                src="https://picsum.photos/300/400?random=6"
                class="card-img-top"
                alt="Buku Jaringan" />
              <div class="card-body d-flex flex-column">
                <h5 class="card-title fw-bold">Jaringan Komputer Lanjut</h5>
                <p class="card-text text-muted small">
                  Implementasi topologi jaringan dan keamanan siber.
                </p>
                <button class="btn btn-outline-primary mt-auto w-100">
                  Pinjam Buku
                </button>
              </div>
            </div>
          </div>
          <!-- Buku 3 -->
          <div class="col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm border-0">
              <img
                src="https://picsum.photos/300/400?random=7"
                class="card-img-top"
                alt="Buku AI" />
              <div class="card-body d-flex flex-column">
                <h5 class="card-title fw-bold">Kecerdasan Buatan (AI)</h5>
                <p class="card-text text-muted small">
                  Pengantar Machine Learning dan Deep Learning modern.
                </p>
                <button class="btn btn-outline-primary mt-auto w-100">
                  Pinjam Buku
                </button>
              </div>
            </div>
          </div>
          <!-- Buku 4 -->
          <div class="col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm border-0">
              <img
                src="https://picsum.photos/300/400?random=8"
                class="card-img-top"
                alt="Buku Web Dev" />
              <div class="card-body d-flex flex-column">
                <h5 class="card-title fw-bold">Fullstack Web Development</h5>
                <p class="card-text text-muted small">
                  Membangun aplikasi web interaktif dengan framework Javascript.
                </p>
                <button class="btn btn-outline-primary mt-auto w-100">
                  Pinjam Buku
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="text-center mt-5">
          <button class="btn btn-primary px-4 py-2">
            Lihat Seluruh Katalog
          </button>
        </div>
      </div>
    </section>

    <!-- SECTION 4: FOOTER -->
    <footer class="bg-dark text-white pt-5 pb-3">
      <div class="container">
        <div class="row mb-4">
          <!-- Data Perusahaan / Identitas -->
          <div class="col-lg-5 col-md-6 mb-4">
            <h4 class="fw-bold mb-3">Perpustakaan S1TI UKSW</h4>
            <p class="text-secondary pe-lg-4">
              Pusat layanan informasi dan literasi bagi mahasiswa dan dosen
              Program Studi S1 Teknik Informatika Fakultas Teknologi Informasi
              (FTI).
            </p>
            <p class="text-secondary mb-1">
              <strong>Alamat:</strong> Gedung F, FTI UKSW<br />
              Jl. Diponegoro 52-60, Salatiga 50711, Jawa Tengah
            </p>
            <p class="text-secondary mb-1">
              <strong>Email:</strong> perpustakaan.s1ti@uksw.edu
            </p>
            <p class="text-secondary">
              <strong>Telepon:</strong> +62 298 321212
            </p>
          </div>

          <!-- Link Cepat -->
          <div class="col-lg-3 col-md-6 mb-4">
            <h5 class="fw-bold mb-3">Tautan Cepat</h5>
            <ul class="list-unstyled">
              <li class="mb-2">
                <a
                  href="#beranda"
                  class="text-secondary text-decoration-none text-white-hover"
                  >Beranda</a
                >
              </li>
              <li class="mb-2">
                <a
                  href="#tentang"
                  class="text-secondary text-decoration-none text-white-hover"
                  >Tentang Kami</a
                >
              </li>
              <li class="mb-2">
                <a
                  href="#koleksi"
                  class="text-secondary text-decoration-none text-white-hover"
                  >Katalog Buku</a
                >
              </li>
              <li class="mb-2">
                <a
                  href="#"
                  class="text-secondary text-decoration-none text-white-hover"
                  >Jurnal Ilmiah FTI</a
                >
              </li>
              <li class="mb-2">
                <a
                  href="#"
                  class="text-secondary text-decoration-none text-white-hover"
                  >E-Learning UKSW</a
                >
              </li>
            </ul>
          </div>

          <!-- Jam Operasional -->
          <div class="col-lg-4 col-md-12 mb-4">
            <h5 class="fw-bold mb-3">Jam Layanan</h5>
            <ul class="list-unstyled text-secondary">
              <li class="d-flex justify-content-between mb-2">
                <span>Senin - Jumat:</span> <span>08:00 - 16:00 WIB</span>
              </li>
              <li class="d-flex justify-content-between mb-2">
                <span>Sabtu:</span> <span>09:00 - 13:00 WIB</span>
              </li>
              <li class="d-flex justify-content-between mb-2">
                <span>Minggu & Hari Libur:</span>
                <span class="text-danger">Tutup</span>
              </li>
            </ul>
          </div>
        </div>

        <hr class="border-secondary" />

        <div class="text-center text-secondary mt-3">
          <small
            >&copy; 2026 Program Studi S1 Teknik Informatika UKSW. Hak Cipta
            Dilindungi.</small
          >
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
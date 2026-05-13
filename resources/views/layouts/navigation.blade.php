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
              <a class="nav-link active" href="{{ url('/home') }}">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#tentang">Tentang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#koleksi">Koleksi Buku</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/contact-us') }}">Hubungi Kami</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
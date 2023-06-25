@extends('layouts.main')
@section('css', '/css/antrean.css')
@section('content')
  <header class="header-antrean">
    <h1>Antrean Puskesmas</h1>
  </header>
  <main>

       @auth
        <!-- Button Modal -->
          <a href="/ambilantrean" class="btn btn-primary my-3 login-ambil">
             <i class="bi bi-file-plus me-1"></i>Ambil Antrian
          </a>
        @else
          <a href="/login" type="button" class="btn btn-primary my-3 login-ambil">
            <i class="bi bi-file-plus me-1"></i>Ambil Antrian
          </a>
        @endauth


  @if(auth()->check())
    <section id="queue">
      <div class="container">
      @auth
        <h2>Antrian Anda</h2>
        @if($pasien-> count() > 0)
        <div class="row mb-0 mb-lg-4">
            @foreach ($pasien as $pasienall)
              <div class="queue-number">
                  <div class="appointment-number">
                    <h3>Nomor Antrian:</h3>
                    <p>{{ $pasienall->id }}</p>
                  </div>
                  <div class="appointment-status">
                    <h3>Status:</h3>
                    <p>{{ $pasienall->status }}</p>
                  </div>
              </div>
            @endforeach
        </div>
        @else
          <p>Anda belum mengambil antrian.</p>
        @endif
      @endauth
      </div>
    </section>
  @endif

    <section id="categories">
      <div class="container">
        <h2>Kategori</h2>
        <div class="category">
          <button class="btn-category" onclick="showQueue('Poli Umum')">Poli Umum</button>
          <button class="btn-category" onclick="showQueue('Poli Gigi')">Poli Gigi</button>
          <button class="btn-category" onclick="showQueue('Poli THT')">Poli THT</button>
        </div>
      </div>
    </section>
    <section id="appointment">
      <div class="container">
        <h2 id="appointment-category">Antrean Poli Umum</h2>
        <div class="row mb-0 mb-lg-4">
            @foreach ($pasien as $pasien)
              <div class="appointment-item">
                <div class="appointment-number">
                  <h3>Nomor Antrian:</h3>
                  <p>{{ $pasien->id }}</p>
                </div>
                <div class="appointment-status">
                  <h3>Status:</h3>
                  <p>{{ $pasien->status }}</p>
                </div>
              </div>
            @endforeach
        </div>
      </div>
    </section>
  </main>

<script>
    function showQueue(category) {
  const appointmentSection = document.getElementById("appointment");
  const appointmentCategory = document.getElementById("appointment-category");
  
  // Mengganti judul antrean sesuai dengan kategori yang dipilih
  appointmentCategory.textContent = "Antrean " + category;

  // Menampilkan atau menyembunyikan antrean berdasarkan kategori yang dipilih
  const appointmentItems = appointmentSection.getElementsByClassName("appointment-item");
  for (let i = 0; i < appointmentItems.length; i++) {
    const appointmentItem = appointmentItems[i];
    const itemCategory = appointmentItem.getAttribute("data-category");

    if (itemCategory === category) {
      appointmentItem.style.display = "block";
    } else {
      appointmentItem.style.display = "none";
    }
  }
}
</script>
@endsection

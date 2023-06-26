@extends('layouts.main')
@section('css', '/css/antrean.css')
@section('content')
  <main>
    <section id="hero" class="d-flex align-items-center">
          <div class="container">
            <h1>Silahkan Ambil Antrian Anda</h1>
                  <div class="buttonantrian">
                    <a href="/ambilantrean" class="btn btn-primary lihat-antrean">Ambil Antrean Anda</a>
                  </div>
          </div>
        </section>

  @if(auth()->check())
    <section id="queue">
      <div class="container">
      @auth
        <h2>Antrian Anda</h2>
        <div class="row mb-0 mb-lg-4">
            @if($pasien-> count() > 0)
                @foreach ($pasien as $pasienall)
                  <div class="appointment-item">
                      <div class="appointment-number">
                        <h3>Nama</h3>
                        <p>{{ $pasienall->namapasien }}</p>
                      </div>  
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
          </div>
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
        <h2 id="appointment-category">Antrean Sekarang</h2>
        <input type="text" class="form-control mr-sm-4" id="search-input" onkeyup="searchByName()" placeholder="Cari berdasarkan nama...">
        <div class="row mb-0 mb-lg-4">
        @foreach ($antreanPoliUmum as $antrian)
            <div class="appointment-item" data-category="Poli Umum">
             <div class="appointment-number">
               <h3>Nama</h3>
                <p>{{ $antrian->namapasien }}</p>
             </div>
              <div class="appointment-number">
                <h3>Nomor Antrian:</h3>
                <p>{{ $antrian->id }}</p>
              </div>
              <div class="appointment-status">
                <h3>Status:</h3>
                <p>{{ $antrian->status }}</p>
              </div>
            </div>
          @endforeach
          @foreach ($antreanPoliGigi as $antrian)
            <div class="appointment-item" data-category="Poli Gigi">
              <div class="appointment-number">
                <h3>Nama</h3>
                  <p>{{ $antrian->namapasien }}</p>
              </div>
              <div class="appointment-number">
                <h3>Nomor Antrian:</h3>
                <p>{{ $antrian->id }}</p>
              </div>
              <div class="appointment-status">
                <h3>Status:</h3>
                <p>{{ $antrian->status }}</p>
              </div>
            </div>
          @endforeach
          @foreach ($antreanPoliTHT as $antrian)
            <div class="appointment-item" data-category="Poli THT">
              <div class="appointment-number">
                <h3>Nama</h3>
                  <p>{{ $antrian->namapasien }}</p>
              </div>
              <div class="appointment-number">
                <h3>Nomor Antrian:</h3>
                <p>{{ $antrian->id }}</p>
              </div>
              <div class="appointment-status">
                <h3>Status:</h3>
                <p>{{ $antrian->status }}</p>
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
  
    function searchByName() {
      const searchInput = document.getElementById("search-input").value.toLowerCase();
      const appointmentItems = document.getElementsByClassName("appointment-item");

      for (let i = 0; i < appointmentItems.length; i++) {
        const appointmentItem = appointmentItems[i];
        const itemName = appointmentItem.querySelector("p").textContent.toLowerCase();

        if (itemName.includes(searchInput)) {
          appointmentItem.style.display = "block";
        } else {
          appointmentItem.style.display = "none";
        }
      }
    }
</script>
@endsection

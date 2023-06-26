@extends('layouts.main')
@include('sweetalert::alert')
@section('css', '/css/style.css')

@section('content')
      <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center">
          <div class="container">
            <h1>Selamat Datang</h1>
            <h2>Ini Adalah Website Resmi Puskesmas Sehat</h2>
            <!-- ======= Button Lihat antrian ======= -->
                  
               @auth
                  <div class="buttonantrian">
                    <a href="/antrean" class="btn btn-primary lihat-antrean">Lihat Antrean</a>
                  </div>
                @else
                  <div class="buttonantrian">
                    <a href="{{ route('login') }}" class="btn btn-primary lihat-antrean">Lihat Antrean</a>
                  </div>
                @endauth
          </div>
        </section>
      <!-- End Hero -->
    <main id="main">
        <!-- ======= Kenapa kita Section ======= -->
            <section id="info-web" class="info-web">
              <div class="container">

                <div class="row">
                  <div class="col-lg-4 d-flex align-items-stretch">
                    <div class="content-info-web">
                      <h3>Sistem Antrian Online</h3>
                      <p>
                      Sistem antrian online di sebuah puskesmas memungkinkan pasien untuk mendaftar dan memilih jenis layanan yang diinginkan melalui platform digital. Mereka dapat memilih waktu kunjungan dan menerima konfirmasi antrian dengan nomor dan informasi terkait. Selain itu, sistem ini memberikan pemberitahuan dan peringatan kepada pasien sebelum kunjungan mereka, serta memungkinkan pengaturan prioritas bagi pasien darurat atau dengan kebutuhan khusus. Petugas puskesmas dapat memantau alur antrian secara real-time dan memperbarui status jika diperlukan. Dengan demikian, sistem antrian online meningkatkan efisiensi pelayanan, mengurangi waktu tunggu, dan memberikan pengalaman yang lebih baik bagi pasien.
                      </p>
                    </div>
                  </div>
                  <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                      <div class="row">
                        <div class="col-xl-4 d-flex align-items-stretch">
                          <div class="icon-box mt-4 mt-xl-0">
                            <i class="bx bx-plus-medical"></i>
                            <h4>Poli Umum</h4>
                            <p>
                            Poli umum adalah layanan medis yang menyediakan pemeriksaan dan perawatan umum bagi pasien dengan berbagai keluhan atau kondisi kesehatan non-spesifik. Dokter di poli umum dapat menangani penyakit umum seperti flu, batuk, demam, nyeri ringan, dan memberikan nasihat mengenai masalah kesehatan umum. Poli umum juga sering menjadi tempat pertama untuk pemeriksaan awal, diagnosis, atau rujukan ke spesialis jika diperlukan.  
                            </p>
                          </div>
                        </div>
                        <div class="col-xl-4 d-flex align-items-stretch">
                          <div class="icon-box mt-4 mt-xl-0">
                            <i class="bx bx-dna"></i>
                            <h4>Poli Gigi</h4>
                            <p>
                            Poli gigi atau klinik gigi adalah fasilitas kesehatan yang menyediakan perawatan kesehatan gigi dan mulut. Di poli gigi, dokter gigi dan tim medisnya menangani berbagai kondisi gigi dan mulut, termasuk pemeriksaan gigi rutin, pembersihan gigi, penambalan gigi, pencabutan gigi, perawatan akar gigi, pemasangan gigi palsu, dan pencegahan penyakit gigi. Poli gigi juga memberikan edukasi tentang perawatan gigi yang baik dan pentingnya menjaga kebersihan mulut.  
                            </p>
                          </div>
                        </div>
                        <div class="col-xl-4 d-flex align-items-stretch">
                          <div class="icon-box mt-4 mt-xl-0">
                            <i class="bx bxs-first-aid"></i>
                            <h4>Poli THT</h4>
                            <p>
                            Poli THT (Telinga, Hidung, dan Tenggorokan) adalah poli yang spesialisasinya berfokus pada penyakit, gangguan, dan keluhan yang terkait dengan telinga, hidung, dan tenggorokan. Dokter spesialis THT atau otolaringolog akan menangani masalah seperti infeksi telinga, penyumbatan hidung, gangguan pendengaran, tinnitus (denging telinga), polip hidung, amandel yang membesar, masalah pada pita suara, dan masalah terkait saluran pernapasan atas. Poli THT juga dapat melakukan prosedur seperti pemeriksaan endoskopi dan pembedahan kecil yang terkait dengan area tersebut.  
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </section>
        
        <!-- End Kenapa kita Section -->

        <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact">
              <div class="container">

                <div class="section-title">
                  <h1>Contact Us</h1>
                </div>
              </div>

              <div class="container">
                <div class="row mt-5">

                  <div class="col-lg-4">
                    <div class="info">
                      <div class="address">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Lokasi:</h4>
                        <p>Bonang</p>
                      </div>

                      <div class="email">
                        <i class="bi bi-envelope"></i>
                        <h4>Email:</h4>
                        <p>Lutfi@gmail.com</p>
                      </div>

                      <div class="phone">
                        <i class="bi bi-phone"></i>
                        <h4>Call:</h4>
                        <p>085244456154</p>
                      </div>

                    </div>

                  </div>

                  <div class="col-lg-8 mt-5 mt-lg-0">
                    @if(Session::has('message_sent'))
                      <div class="alert alert-success" role="alert">
                          {{ Session::get('message_sent') }}
                      </div>
                    @endif
                    <form action="{{ route('contact.send') }}" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-md-6 form-group">
                          <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                          @error('name')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                          <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                          @error('email')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                        @error('subject')
                            <div class="alert alert-danger">{{ $subject }}</div>
                        @enderror
                      </div>
                      <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        @error('message')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>

                  </div>
                </div>
              </div>
            </section>
        <!-- End Contact Section -->

      </main>

  @push('script')
    <script src="{{ asset('/js/navbar.js') }}"></script>
  @endpush

  
@endsection
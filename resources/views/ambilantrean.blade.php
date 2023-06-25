<!-- ambilantrean.blade.php -->
@extends('layouts.main')
@section('css', '/css/ambilantrean.css')
@section('content')
  <header>
    <h1>Ambil Antrean</h1>
  </header>
  <main>
    <section id="ambil-antrean">
      <div class="container">
        <h2>Form Ambil Antrean</h2>
        <form action="{{ route('ambilantrean.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="namapasien">Nama Pasien:</label>
            <input type="text" id="namapasien" name="namapasien" required>
          </div>
          <div class="form-group">
            <label for="usia">Usia:</label>
            <input type="number" id="usia" name="usia" required>
          </div>
          <div class="form-group">
            <label for="jeniskelamin">Jenis Kelamin:</label>
            <select id="jeniskelamin" name="jeniskelamin" required>
              <option value="laki-laki">Laki-laki</option>
              <option value="perempuan">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="kategori">Poli:</label>
            <select id="kategori" name="kategori" required>
              <option value="Poli Gigi">Poli Gigi</option>
              <option value="Poli Umum">Poli Umum</option>
              <option value="Poli THT">Poli THT</option>
            </select>
          </div>
          <div class="form-group">
            <label for="nik">NIK:</label>
            <input type="text" id="nik" name="nik" required>
          </div>
          <div class="form-group">
            <label for="nohp">No. HP:</label>
            <input type="text" id="nohp" name="nohp" required>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" required></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn-submit">Ambil Antrean</button>
          </div>
        </form>
      </div>
    </section>
  </main>
@endsection

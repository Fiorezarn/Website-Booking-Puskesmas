<!DOCTYPE html>
<html lang="en">

@include('admin.head')

<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
@include('admin.navbar')

 @include('admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Pasien Puskesmas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <p>Jumlah Pasien : {{$totalpasien}}</p>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i>Success</h5>
          {{ session('pesan') }}
        </div>
      @endif
      
      <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <table class="table table-bordered">
          <thead>
            <tr>
              <td>No</td>
              <td>Nama Pasien</td>
              <td>NIK</td>
              <td>Usia</td>
              <td>Kelamin</td>
              <td>No Telefon</td>
              <td>Alamat</td>
              <td>Poli</td>
              <td>Status</td>
            </tr>
          </thead>
          <tbody>
          @foreach ($pasien as $pasien)
            <tr>
              <td>{{ $pasien->id }}</td>
              <td>{{ $pasien->namapasien }}</td>
              <td>{{ $pasien->nik }}</td>
              <td>{{ $pasien->usia }}</td>
              <td>{{ $pasien->jeniskelamin }}</td>
              <td>{{ $pasien->nohp }}</td>
              <td>{{ $pasien->alamat }}</td>
              <td>{{ $pasien->kategori }}</td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn
                    @if ($pasien->status == 'Diterima') btn-warning
                    @elseif ($pasien->status == 'Mengantri') btn-secondary
                    @elseif ($pasien->status == 'Selesai') btn-success
                    @elseif ($pasien->status == 'Cancelled') btn-danger
                    @endif
                    btn-sm dropdown-toggle py-0 px-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if ($pasien->status == 'Diterima')
                    Diterima
                    @elseif ($pasien->status == 'Mengantri')
                    Mengantri
                    @elseif ($pasien->status == 'Selesai')
                    Selesai
                    @elseif ($pasien->status == 'Cancelled')
                    Cancelled
                    @endif
                  </button>
                  <div class="dropdown-menu">
                    <form action="update/{{ $pasien->first()->id }}" method="post">
                      @method('patch')
                      @csrf
                      <input type="hidden" name="status" value="Mengantri">
                      <button type="submit" class="dropdown-item">Mengantri</button>
                    </form>
                    <form action="update/{{ $pasien->first()->id }}" method="post">
                      @method('patch')
                      @csrf
                      <input type="hidden" name="status" value="Selesai">
                      <button type="submit" class="dropdown-item">Selesai</button>
                    </form>
                    <form action="update/{{ $pasien->first()->id }}" method="post">
                      @method('patch')
                      @csrf
                      <input type="hidden" name="status" value="Cancelled">
                      <button type="submit" class="dropdown-item">Cancelled</button>
                    </form>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </form>
    </div>  
  </div>

@include('admin.footer')

@include('admin.script')
</body>
</html>

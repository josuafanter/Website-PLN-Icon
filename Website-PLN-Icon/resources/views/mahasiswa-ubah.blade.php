
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all nims and provides the needed markup only.
-->
<html lang="en">
<head>
  <title>The Project</title>
  @include('Template.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('Template.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('Template.side')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ubah Data Mahasiswa</h1>
          </div><!-- /.col -->
<!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="container mt-2">
          <div class="col-md-8">
            <form action="/mahasiswa/{{$mhs->id}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('put')
              <label for="">Nama </label>
              <input class="form-control" type="text" name="nama" value="{{$mhs->nama}}">
              @error('nama')
                <small class="text-danger">{{$message}}</small>
              @enderror
              <label for="">nim </label>
              <input class="form-control" type="text" name="nim" value="{{$mhs->nim}}">
              @error('nim')
              <small class="text-danger">{{$message}}</small>
              @enderror
              <label for="">angkatan</label>
              <select class="form-control" type="text" name="angkatan">
                <option @if($mhs->angkatan == '2022') selected @endif value="2022">2022</option>
                <option @if($mhs->angkatan == '2021') selected @endif value="2021">2021</option>
                <option @if($mhs->angkatan == '2019') selected @endif value="2020">2020</option>
                <option @if($mhs->angkatan == '2018') selected @endif value="2019">2019</option>
                <option @if($mhs->angkatan == '2017') selected @endif value="2018">2018</option>
              </select>
              @error('angkatan')
              <small class="text-danger">{{$message}}</small>
              @enderror
             <br>
             <button type="submit" class="btn btn-success">Tambah</button>

            </form>
            <br>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  @include('Template.footer')
  <!-- Main Footer -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
  @include('Template.scrip')
</body>
</html>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
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
            <h1 class="m-0">Edit Aplikasi</h1>
          </div><!-- /.col --><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="container mt-2">
          <div class="col-md-8">
            <form action="/aplikasi/{{$app->id}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('put')
              <label for="">Nama aplikasi</label>
              <input class="form-control" type="text" name="nama" value="{{$app->nama}}">
              @error('nama')
                <small class="text-danger">{{$message}}</small>
              @enderror
              <label for="">Link aplikasi</label>
              <input class="form-control" type="text" name="link" value="{{$app->link}}">
              @error('link')
              <small class="text-danger">{{$message}}</small>
              @enderror
              <label for="">Deskripsi aplikasi</label>
              <textarea class="form-control" type="text" name="deskripsi">{{$app->deskripsi}}</textarea>
              @error('deskripsi')
              <small class="text-danger">{{$message}}</small>
              @enderror
              <label for="">Gambar</label><br>
              <img src="/storage/{{$app->gambar}}" alt="" style="width: 100px;">
             <input type="file" class="form-control" name="gambar" value="{{$app->gambar}}">
             @error('gambar')
             <small class="text-danger">{{$message}}</small>
             @enderror
             <br>
             <button type="submit" class="btn btn-success">Ubah</button>

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

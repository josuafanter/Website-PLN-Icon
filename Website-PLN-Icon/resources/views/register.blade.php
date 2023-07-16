
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>The Project | Registration </title>

  <!-- Google Font: Source Sans Pro -->
@include('Template.head')
</head>
<body class="hold-transition register-page">

<div class="register-box">

  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a class="h1">The <b>Project</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Tambahkan Akun </p>
@if (session()->has('berhasil'))
    <p>{{ session('berhasil') }}</p>
@endif
      <form action="/register" method="post" enctype="multipart/form-data">
      @method('post')
      @csrf
        <div class="input-group mb-3">
          <input name="name" type="text" class="form-control" placeholder="Nama Lengkap"><br>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
          @error('name')
          <p class="text-danger">{{ $message }}</p>
          @enderror
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control" placeholder="Email">
          @error('email')
          <p>{{ $message }}</p>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          @error('password')
          <p>{{ $message }}</p>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

          <div class="input-group mb-3">
          <input name="gambar" type="file" class="form-control" placeholder="Masukkan Gambar"><br>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
          @error('gambar')
          <p class="text-danger">{{ $message }}</p>
          @enderror

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">              
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Tambah</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      


    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
@include('Template.scrip')
</body>
</html>

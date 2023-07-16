
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>The Project | Log in (v2)</title>

 @include('Template.head')
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a class="h1">The <b>Project</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Masuk Terlebih Dahulu</p>
      @if (session()->has('gagal'))
    <p class="text-danger">{{ session('gagal') }}</p>
    @endif
      <form action="/login" method="post">
        <div class="input-group mb-3">
        @method('post')
        @csrf
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
          <input name="password" type="password" class="form-control" placeholder="Password">
          @error('password')
          <p>{{ $message }}</p>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
@include('Template.scrip')
</body>
</html>

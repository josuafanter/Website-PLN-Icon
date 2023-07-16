
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <title>AdminLTE 3 | Starter</title>
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
            <h1 class="m-0">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
 
    <br>
    
    <div class="content">
       @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show show container">
        <p>{{ session('success') }}</p>
      </div><br>
    @endif<br>
    <div class="container">
    <a href="/aplikasi/create" class="btn btn-primary btn-sm ml-auto">+ Tambah aplikasi</a>
    </div>
      <div class="container-fluid">
        <div class="container mt-2">
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Nama aplikasi</th>
                    <th>Gambar aplikasi</th>
                    <th>Deskripsi</th>
                    <th>Link aplikasi</th>
                    <th>Aksi</th>
                </tr>

                   
                    @foreach ($apps as $ap)
                    <tr> 
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $ap->nama }}</td>
                    <td>
                    <div class="" style="max-width:100px;">
                      <img src="storage/{{$ap->gambar}}" style="width: 100%;">
                    </div>
                    {{-- $ap->gambar --}}</td>
                    <td>{{ $ap->deskripsi }}</td>
                    <td>{{ $ap->link }}</td>
                    <td>
                      <div class="d-flex">
                        <a href="aplikasi/{{ $ap->id }}/edit" class="btn btn-sm btn-warning fw-bold">Edit</a>&nbsp;
                        <form action="/aplikasi/{{ $ap->id }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button></form>
                      </div>
                    </td>
                    </tr>
                    @endforeach
                
            </table>
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


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
            <h1 class="m-0">Project Saya</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             
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
    <div class="container d-flex">
    <a href="/project/create" class="btn btn-primary btn-sm ml-auto">+ Tambah project</a> &nbsp;
    {{-- <div class="ms-auto">
      <form action="/home" method="get">
        <input type="text" class="form-control" name="cari">
      </form>
    </div> --}}
    </div>
      <div class="container-fluid">
        <div class="container mt-2">
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Gambar</th>
                    <th>Dosen pembimbing</th>
                    <th>Dibuat pada</th>
                    <th>Aksi</th>
                </tr>

                   
                    @foreach ($project as $p)
                    <tr> 
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $p->nama }}</td>
                    <td>
                    <div class="" style="max-width:100px;">
                      <img src="storage/{{$p->gambar}}" style="width: 100%;">
                    </div>
                </td>
                    <td>{{ $p->dospem}}</td>
                    <td>{{ $p->created_at}}</td>
                    <td>
                      <div class="d-flex">
                        <a href="project/{{ $p->id }}" class="btn btn-sm btn-success fw-bold">Detail</a>&nbsp;
                        <a href="project/{{ $p->id }}/edit" class="btn btn-sm btn-warning fw-bold">Edit</a>&nbsp;
                        <form action="/project/{{ $p->id }}" method="post">
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


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
            <h1 class="m-0">The <b>Project</b></h1>
          </div><!-- /.col -->
          <div>

          <div class="row">
            
              <form action="/home">
                <div class="input-group mb-7">
                  <input type="text" class="form-control" placeholder="Cari Project" name="cari" value="{{ request('cari') }}"> 
                  <button class="btn btn-info ml-1" type="submit">Cari</button>
              </div>
          </div>


          </div>
        </div>
      </div><!-- /.container-fluid -->

    </div>
    <!-- /.content-header -->

    

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

          @foreach ($proj as $p)
          <div class="col-md-4">

            <div class="card mb-3" style="max-width: 540px;">
              <img src="/storage/{{$p->gambar}}" class="img-fluid rounded-start" style="max-width:100%;
max-height:100%;" alt="...">
              <div class="col-md-15">
              <div class="card-body">
                <h5 class=""><b>{{$p->nama}}</b></h5>
                <p class="text-muted">Author : {{ $p->user->name }}</p>
                <a href="/project/{{$p->id}}"
                class="btn btn-info btn-md">Lihat detail</a>
              </div>
            </div>
           </div>

    </div>


          @endforeach
        </div>
          <!-- /.col-md-6 -->
  {{ $proj->links() }}
        <!-- /.row -->
      </div>
      
<!-- /.container-fluid -->
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

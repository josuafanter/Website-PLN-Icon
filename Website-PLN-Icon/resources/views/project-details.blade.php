
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
            <h1 class="m-0"><b>Detail Projek</b></h1>
          </div><!-- /.col -->
<!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
 
    
    
    <div class="content">
       @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show show container">
        <p>{{ session('success') }}</p>
      </div><br>
    @endif

  <div class="container">
  <div class="detail-project container">
  <div class="card bg-navy mb-3">
  <div class="">
    <img style="width: 100%; height: 500px;" src="/storage/{{$pro->gambar}}" alt="">
  </div>
  <div class="card-body">
    <h1>{{$pro->nama}}</h1>
  <div class="deskripsi mt-5">
                <p>
                    {{$pro->deskripsi}}
                </p>
                <h4>
                    <img src="storage/{{ $pro->user->gambar }}" class="img-circle elevation-2" alt="User Image" style="width:35px; height:35px;"><small class="text-muted">{{$pro->user->name}}</small>
                </h4>
            </div>
  </div>
  </div>

            @php
                $data = DB::table('projects')->where('id',$pro->id)->first();
                $kelompoks = explode('|', $data->kelompok);
                $komponen = explode('|', $data->komponen_id);
                $aplikasi = explode('|', $data->app_id);
                $refrensis = explode('|', $data->refrensi);
            @endphp

            <div class="card text-white bg-navy mb-3" style="max-width: 100%;">
            <div class="container ml-4">
            <div class="kelompok mt-5">
                <h4 class="fw-bold"><b>Komponen</b></h4>
                <table class="table">
                
                @foreach ($komponen as $ko)
                    @php  $dataKom = DB::table('komponens')->where('id',$ko)->get(); @endphp
                    @foreach ($dataKom as $kom)
                    <tr>
                    <div class="d-flex">
                        <td><img src="{{URL::to($kom->gambar_komponen)}}" style="width: 200px;" alt=""></td><td><p class="ml-2"><a href="{{ $kom->link_komponen }}" ><h3>{{$kom->nama_komponen}}</h3></a>{{ $kom->deskripsi_komponen }}</p></td> 
                     </div>
                     </tr>
                    @endforeach
                @endforeach
                </table>
            </div>
            </div>
            </div>


            <div class="card text-white bg-navy mb-3" style="max-width: 100%;">
            <div class="container ml-4">
            <div class="kelompok mt-5">
                <h4 class="fw-bold"><b>Aplikasi</b></h4>
                <table class="table">
                
                @foreach ($aplikasi as $apk)
                    @php  $dataApk = DB::table('aplikasis')->where('id',$apk)->get(); @endphp
                    @foreach ($dataApk as $ap)
                    <tr>
                    <div class="d-flex">
                        <td><img src="{{URL::to($ap->gambar)}}" style="width: 200px;" alt=""></td><td><p class="ml-2"><a href="{{ $ap->link }}" ><h3>{{$ap->nama}}</h3></a><br>{{ $ap->deskripsi}}</p></td> 
                     </div>
                     </tr>
                    @endforeach
                @endforeach
                </table>
            </div>
            </div>
            </div>

            <div class="kelompok mt-5">
                <h3 class="fw-bold"><b>Cara membuat</b></h3> 
                <p>{!!$pro->cara_membuat!!}</p>
            </div>

            <div class="kelompok mt-5">
                <div class="card-header bg-navy"><h4 class="fw-bold">Kode Program</h4></div>
                <a href="/storage/{{$pro->kode}}" download><i class="nav-icon fas fa-solid fa-download"></i>Download Source Code</a>
            </div>

            

            <div class="kelompok mt-5">
                <div class="card-header bg-navy"><h4 class="fw-bold">Laporan</h4></div>
                <a href="/storage/{{$pro->kode}}" download><i class="nav-icon fas fa-solid fa-download"></i>Download Laporan</a>
            </div>


<br>
            <div class="card text-white bg-dark mb-3" style="max-width: 100%;">
  <div class="card-header bg-navy">Kelompok</div>
  <div class="card-body">
  <table class="table">
  <tr><th>Nama</th><th>Angkatan</th></tr>
                    @foreach ($kelompoks as $kel)
                    @php  $dataKel = DB::table('mahasiswas')->where('id',$kel)->get(); @endphp
                     <tr> 
                    @foreach ($dataKel as $dk)
                    <td>
                        <h6>{{$dk->nama}}</h6></td><td> D3 Teknologi Komputer Angkatan {{ $dk->angkatan }}</h6>
                      </td>

                    @endforeach
   
                      </tr>      
                @endforeach
                
    </table>
                </ul>

  </div>
  </div>
                     <div class="card text-white bg-dark mb-2" style="max-width: 100%;">
  <div class="card-header bg-navy">Pembimbing</div>
  <div class="card-body">
               <td>
                      {{$pro->dospem}}
                      </td>
  </div></div>
        </div>

            <div class="kelompok mt-5">
                <h4 class="fw-bold">Refrensi</h4>
                <ul>
                @foreach ($refrensis as $ref)
                    @php  $dataRef = DB::table('projects')->where('id',$ref)->get(); @endphp
                    @foreach ($dataRef as $dref)
                        <p> 
                            <a href="/project/{{$dref->id}}">{{$dref->nama}}//dibuatoleh{{ $pro->user->name }}</a>
                        </p>
                    @endforeach
                @endforeach
            </ul>
            </div>

  <br><br><br>
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

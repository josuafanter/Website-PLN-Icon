
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>The Project</title>

  <!-- Google Font: Source Sans Pro -->
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Project</h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="content">
      <div class="container-fluid">
        <div class="container mt-2">
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Project</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/project" method="post" enctype="multipart/form-data"> 
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputFile">Nama Project</label>
                    <input name="nama" class="form-control" type="text" placeholder="Masukkan Nama Project">
              @error('nama')
                <small class="text-danger">{{$message}}</small>
              @enderror
                    <input name="user_id" class="form-control" type="hidden"  value="{{Auth::user()->id}}" placeholder="Masukkan Nama Project">
                  </div>
                  <div class="form-group">
                      <label>Deskripsi Project</label>
                      <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi Singkat Project Anda"></textarea>
              @error('deskripsi')
                <small class="text-danger">{{$message}}</small>
              @enderror
                  </div>
                  <div class="form-group">
                      <label for="exampleInputFile">Gambar Project</label>
                      <div class="input-group">
                        <div div class="custom-file">
                          <input name="gambar" type="file" class="custom-file-input" id="exampleInputFile">
              @error('gambar')
                <small class="text-danger">{{$message}}</small>
              @enderror
                          <label class="custom-file-label" for="exampleInputFile"> Masukkan Gambar Project</label>
                      </div>
                    </div>
                  </div>

                  

            <h5><b>Kelompok</b></h5>
            <div class="col-12 ">
              <div class="form-group">
                <label>Anggota </label>
                <select name="kelompok[]" class="selectpicker form-control"  multiple data-live-search="true" title="Masukkan Nama Mahasiswa">
                  @foreach ($mahasiswa as $k)
                  
                    <option value="{{$k->id}}">{{$k->nama}}</option>
                  @endforeach
                </select>
              @error('kelompok[]')
                <small class="text-danger">{{$message}}</small>
              @enderror
              </div>
            </div>

            <div class="col-12 ">
              <div class="form-group">
                <label>Komponen &nbsp;&nbsp;&nbsp;&nbsp;<a href="/user_komponen" class="btn btn-primary btn-sm ml-auto">+ Tambah Komponen</a></label>
                <select name="komponen_id[]" class="selectpicker form-control"  multiple data-live-search="true" title="Masukkan Komponen Digunakan">
                  @foreach ($komponen as $ke)
                    <option value="{{$ke->id}}">{{$ke->nama_komponen}}</option>
                  @endforeach
                </select>
              @error('komponen_id[]')
                <small class="text-danger">{{$message}}</small>
              @enderror
              </div>
              
            </div>

            <div class="col-12 ">
              <div class="form-group">
                <label>Aplikasi&nbsp;&nbsp;&nbsp;&nbsp;<a href="/user_aplikasi" class="btn btn-primary btn-sm ml-auto">+ Tambah Aplikasi</a></label></label>
                <select name="app_id[]" class="selectpicker form-control"  multiple data-live-search="true" title="Masukkan Aplikasi Digunakan">
                  @foreach ($aplikasi as $apk)
                    <option value="{{$apk->id}}">{{$apk->nama}}</option>
                  @endforeach
                </select>
                @error('app_id[]')
                <small class="text-danger">{{$message}}</small>
              @enderror
              </div>
            </div>

           
            <div class="col-12 ">
              <div class="form-group">
                <label>Refrensi </label>
                <select name="refrensi[]" class="selectpicker form-control"  multiple data-live-search="true" title="Referensi Project">
                  @foreach ($project as $proj)
                    <option value="{{$proj->id}}">{{$proj->nama}}</option>
                  @endforeach
                </select>
                @error('refrensi[]')
                <small class="text-danger">{{$message}}</small>
              @enderror
              </div>
            </div>
         
              <div class="col-12 ">
                <div class="form-group">
                  <label>Dosen Pembimbing </label>
                  <select name="dospem" class="form-control">
                    <option selected="selected">Nama dosen pembimbing</option>
                    @foreach ($dospem as $d)
                        <option value="{{$d->nama}}">{{$d->nama}}</option>
                    @endforeach
                  </select>
                  @error('dospem')
                <small class="text-danger">{{$message}}</small>
              @enderror
                </div>
              <!-- /.form-group -->
            </div>
              {{-- </form> --}}
            </div>

          </div>
        <!-- /.row -->
      </div>

      {{-- <div class="content">
      <div class="container-fluid">
        <div class="container mt-2">
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Komponen & Aplikasi</h3>
              </div>
                <div class="card-body">
                  <div class="col-12 ">
                    <div class="form-group">
                      <label>Anggota </label>
                      <select name="komp2[]" class="selectpicker form-control"  multiple data-live-search="true">
                        @foreach ($komponen as $ke)
                          <option value="{{$ke->id}}">{{$ke->id}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
            </div>

          </div>
      </div> 
      </div>    --}}

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="container mt-2">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">
                Cara Membuat
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <textarea name="cara_membuat" id="summernote">
                Cara membuat project
              </textarea>
              @error('cara_membuat')
                <small class="text-danger">{{$message}}</small>
              @enderror
                                <div class="form-group">
                        <label for="exampleInputFile">Kode Program</label>
                            <div class="input-group">
                                <div div class="custom-file">
                                    <input name="kode" type="file" class="custom-file-input" id="exampleInputFile">
              @error('kode')
                <small class="text-danger">{{$message}}</small>
              @enderror
                                    <label class="custom-file-label" for="exampleInputFile"> Masukkan Kode Project</label>
                                </div>
                    </div>
                  </div>

                      <div class="form-group">
                          <label for="exampleInputFile">Laporan</label>
                              <div class="input-group">
                                  <div div class="custom-file">
                                      <input name="laporan" type="file" class="custom-file-input" id="exampleInputFile">
              @error('laporan')
                <small class="text-danger">{{$message}}</small>
              @enderror
                                      <label class="custom-file-label" for="exampleInputFile"> Masukkan Dokumen Proyek</label>
                                  </div>
                      </div>
                  </div>
              
            </div>
            
          </div>
          
        </div>

        
        <!-- /.col-->
      </div>
      <!-- ./row -->

        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
<div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div><br>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    </form>

  <!-- Control Sidebar -->
                  
  <!-- /.control-sidebar -->
</div>

{{-- @push('styles')
 
@endpush --}}
@push('script')
  <script type="text/javascript">
  // $('.selectpicker').selectpicker();
  // $('.selectpicker1').selectpicker();
  // $('.selectpicker2').selectpicker();
  </script>
  <script type="text/javascript" src="{{asset('select/js/bootstrap-select.min.js')}}"></script>
@endpush

 @include('Template.footer')
<!-- ./wrapper -->

<!-- jQuery -->
@include('Template.scrip')
<!-- Page specific script -->
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
</body>
</html>

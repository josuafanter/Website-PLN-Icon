
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
            <h1 class="m-0">Edit Project</h1>
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
              <form action="/project/{{$pro->id}}" method="post" enctype="multipart/form-data"> 
                @method('put')
                @csrf

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputFile">Nama Project</label>
                    <input name="nama" class="form-control" type="text" value="{{$pro->nama}}" placeholder="Masukkan Nama Project">
                  </div>
                  <div class="form-group">
                      <label>Deskripsi Project</label>
                      <textarea name="deskripsi" class="form-control" rows="3"  placeholder="Deskripsi Singkat Project Anda">{{$pro->deskripsi}}</textarea>
                  </div>
                  <div class="form">
                      <label for="exampleInputFile">Gambar Project</label><br>
                      <img src="/storage/{{$pro->gambar}}" style="width: 50px;">
                      <div class="input-group">
                        <div div class="custom-file">
                          <input name="gambar" alue="{{$pro->gambar}}" type="file" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile"> Masukkan Gambar Project</label>
                      </div>
                    </div>
                  </div>
                  
                  
              @php
                $data = DB::table('projects')->where('id',$pro->id)->first();
                $kelompoks = explode('|', $data->kelompok);
                $komponens = explode('|', $data->komponen_id);
                $aplikasis = explode('|', $data->app_id);
                $refrensis = explode('|', $data->refrensi);
              @endphp

              {{-- @dd($kelompoks) --}}

{{-- @foreach ($kelompoks as $kel)
  @if (in_array($k->id,$kel))
      <p>ntap</p>
  @endif
@endforeach --}}

            <br>
            <h5><b>Kelompok</b></h5>
            <div class="col-12 ">
              <div class="form-group">
                <label>Anggota </label>
                <select name="kelompok[]" class="selectpicker form-control"   multiple data-live-search="true">
                  @foreach ($mahasiswa as $k)
                    
                    <option
                      @if (in_array($k->id,$kelompoks))
                          selected
                      @endif
                     value="{{$k->id}}">{{$k->nama}}
                    </option>
                    
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-12 ">
              <div class="form-group">
                <label>Komponen </label>
                <select name="komponen_id[]" class="selectpicker form-control"  multiple data-live-search="true">
                  @foreach ($komponen as $ke)
                  <option
                  @if (in_array($ke->id,$komponens))
                      selected
                  @endif
                 value="{{$ke->id}}">{{$ke->nama_komponen}}
                </option>
                    {{-- <option value="{{$ke->id}}">{{$ke->nama_komponen}}</option> --}}
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-12 ">
              <div class="form-group">
                <label>Aplikasi</label>
                <select name="app_id[]" class="selectpicker form-control"  multiple data-live-search="true">
                  @foreach ($aplikasi as $apk)
                  <option
                  @if (in_array($apk->id,$aplikasis))
                      selected
                  @endif
                 value="{{$apk->id}}">{{$apk->nama}}
                </option>
                  @endforeach
                </select>
              </div>
            </div>
         
              <div class="col-12 ">
                <div class="form-group">
                  <label>Dosen Pembimbing </label>
                  <select name="dospem" class="form-control">
                    <option selected="selected">Nama dosen pembimbing</option>
                    @foreach ($dospem as $d)
                        <option @if($d->id == $pro->dospem) selected @endif value="{{$d->nama}}">{{$d->nama}}</option>
                    @endforeach
                  </select>
                </div>
              <!-- /.form-group -->
            </div>

            <div class="col-12 ">
              <div class="form-group">
                <label>Referensi</label>
                <select name="refrensi[]" class="selectpicker form-control"  multiple data-live-search="true">
                  @foreach ($projek as $proj)
                  <option
                  @if (in_array($proj->id,$refrensis))
                      selected
                  @endif
                 value="{{$proj->id}}">{{$proj->nama}}
                </option>
                  @endforeach
                </select>
              </div>
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
               <div class="form">  
                    <label for="exampleInputFile">Kode Program</label><br>
                    <a href="/storage/{{$pro->kode}}" download>{{basename($pro->kode)}}</a>
                      <div class="input-group">
                          <div div class="custom-file">
                            <input alue="{{$pro->kode}}" name="kode" type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile"> Masukkan Kode Project</label>
                          </div>
                      </div>
                  </div><br>

                      <div class="form">
                          <label for="exampleInputFile">Laporan</label><br>
                          <a href="/storage/{{$pro->laporan}}" download>{{basename($pro->laporan)}}</a>
                              <div class="input-group">
                                  <div div class="custom-file">
                                      <input value="{{$pro->laporan}}" name="laporan" type="file" class="custom-file-input" id="exampleInputFile">
                                      <label class="custom-file-label" for="exampleInputFile"> Masukkan Dokumen Proyek</label>
                                  </div>
                      </div>
                  </div><br>
                  {{-- <div class="form-group">
                  <label>Referensi</label>
                  <select name="refrensi" class="form-control select2" style="width: 100%;">
                    @foreach ($projek as $proj)
                        <option @if($proj->id == $pro->refrensi) selected @endif value="{{$proj->id}}">{{$proj->nama}}</option>
                    @endforeach
                  </select>
                </div> --}}
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

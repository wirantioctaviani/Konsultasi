<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Konsultasi Online | Pusbin JFA</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/adminlte/dist/css/adminlte.min.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/summernote/summernote-bs4.min.css')}}">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/codemirror/codemirror.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/codemirror/theme/monokai.css')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('adminlte/dist/img/pusbin.png')}}">
</head>
<style>
        /* untuk menghilangkan spinner  */
        .spinner {
            display: none;
        }
</style>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper" style="background-color: #2596be;">
  <div class="header" style="background-color: white;">
    <div class="row mb-2">
          <div class="col-sm-1">
          </div>
          <div class="col-sm-3">
            <img src="{{asset('adminlte/dist/img/pusbin.png')}}" class="img-responsive" style="opacity: .8; width: 130px; height: 120px;">
          </div>
          <div class="col-sm-8">
            <h1 style="margin-top: 30px;">Layanan Konsultasi Online Pusbin JFA</h1>
            </div>
          </div>
    </div>
  <div class="container-fluid" style="width: 1500px;"> 
      <section class="content-header">
        <div class="container-fluid">
          @if(session('sukses'))
          <div class="alert alert-success" role="alert">
          {{session('sukses')}}
          </div>
          @endif
          <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
    <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <!-- /.card-header -->
                  <div class="card-body">
                @foreach($data_konsul_online as $data_konsul_online)
                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">No Tiket : </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="nama" value="{{$data_konsul_online->no_tiket}}" disabled="">
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Nama : </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="nama" value="{{$data_konsul_online->nama}}" disabled="">
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Unit Kerja : </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="unit_kerja" value="{{$data_konsul_online->unit_kerja}}" disabled="">
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Jabatan : </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="jabatan" value="{{$data_konsul_online->jabatan}}" disabled="">
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Jenis Layanan : </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="jabatan" value="{{$data_konsul_online->jenis_layanan}}" disabled="">
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Judul Konsultasi : </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="jabatan" value="{{$data_konsul_online->judul}}" disabled="">
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>
                      <br>
                      @endforeach

                      <div class="timeline">
                          <!-- timeline time label -->
                          @foreach($data_konsul_detail as $data_konsul_detail)
                          <div class="time-label">
                            <span class="bg-gray">{{\Carbon\Carbon::parse($data_konsul_detail->created_at)->format('d M Y')}}</span>
                          </div>
                          <!-- /.timeline-label -->
                          <!-- timeline item -->
                          
                          <div>
                            <i class="far fa-comments bg-gray"></i>
                            <div class="timeline-item">
                              <span class="time"><i class="fas fa-clock"></i> {{date("d-m-Y H:i:s", strtotime($data_konsul_detail->created_at))}}</span>
                              <h3 class="timeline-header"><b>{{$data_konsul_detail->created_by}}</b> said</h3>

                              <div class="timeline-body">
                                {!!$data_konsul_detail->details!!}
                              </div>
                            </div>
                            @if($data_konsul_detail->dokumen != null)
                            <div class="timeline-item">
                              <div class="timeline-header">
                                  <label class="">Dokumen / File Pendukung    : </label>
                                  <a href="{{ url('/').'/dokumen/'.$data_konsul_detail->dokumen }}" target="_blank">{{ $data_konsul_detail->dokumen }}</a>
                                  <!-- <input type="hidden" name="no_tiket" value="{{$data_konsul_detail->no_tiket}}" class="form-control"> -->
                              </div>
                              <!-- @if($data_konsul_detail->is_answered = 2)
                              <div class="timeline-body">
                                <label style="color: red;">*Approved by Subkoordinator at {{$data_konsul_detail->updated_at}}</label>
                              </div>
                              @endif -->
                          </div>
                          @endif
                          </div>
                          @endforeach
                      </div>

              @if($data_konsul_online->status_id == '1' || $data_konsul_online->status_id == '0')
                  <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                      <div class="container-fluid">
                        <div class="accordion" id="accordionExample">
                          <div class="card">
                            <div class="card-header" id="headingThree">
                              <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  <h5><i class="fas fa-plus"></i> Kirim Respon </h5>
                                </button>
                              </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                              <div class="card-body">
                                <form class="form-prevent" action="{{ action('App\Http\Controllers\UsersController@ask_konsulonline', [$data_konsul_detail->id_konsul]) }}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id_konsul" value="{{$data_konsul_detail->id_konsul}}" class="form-control">
                                        <input type="hidden" name="no_tiket" value="{{$data_konsul_online->no_tiket}}" class="form-control">
                                        <input type="hidden" name="pic_id" value="{{$data_konsul_online->pic_id}}" class="form-control">
                                        <input type="hidden" name="koor_id" value="{{$data_konsul_online->koor_id}}" class="form-control">
                                        <input type="hidden" name="nama" value="{{$data_konsul_online->nama}}" class="form-control">
                                        <div class="form-group">
                                            <label for="">Detail</label>
                                            <textarea id="summernote" name="details" cols="30" rows="10" class="form-control"required></textarea>
                                        </div>
                                        <div class="form-group">
                                                            <label for="exampleInputFile">Dokumen Pendukung</label>
                        <input type="file" name="dokumen" class="form-control" id="dokumen" accept="image/*, application/pdf, application/msword">
                                                          </div>
                                        <!-- <button type="submit" class="btn btn-primary btn-sm">Submit</button> -->
                                        <button class="btn btn-info button-prevent" type="submit">
                                            <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                            <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Submit </div>
                                            <div class="hide-text">Submit</div>
                                        </button>
                                    </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                    </div> 
                  </div>
              @endif


              @if($data_konsul_online->status_id == '3')
                <div class="panel-body">
                    <div class="col text-center">
                        <form class="form-prevent" action="{{ action('App\Http\Controllers\UsersController@closed_konsulonline', [$data_konsul_detail->id_konsul]) }}" method="post">
                                        {{csrf_field()}}
                                        <!-- <button type="submit" onclick="return confirm('Close Konsultasi?')" class="btn btn-primary btn-lg" >Close Case</button> -->
                                        <label style="color: black;">Terima kasih telah menggunakan layanan konsultasi online Pusbin JFA.</label>
                                        <label style="color: black;">Apabila layanan konsultasi sudah selesai, mohon untuk menutup tiket konsultasi ini dengan menekan tombol "Close Case" dibawah ini.</label>
                                        <label style="color: black;">Sistem akan melakukan close tiket secara otomatis dalam waktu 60 menit.</label>
                                        <br/>
                                        <br/>
                                        <button class="btn btn-info button-prevent" type="submit" onclick="return confirm('Close Konsultasi?')">
                                            <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                            <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Close Case </div>
                                            <div class="hide-text">Close Case</div>
                                        </button>
                                        <br>
                                        <br>
                                        <input type="hidden" name="id_konsul" value="{{$data_konsul_detail->id_konsul}}" id="parent_id" class="form-control">
                                        <input type="hidden" name="nama" value="{{$data_konsul_online->nama}}" class="form-control">
                                        <input type="hidden" name="no_tiket" value="{{$data_konsul_detail->no_tiket}}" class="form-control">
                                        <input type="hidden" name="id_detail" value="{{$data_konsul_detail->id_detail}}" id="parent_id" class="form-control">
                        </form>
                    </div>
                </div>

                  <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                      <div class="container-fluid">
                        <div class="accordion" id="accordionExample">
                          <div class="card">
                            <div class="card-header" id="headingThree">
                              <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  <h5><i class="fas fa-plus"></i> Respon </h5>
                                </button>
                              </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                              <div class="card-body">
                                <form class="form-prevent" action="{{ action('App\Http\Controllers\UsersController@reply_konsulonline', [$data_konsul_detail->id_konsul]) }}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id_konsul" value="{{$data_konsul_detail->id_konsul}}" class="form-control">
                                        <input type="hidden" name="no_tiket" value="{{$data_konsul_online->no_tiket}}" class="form-control">
                                        <input type="hidden" name="pic_id" value="{{$data_konsul_online->pic_id}}" class="form-control">
                                        <input type="hidden" name="koor_id" value="{{$data_konsul_online->koor_id}}" class="form-control">
                                        <input type="hidden" name="nama" value="{{$data_konsul_online->nama}}" class="form-control">
                                        <div class="form-group">
                                            <label for="">Detail</label>
                                            <textarea id="summernote" name="details" cols="30" rows="10" class="form-control"required></textarea>
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputFile">Dokumen Pendukung</label>
                                        <input type="file" name="dokumen" class="form-control" id="dokumen" accept="image/*, application/pdf, application/msword">
                                                          </div>
                                        <!-- <button type="submit" class="btn btn-primary btn-sm">Submit</button> -->
                                        <button class="btn btn-info button-prevent" type="submit">
                                            <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                            <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Submit </div>
                                            <div class="hide-text">Submit</div>
                                        </button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                    </div>
                  </div>
              @endif
            </div>
                  <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
  </div>
  <div class="footer" style="background-color: black; height: 70px;">
    <div class="container" style="margin-top:20px">
      <div class="row">
        <div class="col-md-12">
          <h5 style="text-align: center; color: white;margin-top: 20px">Copyright &copy; 2021 <a href="pusbinjfa.bpkp.go.id">Pusbin JFA</a>. All rights reserved. </h5>
        </div>
      </div>
    </div>
  </div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('/adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- Summernote -->
  <script src="{{asset('adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <!-- CodeMirror -->
  <script src="{{asset('adminlte/plugins/codemirror/codemirror.js')}}"></script>
  <script src="{{asset('adminlte/plugins/codemirror/mode/css/css.js')}}"></script>
  <script src="{{asset('adminlte/plugins/codemirror/mode/xml/xml.js')}}"></script>
  <script src="{{asset('adminlte/plugins/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
<script>
    $(function () {
      // Summernote
      // $('#summernote').summernote()

      // // CodeMirror
      // CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      //   mode: "htmlmixed",
      //   theme: "monokai"
      // });
      $('#summernote').summernote({
  toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['fontname', ['fontname']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']]
  ]
});
    })
  </script>
  <script>
        // jika form-prevent disubmit maka disable button-prevent dan tampilkan spinner
        (function () {
            $('.form-prevent').on('submit', function () {
                $('.button-prevent').attr('disabled', 'true');
                $('.spinner').show();
                $('.hide-text').hide();
            })
        })();
</script> 
</body>
</html>

@extends('admin.master2')

@section('content')
<section class="content-header">
</section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">LAYANAN KONSULTASI</h3>
              </div>
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

                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">PIC Konsultasi: </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="jabatan" value="{{$data_konsul_online->name}}" disabled="">
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>
                      <br>
                      <br>
                      @endforeach


                      <h4>Tanya Jawab Konsultasi </h4>
                      <div class="timeline">
                          <!-- timeline time label -->
                          @foreach($data_konsul_detail as $data_konsul_detail)
                          <div class="time-label">
                            <span class="bg-gray">{{date("d M Y", strtotime($data_konsul_detail->created_at))}}</span>
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

                   @if(request()->session()->get('level') == '3' && $data_konsul_online->status_id == '2')
                  <div class="panel-body">
                    <div class="col text-center">
                        <form class="form-prevent" action="{{ action('App\Http\Controllers\AdminController@approve_konsulonline', [$data_konsul_detail->id_konsul]) }}" method="post">
                        <!-- /respon/approve/{{$data_konsul_detail->id_konsul}} -->
                                        {{csrf_field()}}
                                        <!-- <button type="submit" onclick="return confirm('Approve Jawaban?')" class="btn btn-primary btn-lg" >Approve</button> -->
                                        <button class="btn btn-info button-prevent" type="submit" onclick="return confirm('Approve Jawaban?')" >
                                                          <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                                          <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Approve </div>
                                                          <div class="hide-text">Approve</div>
                                         </button>
                                        <br>
                                        <br>
                                        <input type="hidden" name="id_konsul" value="{{$data_konsul_detail->id_konsul}}" id="parent_id" class="form-control">
                                        <input type="hidden" name="no_tiket" value="{{$data_konsul_detail->no_tiket}}" class="form-control">
                                        <input type="hidden" name="id_detail" value="{{$data_konsul_detail->id_detail}}" id="parent_id" class="form-control">
                                        <input type="hidden" name="koor_id" value="{{$data_konsul_online->koor_id}}" class="form-control">
                                        <input type="hidden" name="email_user" value="{{$data_konsul_online->email_user}}" class="form-control">
                                        <input type="hidden" name="nama" value="{{$data_konsul_online->nama}}" class="form-control">
                        </form>
                    </div>
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
                                  <h5><i class="fas fa-plus"></i>  Revisi Jawaban</h5>
                                </button>
                              </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                              <div class="card-body">
                                <form class="form-prevent" action="{{ action('App\Http\Controllers\AdminController@revisi_konsulonline', [$data_konsul_detail->id_konsul]) }}" method="post" enctype="multipart/form-data">
                                <!-- /respon/revisi/{{$data_konsul_detail->id_konsul}} -->
                                                          {{csrf_field()}}
                                                          <input type="hidden" name="id_konsul" value="{{$data_konsul_detail->id_konsul}}" id="parent_id" class="form-control">
                                                          <input type="hidden" name="no_tiket" value="{{$data_konsul_online->no_tiket}}" class="form-control">
                                                          <input type="hidden" name="koor_id" value="{{$data_konsul_online->koor_id}}" class="form-control">
                                                          <input type="hidden" name="email_user" value="{{$data_konsul_online->email_user}}" class="form-control">
                                                          <input type="hidden" name="nama" value="{{$data_konsul_online->nama}}" class="form-control">
                                                          <div class="form-group">
                                                              <textarea id="summernote" name="details" cols="30" rows="10" class="form-control" >{{ Request::old('details', $data_konsul_detail->details) }}</textarea>
                                                          </div>
                                                          <div class="form-group">
                                                            <label for="exampleInputFile">Dokumen/File Pendukung</label><br>
                                                            <a href="{{ url('/').'/dokumen/'.$data_konsul_detail->dokumen }}" target="_blank">{{ $data_konsul_detail->dokumen }}</a>
                                                            <br> <input type="checkbox" value="1" name="is_delete" id="is_active"> Hapus Berkas</input><br>
                                                            <br>
                                                            <input type="file" name="dokumen" class="form-control" id="dokumen" accept="image/*, application/pdf, application/msword">
                                                            <input type="hidden" name="dokumenold" class="form-control" id="dokumen" value="{{ $data_konsul_detail->dokumen }}">
                                                          </div>
                                                          <!-- <button type="submit" class="btn btn-primary btn-md">Revise</button> -->
                                                          <button class="btn btn-info button-prevent" type="submit">
                                                          <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                                          <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Revisi </div>
                                                          <div class="hide-text">Revisi</div>
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
              <!-- /.card-body -->

              @if(request()->session()->get('level') == '4')
              @if($data_konsul_online->status_id == '0' || $data_konsul_online->status_id == '1')
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
                                  <h5><i class="fas fa-plus"></i>  Balas Pertanyaan </h5>
                                </button>
                              </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                              <div class="card-body">
                                <form class="form-prevent" action="{{ action('App\Http\Controllers\AdminController@reply_konsulonline', [$data_konsul_detail->id_konsul]) }}" method="post" enctype="multipart/form-data">
                                <!-- /respon/reply/{{$data_konsul_detail->id_konsul}} -->
                                        {{csrf_field()}}
                                        <input type="hidden" name="id_konsul" value="{{$data_konsul_detail->id_konsul}}" class="form-control">
                                        <input type="hidden" name="no_tiket" value="{{$data_konsul_online->no_tiket}}" class="form-control">
                                        <input type="hidden" name="koor_id" value="{{$data_konsul_online->koor_id}}" class="form-control">
                                        <input type="hidden" name="email_user" value="{{$data_konsul_online->email_user}}" class="form-control">
                                        <input type="hidden" name="nama" value="{{$data_konsul_online->nama}}" class="form-control">
                                        <div class="form-group">
                                            <label for="">Balas Pertanyaan</label>
                                            <textarea id="summernote" name="details" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Dokumen Pendukung</label>
                                            <input type="file" name="dokumen" class="form-control" id="dokumen" accept="image/*, application/pdf, application/msword">
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="is_answered" name="is_answered" value="1">
                                            <label for="">Forward Atasan</label>
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
                  <a href="{{ action('App\Http\Controllers\AdminController@list_konsulonline_open') }}" class="btn btn-default">Kembali</a>
                  @endif
              @endif
              <br>
              <br>
              
              <!-- UNTUK HISTORY PIC -->

            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->

</section>


@endsection



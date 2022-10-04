@extends('users.master')

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

              @if($data_konsul_online->status_id == '1')
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
                                <form action="{{ action('App\Http\Controllers\UsersController@ask_konsulonline', [$data_konsul_detail->id_konsul]) }}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id_konsul" value="{{$data_konsul_detail->id_konsul}}" class="form-control">
                                        <input type="hidden" name="no_tiket" value="{{$data_konsul_online->no_tiket}}" class="form-control">
                                        <input type="hidden" name="nama" value="{{$data_konsul_online->nama}}" class="form-control">
                                        <div class="form-group">
                                            <label for="">Detail</label>
                                            <textarea id="summernote" name="details" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                                            <label for="exampleInputFile">Dokumen Pendukung</label>
                        <input type="file" name="dokumen" class="form-control" id="dokumen" accept="image/*, application/pdf, application/msword">
                                                          </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
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
                        <form action="{{ action('App\Http\Controllers\UsersController@closed_konsulonline', [$data_konsul_detail->id_konsul]) }}" method="post">
                                        {{csrf_field()}}
                                        <button type="submit" onclick="return confirm('Close Konsultasi?')" class="btn btn-primary btn-lg" >Case Closed</button>
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
                                <form action="{{ action('App\Http\Controllers\UsersController@reply_konsulonline', [$data_konsul_detail->id_konsul]) }}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id_konsul" value="{{$data_konsul_detail->id_konsul}}" class="form-control">
                                        <input type="hidden" name="no_tiket" value="{{$data_konsul_online->no_tiket}}" class="form-control">
                                        <div class="form-group">
                                            <label for="">Detail</label>
                                            <textarea id="summernote" name="details" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                                            <label for="exampleInputFile">Dokumen Pendukung</label>
                        <input type="file" name="dokumen" class="form-control" id="dokumen" accept="image/*, application/pdf, application/msword">
                                                          </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
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
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
</section>


@endsection



@extends('admin.master2')

@section('content')
<?php date_default_timezone_set("Asia/Jakarta"); ?>
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
                            <span class="bg-gray">{{date("d-m-Y", strtotime($data_konsul_detail->created_at))}}</span>
                          </div>
                          <!-- /.timeline-label -->
                          <!-- timeline item -->
                          
                          <div>
                            <i class="fas fa-envelope bg-gray"></i>
                            <div class="timeline-item">
                              <span class="time"><i class="fas fa-clock"></i> {{date("d-m-Y", strtotime($data_konsul_detail->created_at))}}</span>
                              <h3 class="timeline-header"><b>{{$data_konsul_detail->created_by}}</b> said</h3>

                              <div class="timeline-body">
                                {!!$data_konsul_detail->details!!}
                              </div>
                            </div>
                            @if($data_konsul_detail->dokumen != null)
                            <div class="timeline-item">
                              <div class="timeline-header">
                                  <label class="">Dokumen / File Pendukung    : </label>
                                  <a href="{{ url('/dokumen/'.$data_konsul_detail->dokumen) }}" target="_blank">{{ $data_konsul_detail->dokumen }}</a>
                                </div>
                          </div>
                          @endif
                          </div>
                          @endforeach
                      </div>

                   @if(auth()->user()->role == 'subkoordinator' && $data_konsul_online->id_status == '2')
                  <div class="panel-body">
                    <div class="col text-center">
                        <form action="/respon/approve" method="post">
                                        {{csrf_field()}}
                                        <button type="submit" onclick="return confirm('Approve Jawaban?')" class="btn btn-primary btn-lg" >Approve</button>
                                        <br>
                                        <br>
                                        <input type="hidden" name="id_konsul" value="{{$data_konsul_detail->id_konsul}}" id="parent_id" class="form-control">
                                        <input type="hidden" name="id_detail" value="{{$data_konsul_detail->id_detail}}" id="parent_id" class="form-control">
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
                                <form action="/respon/revisi" method="post">
                                                          {{csrf_field()}}
                                                          <input type="hidden" name="id_konsul" value="{{$data_konsul_detail->id_konsul}}" id="parent_id" class="form-control">
                                                          <div class="form-group">
                                                              <textarea id="summernote" name="details" cols="30" rows="10" class="form-control" >{{{ Request::old('details', $data_konsul_detail->details) }}}</textarea>
                                                          </div>
                                                          <div class="form-group">
                                                            <label for="exampleInputFile">Dokumen/File Pendukung</label>
                                                                <input type="file" name="dokumen" class="form-control" id="dokumen" accept="image/*, application/pdf, application/msword">
                                                          </div>
                                                          <button type="submit" class="btn btn-primary btn-sm">Revise</button>
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

              @if(auth()->user()->role == 'pic' && $data_konsul_online->id_status == '1')
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
                                <form action="/respon/reply" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id_konsul" value="{{$data_konsul_detail->id_konsul}}" id="parent_id" class="form-control">
                                        <div class="form-group">
                                            <label for="">Balas Pertanyaan</label>
                                            <textarea id="summernote" name="details" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                                            <label for="exampleInputFile">Dokumen/File Pendukung</label>
                                                                <input type="file" name="dokumen" class="form-control" id="dokumen" accept="image/*, application/pdf, application/msword">
                                                          </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="is_answered" name="is_answered" value="1">
                                            <label for="">Forward Atasan</label>
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



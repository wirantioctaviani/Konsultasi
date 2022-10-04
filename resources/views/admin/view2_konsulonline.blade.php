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
                          <input type="text" class="form-control" id="no_tiket" value="{{$data_konsul_online->no_tiket}}" disabled="">
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
                                </div>
                            </div>
                          @endif

                          @if($data_konsul_detail->is_answered == 2)
                            <div class="timeline-item">
                              <div class="timeline-header">
                                  <label style="color: black;">*Approved by Subkoordinator at {{date("d M Y H:i", strtotime($data_konsul_detail->updated_at))}}</label>
                                </div>
                            </div>
                            @elseif($data_konsul_detail->is_answered == 3)
                            <div class="timeline-item">
                              <div class="timeline-header">
                                  <label style="color: black;">*Revised by Subkoordinator ({{$data_konsul_detail->created_by}}) at {{date("d M Y H:i", strtotime($data_konsul_detail->updated_at))}}</label>
                                </div>
                            </div>
                            @elseif($data_konsul_detail->is_answered == 1)
                            <div class="timeline-item">
                              <div class="timeline-header">
                                  <label style="color: black;">*Jawaban tidak dikirimkan user</label>
                                </div>
                            </div>
                          @endif

                          </div>
                          @endforeach
                      </div>

              </div>
                          @foreach($datarating as $datarating)
                          @if($datarating->status_id == '4')
                          <div class="panel-body">
                              <div class="col text-center">
                                                  <!-- <button type="submit" onclick="return confirm('Close Konsultasi?')" class="btn btn-primary btn-lg" >Close Case</button> -->
                                                  <label style="color: black;font-size: 20px">Tiket ini sudah close. Klik tombol di bawah ini untuk melihat penilaian dari penanya.</label>
                                                  <br>
                                                  <br>
                                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-ratting">Lihat Penilaian</button>
                                                  <br>
                                                  <br>
                                                  <br>
                              </div>
                          </div>
                          @endif
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
</section>

<div class="modal fade" id="modal-ratting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="{{ action('App\Http\Controllers\UsersController@store_rating', [$data_konsul_detail->id_konsul]) }}" method="POST">
                    @csrf
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ulasan Penanya Terkait Konsultasi Online Pusbin JFA Tiket #{{$datarating->no_tiket}} </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>

                            @if($datarating->rating != null)
                                <div class="modal-body" style="text-align: center;">
                                          @for ($i = 0; $i < 5; $i++)
                                            @if ($i < $datarating->rating)
                                              <span class="fa fa-star fa-3x" style="color: orange;"></span>
                                            @else
                                              <span class="fa fa-star fa-3x" style="color: black;"></span>
                                            @endif
                                          @endfor
                                      
                                    <div class="form-group">
                                      <br>
                                          <div class="timeline-body">
                                            <textarea class="form-control" rows="4" readonly>{{$datarating->ulasan}}</textarea>
                                            <h6 class="modal-title" style="text-align: left;">{{date("d M Y H:i", strtotime($datarating->created_at))}}</h6>
                                          </div>
                                    </div>
                                </div>
                            @else
                                <h3 style="text-align: center;">Belum ada penilaian</h3>
                            @endif

                            @endforeach
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
              </div>

@stop



@extends('admin.master')

@section('content')
<div class="main">
      <!-- MAIN CONTENT -->
      <div class="main-content">
        <div class="container-fluid">
          <div class="row">
              <!-- TABLE HOVER -->
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-heading">
                  <h2 class="panel-title">Layanan Konsultasi</h2>
                </div>

                  <div class="panel-body">
                    @foreach($data_konsul_online as $data_konsul_online)
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input name="nama" type="text" value="{{$data_konsul_online->nama}}" class="form-control" id="exampleInputEmail1" placeholder="Enter nama" disabled="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Unit Kerja</label>
                        <input name="nama" type="text" value="{{$data_konsul_online->unit_kerja}}" class="form-control" id="exampleInputEmail1" placeholder="Enter nama" disabled="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Jabatan</label>
                        <input name="nama" type="text" value="{{$data_konsul_online->jabatan}}" class="form-control" id="exampleInputEmail1" placeholder="Enter nama" disabled="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Layanan</label>
                        <input name="nama" type="text" value="{{$data_konsul_online->jenis_layanan}}" class="form-control" id="exampleInputEmail1" placeholder="Enter nama" disabled="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Judul</label>
                        <input name="nama" type="text" value="{{$data_konsul_online->judul}}" class="form-control" id="exampleInputEmail1" placeholder="Enter nama" disabled="">
                      </div>
                      <br>
                      <br>
                      @endforeach

                    
                    <div class="tab-content">
                      <div class="tab-pane fade in active" id="tab-bottom-left1">
                        <ul class="comment-section">
                        <ul class="list-unstyled activity-timeline">
                          @foreach($data_konsul_detail as $data_konsul_detail)
                          <li>
                            <i class="fa fa-comment activity-icon"></i>
                            <p>{{$data_konsul_detail->detail}}<span class="timestamp">{{$data_konsul_detail->created_by}} {{$data_konsul_detail->created_at}}</span></p>
                          </li>
                          @endforeach 
                        </ul>
                        </ul>
                      </div>
                    </div>
                  </div>

                  @if(auth()->user()->role == 'pic')
                  <div class="panel-body">
                        <form action="/respon/reply" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id_konsul" value="{{$data_konsul_detail->id_konsul}}" id="parent_id" class="form-control">
                                        <div class="form-group">
                                            <label for="">Balas Pertanyaan</label>
                                            <textarea name="detail" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="is_answered" name="is_answered" value="1">
                                            <label for="">Forward Atasan</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </form>
                  </div>

                  @elseif(auth()->user()->role == 'subkoordinator')
                  <div class="panel-body">
                        <form action="/respon/reply" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id_konsul" value="{{$data_konsul_detail->id_konsul}}" id="parent_id" class="form-control">
                                        <div class="form-group">
                                            <label for="">Balas Pertanyaan</label>
                                            <textarea name="detail" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="is_answered" name="is_answered" value="3">
                                            <label for="">Approved</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </form>
                  </div>
                  @endif

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END MAIN CONTENT -->
</div>
@stop



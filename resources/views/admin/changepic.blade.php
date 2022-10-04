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
                <h3 class="card-title">PERGANTIAN PIC LAYANAN KONSULTASI</h3>
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
                      @endforeach
                      <form class="form-prevent" action="{{ action('App\Http\Controllers\AdminController@changepic_proses', [$data_konsul_online->id_konsul]) }}" method="post">
                      <input type="hidden" name="id_konsul" value="{{$data_konsul_online->id_konsul}}" class="form-control">
                      <input type="hidden" name="no_tiket" value="{{$data_konsul_online->no_tiket}}" class="form-control">
                      <input type="hidden" name="pic_id_lama" value="{{$data_konsul_online->pic_id}}" class="form-control">
                      <input type="hidden" name="layanan_id" value="{{$data_konsul_online->layanan_id}}" class="form-control"> 
                      <input type="hidden" name="subbid_id" value="{{$data_konsul_online->subbid_id}}" class="form-control">     
                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Jenis Layanan Baru : </label>
                        <div class="col-sm-6">
                          <select name="id_layanan_baru" id="id_layanan_baru" class="form-control input-lg dynamic" data-dependent="pic_id">
                                  <option value="option_select" disabled selected>Pilih Layanan</option>
                                  @foreach($data_layanan as $data_layanan)
                                  <option value="{{$data_layanan->id}}">{{$data_layanan->jenis_layanan}}</option>
                                  @endforeach
                          </select>
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>
                      
                      @if(request()->session()->get('level') == "1" || request()->session()->get('level') == "3")
                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">New PIC : </label>
                        <div class="col-sm-6">
                          <select name="pic_id" id="pic_id" class="form-control input-lg">
                                  <option value="">Pilih PIC</option>
                          </select>
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>
                      @endif
                      @if(request()->session()->get('level') == "4")
                        @if(request()->session()->get('subbid') == "11" || request()->session()->get('subbid') == "21")
                          <div class="form-group row">
                            <div class="col-sm-2">
                            </div>
                            <label class="col-sm-2 col-form-label">New PIC : </label>
                            <div class="col-sm-6">
                              <select name="pic_id" id="pic_id" class="form-control input-lg">
                                      <option value="">Pilih PIC</option>
                              </select>
                            </div>
                            <div class="col-sm-2">
                            </div>
                          </div>
                        @endif
                      @endif
                      
                      {{ csrf_field() }}
                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Keterangan Pergantian PIC : </label>
                        <div class="col-sm-6">
                          <textarea name="ket_pic" rows="4" cols="91" required></textarea>
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col text-center">
                          <a href="{{ action('App\Http\Controllers\AdminController@list_konsulonline_open') }}" class="btn btn-default">Cancel</a>
                          <button class="btn btn-info button-prevent" type="submit">
                                                          <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                                          <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Save </div>
                                                          <div class="hide-text">Save</div>
                                         </button>
                        </div>
                      </div>
                      </form>

              </div>
              <!-- /.card-body -->
              <br>
              <br>
              
              @if(!$data_history_pic->isEmpty())
              <div class="card-body">
                <h4>History Pergantian PIC Konsultasi </h4>
                      <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Jenis Layanan Lama</th>
                          <th>PIC Lama</th>
                          <th>Changed at</th>
                          <th>Keterangan</th>
                        </tr>
                        </thead> 
                        <tbody>
                        @foreach($data_history_pic as $data_history_pic)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{$data_history_pic->jenis_layanan}}</td>
                          <td>{{$data_history_pic->name}}</td>
                          <td>{{date("d M Y H:i", strtotime($data_history_pic->created_at))}}</td>
                          <td>{{$data_history_pic->ket_pic}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                  </table>
                      <br>
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

@stop



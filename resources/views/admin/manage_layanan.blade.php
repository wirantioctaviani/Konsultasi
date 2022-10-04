@extends('admin.master2')

@section('content')

<section class="content-header">
</section>

<section class="content">
      <div class="container-fluid">
        @if(session('sukses'))
        <div class="alert alert-success" role="alert">
        {{session('sukses')}}
        </div>
        @endif
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">LIST LAYANAN KONSULTASI</h3>
              </div>
                    
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-default" data-toggle='modal' data-target="#ModalAddLayanan"><i class="nav-icon fas fa-plus"></i>  Add Layanan</button>
               <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Jenis Layanan</th>
                          <th>Sub Bidang</th>
                          <th>Active</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($data_layanan as $layanan)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{$layanan->jenis_layanan}}</td>
                          <td>{{$layanan->nama_bidang}}</td>
                          @if($layanan->status == 1)
                                <td>{{'Yes'}}</td>
                                <td>
                            <div class="btn-group-vertical">
                              <a href="{{ action('App\Http\Controllers\AdminController@inactivate_layanan', [encrypt($layanan->layanan_id)]) }}" onclick="return confirm('Non-Aktifkan Layanan ?')" class="btn btn-default">Non-Activate</a>
                              <!-- <button type="button" class="btn btn-default" data-toggle='modal' data-target="#Modal-nonactive">Non-Active</button> -->
                            </div>
                          </td>
                          @else
                                <td>{{'No'}}</td>
                                <td>
                            <div class="btn-group-vertical">
                              <a href="{{ action('App\Http\Controllers\AdminController@activate_layanan', [encrypt($layanan->layanan_id)]) }}" onclick="return confirm('Aktifkan Layanan ?')" class="btn btn-default">Activate</a>
                              <!-- <button type="button" class="btn btn-default" data-toggle='modal' data-target="#Modal-nonactive">Non-Active</button> -->
                            </div>
                          </td>
                          @endif
                        </tr>
                        @endforeach
                        </tbody>
                  </table>
              </div>
              <!-- /.card-body -->

              <div class="modal fade" id="ModalAddLayanan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Add Layanan</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form action="{{ action('App\Http\Controllers\AdminController@create_layanan') }}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Jenis Layanan</label>
                                <input name="jenis_layanan" type="text" class="form-control" id="exampleInputnama1">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputbidang1" class="form-label">Bidang</label>
                                  <select name="subbid_id" class="form-control" aria-label="Default select example">
                                    <option value="option_select" disabled selected>Pilih Bidang</option>
                                    @foreach($data_bidang as $data_bidang)
                                    <option value="{{$data_bidang->subbid_id}}">{{$data_bidang->nama_bidang}}</option>
                                    @endforeach
                                  </select>
                                </select>
                              </div>
                            <div class="modal-footer">
                              <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>



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



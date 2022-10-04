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
                  <h2 class="panel-title">List Konsultasi</h2>
                </div>


                <div class="panel-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama User</th>
                          <th>Jabatan</th>
                          <th>Unit Kerja</th>
                          <th>Layanan</th>
                          <th>Judul</th>
                          <th>PIC</th>
                          <th>Submitted at</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        </thead> 
                        <tbody>
                          @foreach($data_konsul_online as $data_konsul_online)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{$data_konsul_online->nama}}</td>
                          <td>{{$data_konsul_online->jabatan}}</td>
                          <td>{{$data_konsul_online->unit_kerja}}</td>
                          <td>{{$data_konsul_online->jenis_layanan}}</td>
                          <td>{{$data_konsul_online->judul}}</td>
                          <td>{{$data_konsul_online->nama}}</td>
                          <td>{{$data_konsul_online->created_at}}</td>
                          <td>{{$data_konsul_online->nama_status}}</td>
                          <td>
                            <div class="btn-group-vertical">
                              <a href="/admin_konsul_online/{{$data_konsul_online->id_konsul}}/respon" class="btn btn-default">Detail</a>
                              <button type="button" class="btn btn-default" data-toggle='modal' data-target="#changepic" data-id="{{ $data_konsul_online->id_konsul}}">Change PIC</button>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                  </table>
                </div>
                <!-- Modal -->
                    <div class="modal fade" id="changepic" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Pergantian PIC</h3>
                          </div>
                          <div class="modal-body">
                          <form action="/admin/changepic" method="POST">
                            {{csrf_field()}}
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Nama Penanya</label>
                                <input name="name" type="text" class="form-control" id="exampleInputnama1" disabled="">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Jenis Layanan</label>
                                <input name="username" type="text" class="form-control" id="exampleInputusername1" disabled="">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Judul</label>
                                <input name="email" type="email" class="form-control" id="exampleInputEmail1" disabled="">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Detail</label>
                                <input name="password" type="Password" class="form-control" id="exampleInputpassword1" disabled="">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputbidang1" class="form-label">Pilih Jenis Layanan Baru</label>
                                <select name="subbid_id" class="form-control" aria-label="Default select example">
                                  <option value="option_select" disabled selected>Pilih Bidang</option>
                                  @foreach($data_layanan as $data_layanan)
                                  <option value="{{$data_layanan->id_layanan}}">{{$data_layanan->jenis_layanan}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputbidang1" class="form-label">Pilih PIC</label>
                                <select name="subbid_id" class="form-control" aria-label="Default select example">
                                  <option value="option_select" disabled selected>Pilih PIC</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Keterangan PIC</label>
                                <textarea name="keterangan" type="Password" class="form-control" id="exampleInputpassword1"></textarea>
                              </div>
                              </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

              </div>
              <!-- END TABLE HOVER -->
            </div>
          </div>
        </div>
      </div>
      <!-- END MAIN CONTENT -->
    </div>
@stop



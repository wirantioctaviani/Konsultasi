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
                              <a href="/admin_konsul_online/{{$data_konsul_online->id_konsul}}/view" class="btn btn-default">Detail</a>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                  </table>
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



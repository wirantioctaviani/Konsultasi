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
                <h3 class="card-title">LIST KONSULTASI ONLINE</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>No Tiket</th>
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
                          <td>{{$data_konsul_online->no_tiket}}</td>
                          <td>{{$data_konsul_online->nama}}</td>
                          <td>{{$data_konsul_online->jabatan}}</td>
                          <td>{{$data_konsul_online->unit_kerja}}</td>
                          <td>{{$data_konsul_online->jenis_layanan}}</td>
                          <td>{{$data_konsul_online->judul}}</td>
                          <td>{{$data_konsul_online->name}}</td>
                          <td>{{date("d M Y H:i:s", strtotime($data_konsul_online->created_at))}}</td>
                          <td>{{$data_konsul_online->nama_status}}</td>
                          <td>
                            <div class="btn-group-vertical">
                              <a href="{{ action('App\Http\Controllers\AdminController@view_konsulonline', [encrypt($data_konsul_online->id_konsul)]) }}" class="btn btn-default">View</a>
                              <!-- /admin_konsul_online/{{$data_konsul_online->id_konsul}}/view -->
                            </div>
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                  </table>
              </div>
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

@stop



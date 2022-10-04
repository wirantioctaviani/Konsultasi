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
        @elseif(session('failed'))
        <div class="alert alert-failed" role="alert">
        {{session('sukses')}}
        </div>
        @endif
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">LIST KONSULTASI OPEN</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               @if(request()->session()->get('level') == 3)
               <a href="{{ route('exportexcel') }}" class="btn btn-info">Export Excel</a>
               @endif
               <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>No Tiket</th>
                          <th>Nama User</th>
                          <!-- <th>Jabatan</th> -->
                          <th>Unit Kerja</th>
                          <th>Layanan</th>
                          <th>Judul</th>
                          <th>PIC</th>
                          <th>Submitted at</th>
                          <th>Updated at</th>
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
                          <!-- <td>{{$data_konsul_online->jabatan}}</td> -->
                          <td>{{$data_konsul_online->unit_kerja}}</td>
                          <td>{{$data_konsul_online->jenis_layanan}}</td>
                          <td>{{$data_konsul_online->judul}}</td>
                          <td>{{$data_konsul_online->name}}</td>
                          <td>{{date("d M Y H:i:s", strtotime($data_konsul_online->created_at))}}</td>
                          <td>{{date("d M Y H:i:s", strtotime($data_konsul_online->updated_at))}}</td>
                          <td>{{$data_konsul_online->nama_status}}</td>
                          @if(request()->session()->get('level') == 3)
                                @if($data_konsul_online -> status_id == 0 || $data_konsul_online -> status_id == 1)
                                <td>
                                  <div class="btn-group-vertical">
                                    <a href="{{ action('App\Http\Controllers\AdminController@respon_konsulonline', [encrypt($data_konsul_online->id_konsul)]) }}" class="btn btn-default">Detail</a>
                                <!-- /admin_konsul_online/{{$data_konsul_online->id_konsul}}/respon -->
                                    <a href="{{ action('App\Http\Controllers\AdminController@changepic', [encrypt($data_konsul_online->id_konsul)]) }}" class="btn btn-default">Change PIC</a>
                                    <!-- /admin_konsul_online/{{$data_konsul_online->id_konsul}}/changepic -->
                                    <a href="{{ action('App\Http\Controllers\AdminController@close_konsulonline', [encrypt($data_konsul_online->id_konsul)]) }}" class="btn btn-danger">Change Status Konsultasi</a>
                                  </div>
                                </td>
                                @elseif($data_konsul_online -> status_id == 2)
                                <td>
                                  <div class="btn-group-vertical">
                                    <a href="{{ action('App\Http\Controllers\AdminController@respon_konsulonline', [encrypt($data_konsul_online->id_konsul)]) }}" class="btn btn-warning">Approval</a>
                                  </div>
                                </td>
                                @else
                                <td>
                                  <div class="btn-group-vertical">
                                    <a href="{{ action('App\Http\Controllers\AdminController@respon_konsulonline', [encrypt($data_konsul_online->id_konsul)]) }}" class="btn btn-default">Detail</a>
                                    <a href="{{ action('App\Http\Controllers\AdminController@close_konsulonline', [encrypt($data_konsul_online->id_konsul)]) }}" class="btn btn-danger">Change Status Konsultasi</a>
                                  </div>
                                </td>
                                @endif
                          @elseif(request()->session()->get('level') == 4)
                                @if($data_konsul_online -> status_id == 0 || $data_konsul_online -> status_id == 1)
                                <td>
                                  <div class="btn-group-vertical">
                                    <a href="{{ action('App\Http\Controllers\AdminController@respon_konsulonline', [encrypt($data_konsul_online->id_konsul)]) }}" class="btn btn-warning">Reply</a>
                                <!-- /admin_konsul_online/{{$data_konsul_online->id_konsul}}/respon -->
                                    <a href="{{ action('App\Http\Controllers\AdminController@changepic', [encrypt($data_konsul_online->id_konsul)]) }}" class="btn btn-default">Change PIC</a>
                                    <!-- /admin_konsul_online/{{$data_konsul_online->id_konsul}}/changepic -->
                                  </div>
                                </td>
                                @else
                                <td>
                                  <div class="btn-group-vertical">
                                    <a href="{{ action('App\Http\Controllers\AdminController@respon_konsulonline', [encrypt($data_konsul_online->id_konsul)]) }}" class="btn btn-default">Detail</a>
                                  </div>
                                </td>
                                @endif
                          @elseif(request()->session()->get('level') == 1)
                                @if($data_konsul_online -> status_id == 0 || $data_konsul_online -> status_id == 1)
                                <td>
                                  <div class="btn-group-vertical">
                                    <a href="{{ action('App\Http\Controllers\AdminController@respon_konsulonline', [encrypt($data_konsul_online->id_konsul)]) }}" class="btn btn-default">Detail</a>
                                <!-- /admin_konsul_online/{{$data_konsul_online->id_konsul}}/respon -->
                                    <a href="{{ action('App\Http\Controllers\AdminController@changepic', [encrypt($data_konsul_online->id_konsul)]) }}" class="btn btn-default">Change PIC</a>
                                    <!-- /admin_konsul_online/{{$data_konsul_online->id_konsul}}/changepic -->
                                    <a href="{{ action('App\Http\Controllers\AdminController@close_konsulonline', [encrypt($data_konsul_online->id_konsul)]) }}" class="btn btn-danger">Change Status Konsultasi</a>
                                  </div>
                                </td>
                                @else
                                <td>
                                  <div class="btn-group-vertical">
                                    <a href="{{ action('App\Http\Controllers\AdminController@respon_konsulonline', [encrypt($data_konsul_online->id_konsul)]) }}" class="btn btn-default">Detail</a>
                                  </div>
                                </td>
                                @endif
                          @elseif(request()->session()->get('level') == 2)
                                @if($data_konsul_online -> status_id == 1)
                                <td>
                                  <div class="btn-group-vertical">
                                    <a href="{{ action('App\Http\Controllers\AdminController@respon_konsulonline', [encrypt($data_konsul_online->id_konsul)]) }}" class="btn btn-default">Detail</a>
                                <!-- /admin_konsul_online/{{$data_konsul_online->id_konsul}}/respon -->
                                    <!-- <a href="{{ action('App\Http\Controllers\AdminController@changepic', [encrypt($data_konsul_online->id_konsul)]) }}" class="btn btn-default">Change PIC</a> -->
                                    <!-- /admin_konsul_online/{{$data_konsul_online->id_konsul}}/changepic -->
                                  </div>
                                </td>
                                @else
                                <td>
                                  <div class="btn-group-vertical">
                                    <a href="{{ action('App\Http\Controllers\AdminController@respon_konsulonline', [encrypt($data_konsul_online->id_konsul)]) }}" class="btn btn-default">Detail</a>
                                  </div>
                                </td>
                                @endif
                          @endif
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



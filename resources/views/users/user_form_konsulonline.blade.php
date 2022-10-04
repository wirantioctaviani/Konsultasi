@extends('users.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
    <section class="content-header">
      <div class="container-fluid">
        @if(session('sukses'))
        <div class="alert alert-success" role="alert">
        {{session('sukses')}}
        </div>
        @endif
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Konsultasi Online</h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h1 class="card-title">Form Konsultasi Online</h1>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ action('App\Http\Controllers\UsersController@create_konsul') }}"" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  {{csrf_field()}}
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input name="nama" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter nama"required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jabatan</label>
                    <input name="jabatan" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter jabatan" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Unit Kerja</label>
                    <input name="unit_kerja" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter unit kerja" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nomor HP</label>
                    <input name="no_hp" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter nomor hp"> 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input name="email" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                  </div>
                  <div class="form-group">
                        <label>Jenis Layanan Konsultasi</label>
                        <select class="custom-select" name="layanan_id">
                          <option value="option_select" disabled selected>Pilih Layanan</option>
                          @foreach($data_layanan as $data_layanan)
                          <option value="{{$data_layanan->id}}">{{$data_layanan->jenis_layanan}}</option>
                          @endforeach
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Judul</label>
                    <input name="judul" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Judul" required>
                  </div>
                  <div class="form-group">
                        <label>Detail Permasalahan</label>
                        <textarea id="summernote" name="details" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        <label style="color: red;">*Untuk upload gambar, silakan klik ikon "Picture" yang berada paling kanan</label>
                      </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Dokumen Pendukung</label>
                        <input type="file" name="dokumen" class="form-control" id="dokumen" accept="image/*, application/pdf, application/msword">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection
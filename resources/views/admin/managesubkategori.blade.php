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
        @if(session('gagal'))
        <div class="alert alert-danger" role="alert">
        {{session('gagal')}}
        </div>
        @endif
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Daftar Subkategori FAQ</h3>
              </div>
                    
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-default" data-toggle='modal' data-target="#ModalAdd"><i class="nav-icon fas fa-plus"></i>  Tambah Subkategori</button>
               <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Jenis Layanan</th>
                          <th>Kategori</th>
                          <th>Subkategori</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($datasubkategori as $datasubkategoris)
                              <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$datasubkategoris->jenis_layanan}}</td>
                                <td>{{$datasubkategoris->nama_kategori}}</td>
                                <td>{{$datasubkategoris->nama_subkategori}}</td>
                                <td>
                                  <div class="btn-group-vertical">
                                    <button 
                                        type="button" 
                                        class="btn icon btn-info"
                                        data-toggle="modal" 
                                        data-target="#edit-{{ $datasubkategoris->id_subkategori }}">Edit
                                    </button>
                                    <a href="{{ action('App\Http\Controllers\FaqController@deletesubkategori', ['id_subkategori' => $datasubkategoris->id_subkategori, 'kategori_id' => $kategori_id,
                                      'layanan_id' => $layanan_id]) }}" onclick="return confirm('Anda yakin ingin menghapus subkategori ?')" class="btn btn-danger">Hapus Subkategori</a>
                                  </div>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                  </table>
              </div>
              <!-- /.card-body -->
              <!-- Modal Add Begin -->
                    <div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Tambah Subkategori FAQ</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="{{ action('App\Http\Controllers\FaqController@addsubkategori') }}" class="form-prevent" method="POST">
                            @csrf
                            <div class="modal-body">
                            <input type="hidden" name="kategori_id" value="{{$kategori_id}}" class="form-control">
                            <input type="hidden" name="layanan_id" value="{{$layanan_id}}" class="form-control">  
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Nama Subkategori</label>
                                <input name="nama_subkategori" type="text" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Jawaban</label>
                                <textarea name="jawaban" class="form-control post-input summernote" rows="5" id="summernote"></textarea>
                              </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-info button-prevent" type="submit">
                                    <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                    <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Tambah </div>
                                    <div class="hide-text">Tambah</div>
                                </button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
              <!-- Modal Add End -->

              <!-- Modal Edit Begin -->
                  @foreach($datasubkategori as $datasubkategoris2)
                    <div class="modal fade" id="edit-{{ $datasubkategoris2->id_subkategori }}" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title text-center" id="exampleModalLabel">Edit Kategori FAQ</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form class="form-prevent" action="{{ action('App\Http\Controllers\FaqController@editsubkategori', [$datasubkategoris2->id_subkategori]) }}" enctype="multipart/form-data" method="POST">
                              <div class="modal-body">
                                @csrf
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Nama Subkategori :</label>
                                  <input name="nama_subkategori" type="text" class="form-control" id="nama_subkategori" value="{{ $datasubkategoris2->nama_subkategori }}">
                                  <input name="id_subkategori" type="text" class="form-control" id="id" value="{{ $datasubkategoris2->id_subkategori }}" hidden>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Jawaban :</label>
                                  <textarea id="summernote2" name="jawaban" cols="30" rows="10" class="form-control summernote2" >{{ Request::old('jawaban', $datasubkategoris2->jawaban) }}</textarea>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-info button-prevent" type="submit">
                                  <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                  <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Submit </div>
                                  <div class="hide-text">Submit</div>
                                </button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  @endforeach
              <!-- Modal Edit End-->


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



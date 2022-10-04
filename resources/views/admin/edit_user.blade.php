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
                <h3 class="card-title">EDIT DATA USER</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                @foreach($data_user as $data_user)
                <form action="{{ action('App\Http\Controllers\AdminUserManagerController@proses_edit', [$data_user->id_user]) }}" method="post">
                  {{csrf_field()}}
                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Nama : </label>
                        <div class="col-sm-6">
                          <input name="name" type="text" class="form-control" id="nama" value="{{$data_user->name}}">
                          <input name="mstr_role_id" type="hidden" class="form-control" id="nama" value="{{$data_user->mstr_role_id}}">
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">NIP : </label>
                        <div class="col-sm-6">
                          <input name="nip" type="text" class="form-control" id="nama" value="{{$data_user->nip}}">
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Username : </label>
                        <div class="col-sm-6">
                          <input name="username" type="text" class="form-control" id="unit_kerja" value="{{$data_user->username}}">
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Email: </label>
                        <div class="col-sm-6">
                          <input type="text" name="email" class="form-control" id="jabatan" value="{{$data_user->email}}">
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Role : </label>
                        <div class="col-sm-6">
                          <!-- <input type="text" class="form-control" id="jabatan" value="{{$data_user->nama_role}}" disabled=""> -->
                         <select name="mstr_role_id2" id="mstr_role_id" class="form-control input-lg">
                          @foreach($data_role as $data_role )
                            <option value="{{ $data_role->id }}" {{$data_user->mstr_role_id == $data_role->id  ? 'selected' : ''}}>{{ $data_role->nama_role}}</option>
                          @endforeach
                        </select>
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Subbid : </label>
                        <div class="col-sm-6">
                          <!-- <input type="text" class="form-control" id="jabatan" value="{{$data_user->nama_bidang}}" disabled=""> -->
                          <select name="subbid_id" id="subbid_id" class="form-control input-lg">
                          @foreach($data_bidang as $data_bidang )
                            <option value="{{ $data_bidang->subbid_id }}" {{$data_user->subbid_id == $data_bidang->subbid_id  ? 'selected' : ''}}>{{ $data_bidang->nama_bidang}}</option>
                          @endforeach
                        </select>
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Status Active : </label>
                        <div class="col-sm-6">
                          <!-- <input type="text" class="form-control" id="jabatan" value="{{$data_user->nama_bidang}}" disabled=""> -->
                          <!-- <select name="is_active" id="is_active" class="form-control input-lg">
                            <option value="{{ $data_user->is_active }}" {{$data_user->is_active == '1'  ? 'selected' : ''}}>Active</option>
                            <option value="{{ $data_user->is_active }}" {{$data_user->is_active == '0'  ? 'selected' : ''}}>Non-Active</option>
                        </select> -->
                        <input type="checkbox" value="{{$data_user->is_active}}" name="is_active" id="is_active" @if($data_user->is_active == '1' ) checked @endif />
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>

                      <br>
                      <div class="form-group row">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-4">
                          <a href="{{ action('App\Http\Controllers\AdminUserManagerController@manage_user') }}" class="btn btn-default">Cancel</a>
                          <button type="submit" class="btn btn-primary btn-md">Update</button>
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>

                      <br>
                      </form>
                      @endforeach
                  
              </div>
              <!-- /.card-body -->
              
              <!-- UNTUK HISTORY PIC -->

            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->

</section>


@endsection



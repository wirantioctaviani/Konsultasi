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
                <h3 class="card-title">LIST USERS ADMIN</h3>
              </div>
                    
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-default" data-toggle='modal' data-target="#ModalAdd"><i class="nav-icon fas fa-plus"></i>  Add User</button>
               <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>NIP</th>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Subbidang</th>
                          <th>Active</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($data_user as $user)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$user->nip}}</td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->username}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->mstr_role->nama_role}}</td>
                          <td>{{$user->nama_bidang}}</td>
                          @if($user->is_active == 1)
                                <td>{{'Yes'}}</td>
                             
                          @else
                                <td>{{'No'}}</td>
                            
                          @endif
                          <td>
                            <div class="btn-group-vertical">
                              <a href="{{ action('App\Http\Controllers\AdminUserManagerController@user_edit', [encrypt($user->id_user)]) }}" class="btn btn-default">Edit</a>
                              <!-- <button type="button" class="btn btn-default" data-toggle='modal' data-target="#Modal-nonactive">Non-Active</button> -->
                            </div>
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                  </table>
              </div>
              <!-- /.card-body -->
              <!-- Modal -->
                    <div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Add User</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form action="{{ action('App\Http\Controllers\AdminUserManagerController@create_user') }}" method="POST">
                            {{csrf_field()}}
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Nama</label>
                                <input name="name" type="text" class="form-control" id="exampleInputnama1" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">NIP</label>
                                <input name="nip" type="text" class="form-control" id="exampleInputnama1" required="">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input name="email" type="email" class="form-control" id="exampleInputEmail1" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Password</label>
                                <input name="password" type="Password" class="form-control" id="exampleInputpassword1" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputbidang1" class="form-label">Bidang</label>
                                <select name="subbid_id" class="form-control" aria-label="Default select example" required>
                                  <option value="option_select" disabled selected>Pilih Bidang</option>
                                  @foreach($data_bidang as $data_bidang)
                                  <option value="{{$data_bidang->subbid_id}}">{{$data_bidang->nama_bidang}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputbidang1" class="form-label">Role</label>
                                <select name="role" class="form-control" aria-label="Default select example" required>
                                  <option value="option_select" disabled selected>Pilih Role</option>
                                  @foreach($data_role as $data_role)
                                  <option value="{{$data_role->id}}">{{$data_role->nama_role}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="Modal-nonactive" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Add User</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form action="{{ action('App\Http\Controllers\AdminUserManagerController@create_user') }}" method="POST">
                            {{csrf_field()}}
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Nama</label>
                                <input name="name" type="text" class="form-control" id="exampleInputnama1">
                              </div>
                            <div class="modal-footer">
                              <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              <button type="submit" class="btn btn-danger">Non-Active</button>
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



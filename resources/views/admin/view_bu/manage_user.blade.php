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
                  <h2 class="panel-title">List User</h2>
                  <div class="right">
                    <button type="button" class="btn" data-toggle='modal' data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
                  </div>
                </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Add User</h3>
                          </div>
                          <div class="modal-body">
                          <form action="/admin/create_user" method="POST">
                            {{csrf_field()}}
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Nama</label>
                                <input name="name" type="text" class="form-control" id="exampleInputnama1">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Username</label>
                                <input name="username" type="text" class="form-control" id="exampleInputusername1">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input name="email" type="email" class="form-control" id="exampleInputEmail1">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Password</label>
                                <input name="password" type="Password" class="form-control" id="exampleInputpassword1">
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
                              <div class="form-group">
                                <label for="exampleInputrole1" class="form-label">Role</label>
                                <select name="id_role" class="form-control" aria-label="Default select example">
                                <option selected>Pilih Role</option>
                                <option value="1">Admin</option>
                                <option value="2">Subkoordinator</option>
                                <option value="3">PIC</option>
                                <option value="4">Koordinator</option>
                              </select>
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

                <div class="panel-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>ID</th>
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
                          <td>{{$user->id}}</td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->username}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->role}}</td>
                          <td>{{$user->subbid_id}}</td>
                          @if($user->is_active == 1)
                                <td>{{'Yes'}}</td>
                             
                          @else
                                <td>{{'No'}}</td>
                            
                          @endif
                          <td>
                            <div class="btn-group-vertical">
                              <button type="button" class="btn btn-default">View</button>
                              <button type="button" class="btn btn-default">Non-Active</button>
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



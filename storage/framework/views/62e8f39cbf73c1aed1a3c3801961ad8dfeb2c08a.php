

<?php $__env->startSection('content'); ?>

<section class="content-header">
</section>

<section class="content">
      <div class="container-fluid">
        <?php if(session('sukses')): ?>
        <div class="alert alert-success" role="alert">
        <?php echo e(session('sukses')); ?>

        </div>
        <?php endif; ?>
        <?php if(session('gagal')): ?>
        <div class="alert alert-danger" role="alert">
        <?php echo e(session('gagal')); ?>

        </div>
        <?php endif; ?>
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
                          <?php $__currentLoopData = $data_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($loop->iteration); ?></td>
                          <td><?php echo e($user->nip); ?></td>
                          <td><?php echo e($user->name); ?></td>
                          <td><?php echo e($user->username); ?></td>
                          <td><?php echo e($user->email); ?></td>
                          <td><?php echo e($user->mstr_role->nama_role); ?></td>
                          <td><?php echo e($user->nama_bidang); ?></td>
                          <?php if($user->is_active == 1): ?>
                                <td><?php echo e('Yes'); ?></td>
                             
                          <?php else: ?>
                                <td><?php echo e('No'); ?></td>
                            
                          <?php endif; ?>
                          <td>
                            <div class="btn-group-vertical">
                              <a href="<?php echo e(action('App\Http\Controllers\AdminUserManagerController@user_edit', [encrypt($user->id_user)])); ?>" class="btn btn-default">Edit</a>
                              <!-- <button type="button" class="btn btn-default" data-toggle='modal' data-target="#Modal-nonactive">Non-Active</button> -->
                            </div>
                          </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                          <form action="<?php echo e(action('App\Http\Controllers\AdminUserManagerController@create_user')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

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
                                  <?php $__currentLoopData = $data_bidang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_bidang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($data_bidang->subbid_id); ?>"><?php echo e($data_bidang->nama_bidang); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputbidang1" class="form-label">Role</label>
                                <select name="role" class="form-control" aria-label="Default select example" required>
                                  <option value="option_select" disabled selected>Pilih Role</option>
                                  <?php $__currentLoopData = $data_role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($data_role->id); ?>"><?php echo e($data_role->nama_role); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                          <form action="<?php echo e(action('App\Http\Controllers\AdminUserManagerController@create_user')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

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

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\webapp\webpusbin2021\public\konsultasi\resources\views/admin/manage_user2.blade.php ENDPATH**/ ?>
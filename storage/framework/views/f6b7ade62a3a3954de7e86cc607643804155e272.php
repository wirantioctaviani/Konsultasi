

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
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">EDIT DATA USER</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <?php $__currentLoopData = $data_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <form action="<?php echo e(action('App\Http\Controllers\AdminUserManagerController@proses_edit', [$data_user->id_user])); ?>" method="post">
                  <?php echo e(csrf_field()); ?>

                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Nama : </label>
                        <div class="col-sm-6">
                          <input name="name" type="text" class="form-control" id="nama" value="<?php echo e($data_user->name); ?>">
                          <input name="mstr_role_id" type="hidden" class="form-control" id="nama" value="<?php echo e($data_user->mstr_role_id); ?>">
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">NIP : </label>
                        <div class="col-sm-6">
                          <input name="nip" type="text" class="form-control" id="nama" value="<?php echo e($data_user->nip); ?>">
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Username : </label>
                        <div class="col-sm-6">
                          <input name="username" type="text" class="form-control" id="unit_kerja" value="<?php echo e($data_user->username); ?>">
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Email: </label>
                        <div class="col-sm-6">
                          <input type="text" name="email" class="form-control" id="jabatan" value="<?php echo e($data_user->email); ?>">
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Role : </label>
                        <div class="col-sm-6">
                          <!-- <input type="text" class="form-control" id="jabatan" value="<?php echo e($data_user->nama_role); ?>" disabled=""> -->
                         <select name="mstr_role_id" id="mstr_role_id" class="form-control input-lg">
                          <?php $__currentLoopData = $data_role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($data_role->id); ?>" <?php echo e($data_user->mstr_role_id == $data_role->id  ? 'selected' : ''); ?>><?php echo e($data_role->nama_role); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                          <!-- <input type="text" class="form-control" id="jabatan" value="<?php echo e($data_user->nama_bidang); ?>" disabled=""> -->
                          <select name="subbid_id" id="subbid_id" class="form-control input-lg">
                          <?php $__currentLoopData = $data_bidang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_bidang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($data_bidang->subbid_id); ?>" <?php echo e($data_user->subbid_id == $data_bidang->subbid_id  ? 'selected' : ''); ?>><?php echo e($data_bidang->nama_bidang); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                          <!-- <input type="text" class="form-control" id="jabatan" value="<?php echo e($data_user->nama_bidang); ?>" disabled=""> -->
                          <!-- <select name="is_active" id="is_active" class="form-control input-lg">
                            <option value="<?php echo e($data_user->is_active); ?>" <?php echo e($data_user->is_active == '1'  ? 'selected' : ''); ?>>Active</option>
                            <option value="<?php echo e($data_user->is_active); ?>" <?php echo e($data_user->is_active == '0'  ? 'selected' : ''); ?>>Non-Active</option>
                        </select> -->
                        <input type="checkbox" value="<?php echo e($data_user->is_active); ?>" name="is_active" id="is_active" <?php if($data_user->is_active == '1' ): ?> checked <?php endif; ?> />
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>

                      <br>
                      <div class="form-group row">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-4">
                          <a href="<?php echo e(action('App\Http\Controllers\AdminUserManagerController@manage_user')); ?>" class="btn btn-default">Cancel</a>
                          <button type="submit" class="btn btn-primary btn-md">Update</button>
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>

                      <br>
                      </form>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
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


<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bitnami73\apache2\htdocs\public\konsultasi\resources\views/admin/edit_user.blade.php ENDPATH**/ ?>
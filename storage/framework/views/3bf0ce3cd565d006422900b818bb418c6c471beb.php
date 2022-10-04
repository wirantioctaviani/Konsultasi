

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
                <h3 class="card-title">LIST KONSULTASI OPEN</h3>
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
                          <?php $__currentLoopData = $data_konsul_online; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_konsul_online): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($loop->iteration); ?></td>
                          <td><?php echo e($data_konsul_online->no_tiket); ?></td>
                          <td><?php echo e($data_konsul_online->nama); ?></td>
                          <td><?php echo e($data_konsul_online->jabatan); ?></td>
                          <td><?php echo e($data_konsul_online->unit_kerja); ?></td>
                          <td><?php echo e($data_konsul_online->jenis_layanan); ?></td>
                          <td><?php echo e($data_konsul_online->judul); ?></td>
                          <td><?php echo e($data_konsul_online->name); ?></td>
                          <td><?php echo e(date("d M Y H:i:s", strtotime($data_konsul_online->created_at))); ?></td>
                          <td><?php echo e($data_konsul_online->nama_status); ?></td>
                          <?php if(Auth::user()->mstr_role_id == 3): ?>
                                <?php if($data_konsul_online -> status_id == 1): ?>
                                <td>
                                  <div class="btn-group-vertical">
                                    <a href="<?php echo e(action('App\Http\Controllers\AdminController@respon_konsulonline', [encrypt($data_konsul_online->id_konsul)])); ?>" class="btn btn-default">Detail</a>
                                <!-- /admin_konsul_online/<?php echo e($data_konsul_online->id_konsul); ?>/respon -->
                                    <a href="<?php echo e(action('App\Http\Controllers\AdminController@changepic', [encrypt($data_konsul_online->id_konsul)])); ?>" class="btn btn-default">Change PIC</a>
                                    <!-- /admin_konsul_online/<?php echo e($data_konsul_online->id_konsul); ?>/changepic -->
                                  </div>
                                </td>
                                <?php elseif($data_konsul_online -> status_id == 2): ?>
                                <td>
                                  <div class="btn-group-vertical">
                                    <a href="<?php echo e(action('App\Http\Controllers\AdminController@respon_konsulonline', [encrypt($data_konsul_online->id_konsul)])); ?>" class="btn btn-warning">Approval</a>
                                  </div>
                                </td>
                                <?php else: ?>
                                <td>
                                  <div class="btn-group-vertical">
                                    <a href="<?php echo e(action('App\Http\Controllers\AdminController@respon_konsulonline', [encrypt($data_konsul_online->id_konsul)])); ?>" class="btn btn-default">Detail</a>
                                  </div>
                                </td>
                                <?php endif; ?>
                          <?php elseif(Auth::user()->mstr_role_id == 4): ?>
                                <?php if($data_konsul_online -> status_id == 1): ?>
                                <td>
                                  <div class="btn-group-vertical">
                                    <a href="<?php echo e(action('App\Http\Controllers\AdminController@respon_konsulonline', [encrypt($data_konsul_online->id_konsul)])); ?>" class="btn btn-warning">Reply</a>
                                <!-- /admin_konsul_online/<?php echo e($data_konsul_online->id_konsul); ?>/respon -->
                                    <a href="<?php echo e(action('App\Http\Controllers\AdminController@changepic', [encrypt($data_konsul_online->id_konsul)])); ?>" class="btn btn-default">Change PIC</a>
                                    <!-- /admin_konsul_online/<?php echo e($data_konsul_online->id_konsul); ?>/changepic -->
                                  </div>
                                </td>
                                <?php else: ?>
                                <td>
                                  <div class="btn-group-vertical">
                                    <a href="<?php echo e(action('App\Http\Controllers\AdminController@respon_konsulonline', [encrypt($data_konsul_online->id_konsul)])); ?>" class="btn btn-default">Detail</a>
                                  </div>
                                </td>
                                <?php endif; ?>
                          <?php elseif(Auth::user()->mstr_role_id == 1): ?>
                                <?php if($data_konsul_online -> status_id == 1): ?>
                                <td>
                                  <div class="btn-group-vertical">
                                    <a href="<?php echo e(action('App\Http\Controllers\AdminController@respon_konsulonline', [encrypt($data_konsul_online->id_konsul)])); ?>" class="btn btn-default">Detail</a>
                                <!-- /admin_konsul_online/<?php echo e($data_konsul_online->id_konsul); ?>/respon -->
                                    <a href="<?php echo e(action('App\Http\Controllers\AdminController@changepic', [encrypt($data_konsul_online->id_konsul)])); ?>" class="btn btn-default">Change PIC</a>
                                    <!-- /admin_konsul_online/<?php echo e($data_konsul_online->id_konsul); ?>/changepic -->
                                  </div>
                                </td>
                                <?php else: ?>
                                <td>
                                  <div class="btn-group-vertical">
                                    <a href="<?php echo e(action('App\Http\Controllers\AdminController@respon_konsulonline', [encrypt($data_konsul_online->id_konsul)])); ?>" class="btn btn-default">Detail</a>
                                  </div>
                                </td>
                                <?php endif; ?>
                          <?php elseif(Auth::user()->mstr_role_id == 2): ?>
                                <?php if($data_konsul_online -> status_id == 1): ?>
                                <td>
                                  <div class="btn-group-vertical">
                                    <a href="<?php echo e(action('App\Http\Controllers\AdminController@respon_konsulonline', [encrypt($data_konsul_online->id_konsul)])); ?>" class="btn btn-default">Detail</a>
                                <!-- /admin_konsul_online/<?php echo e($data_konsul_online->id_konsul); ?>/respon -->
                                    <!-- <a href="<?php echo e(action('App\Http\Controllers\AdminController@changepic', [encrypt($data_konsul_online->id_konsul)])); ?>" class="btn btn-default">Change PIC</a> -->
                                    <!-- /admin_konsul_online/<?php echo e($data_konsul_online->id_konsul); ?>/changepic -->
                                  </div>
                                </td>
                                <?php else: ?>
                                <td>
                                  <div class="btn-group-vertical">
                                    <a href="<?php echo e(action('App\Http\Controllers\AdminController@respon_konsulonline', [encrypt($data_konsul_online->id_konsul)])); ?>" class="btn btn-default">Detail</a>
                                  </div>
                                </td>
                                <?php endif; ?>
                          <?php endif; ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                  </table>
              </div>

              <!-- <div class="modal fade" id="changepic" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Pergantian PIC</h3>
                          </div>
                          <div class="modal-body">
                          <form action="/admin/changepic" method="POST">
                            <?php echo e(csrf_field()); ?>

                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Nama Penanya</label>
                                <input name="name" type="text" class="form-control" id="exampleInputnama1" disabled="">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Jenis Layanan</label>
                                <input name="username" type="text" class="form-control" id="exampleInputusername1" disabled="">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Judul</label>
                                <input name="email" type="email" class="form-control" id="exampleInputEmail1" disabled="">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Detail</label>
                                <input name="password" type="Password" class="form-control" id="exampleInputpassword1" disabled="">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputbidang1" class="form-label">Pilih Jenis Layanan Baru</label>
                                <select name="subbid_id" class="form-control" aria-label="Default select example">
                                  <option value="option_select" disabled selected>Pilih Bidang</option>
                                  <?php $__currentLoopData = $data_layanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_layanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($data_layanan->id_layanan); ?>"><?php echo e($data_layanan->jenis_layanan); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputbidang1" class="form-label">Pilih PIC</label>
                                <select name="subbid_id" class="form-control" aria-label="Default select example">
                                  <option value="option_select" disabled selected>Pilih PIC</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Keterangan PIC</label>
                                <textarea name="keterangan" type="Password" class="form-control" id="exampleInputpassword1"></textarea>
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
 -->
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

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bitnami73\apache2\htdocs\public\konsultasi\resources\views/admin/list_konsulonline2.blade.php ENDPATH**/ ?>


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
                <h3 class="card-title">LIST LAYANAN KONSULTASI</h3>
              </div>
                    
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-default" data-toggle='modal' data-target="#ModalAddLayanan"><i class="nav-icon fas fa-plus"></i>  Add Layanan</button>
               <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Jenis Layanan</th>
                          <th>Sub Bidang</th>
                          <th>Active</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $data_layanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($loop->iteration); ?></td>
                          <td><?php echo e($layanan->jenis_layanan); ?></td>
                          <td><?php echo e($layanan->nama_bidang); ?></td>
                          <?php if($layanan->status == 1): ?>
                                <td><?php echo e('Yes'); ?></td>
                                <td>
                            <div class="btn-group-vertical">
                              <a href="<?php echo e(action('App\Http\Controllers\AdminController@inactivate_layanan', [encrypt($layanan->layanan_id)])); ?>" onclick="return confirm('Non-Aktifkan Layanan ?')" class="btn btn-default">Non-Activate</a>
                              <!-- <button type="button" class="btn btn-default" data-toggle='modal' data-target="#Modal-nonactive">Non-Active</button> -->
                            </div>
                          </td>
                          <?php else: ?>
                                <td><?php echo e('No'); ?></td>
                                <td>
                            <div class="btn-group-vertical">
                              <a href="<?php echo e(action('App\Http\Controllers\AdminController@activate_layanan', [encrypt($layanan->layanan_id)])); ?>" onclick="return confirm('Aktifkan Layanan ?')" class="btn btn-default">Activate</a>
                              <!-- <button type="button" class="btn btn-default" data-toggle='modal' data-target="#Modal-nonactive">Non-Active</button> -->
                            </div>
                          </td>
                          <?php endif; ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                  </table>
              </div>
              <!-- /.card-body -->

              <div class="modal fade" id="ModalAddLayanan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Add Layanan</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form action="<?php echo e(action('App\Http\Controllers\AdminController@create_layanan')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Jenis Layanan</label>
                                <input name="jenis_layanan" type="text" class="form-control" id="exampleInputnama1">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputbidang1" class="form-label">Bidang</label>
                                  <select name="subbid_id" class="form-control" aria-label="Default select example">
                                    <option value="option_select" disabled selected>Pilih Bidang</option>
                                    <?php $__currentLoopData = $data_bidang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_bidang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($data_bidang->subbid_id); ?>"><?php echo e($data_bidang->nama_bidang); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                                </select>
                              </div>
                            <div class="modal-footer">
                              <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              <button type="submit" class="btn btn-primary">Submit</button>
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



<?php echo $__env->make('admin.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bitnami73\apache2\htdocs\public\konsultasi\resources\views/admin/manage_layanan.blade.php ENDPATH**/ ?>
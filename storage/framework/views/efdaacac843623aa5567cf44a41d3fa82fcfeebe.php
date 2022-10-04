

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
                <h3 class="card-title">LIST KONSULTASI ONLINE (USER)</h3>
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
                          <td><?php echo e(date("d M Y H:i:s", strtotime($data_konsul_online->created_at))); ?></td>
                          <td><?php echo e($data_konsul_online->nama_status); ?></td>
                          <td>
                            <div class="btn-group-vertical">
                              <a href="<?php echo e(action('App\Http\Controllers\UsersController@respon_konsulonline', [encrypt($data_konsul_online->id_konsul)])); ?>" class="btn btn-default">Detail</a>
                            </div>
                          </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->stopSection(); ?>



<?php echo $__env->make('users.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\web\konsultasi\resources\views/users/user_list_konsulonline.blade.php ENDPATH**/ ?>
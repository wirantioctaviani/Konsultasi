

<?php $__env->startSection('content'); ?>
<section class="content-header">
</section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">LAYANAN KONSULTASI ONLINE</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="panel-heading">
                  <h3 class="panel-title">Welcome, <?php echo e(request()->session()->get('namalengkap')); ?></h3>
              <p class="panel-subtitle"><?php echo e($mytime); ?></p>
              </div>
                <div class="row">
                  <?php $__currentLoopData = $data_konsul_online; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_konsul_online): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-2">
                          <div class="small-box bg-info">
                            <div class="inner">
                              <h1 style="text-align: center;"><b><?php echo e($data_konsul_online->jumlah); ?></b></h1>

                              <p style="text-align: center;"><b><?php echo e($data_konsul_online->jenis_layanan); ?></b></p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-stats-bars"></i>
                            </div>
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                      <br>
                      <br>

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

<?php echo $__env->make('admin.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\web\konsultasi\resources\views/admin/dashboard2.blade.php ENDPATH**/ ?>
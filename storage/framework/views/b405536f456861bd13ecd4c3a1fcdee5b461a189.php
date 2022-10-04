

<?php $__env->startSection('content'); ?>

<section class="content-header">
</section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">LAYANAN KONSULTASI</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php $__currentLoopData = $data_konsul_online; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_konsul_online): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">No Tiket : </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="no_tiket" value="<?php echo e($data_konsul_online->no_tiket); ?>" disabled="">
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Nama : </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="nama" value="<?php echo e($data_konsul_online->nama); ?>" disabled="">
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Unit Kerja : </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="unit_kerja" value="<?php echo e($data_konsul_online->unit_kerja); ?>" disabled="">
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Jabatan : </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="jabatan" value="<?php echo e($data_konsul_online->jabatan); ?>" disabled="">
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Jenis Layanan : </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="jabatan" value="<?php echo e($data_konsul_online->jenis_layanan); ?>" disabled="">
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Judul Konsultasi : </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="jabatan" value="<?php echo e($data_konsul_online->judul); ?>" disabled="">
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>
                      <br>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      <div class="timeline">
                          <!-- timeline time label -->
                          <?php $__currentLoopData = $data_konsul_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_konsul_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="time-label">
                            <span class="bg-gray"><?php echo e(date("d M Y", strtotime($data_konsul_detail->created_at))); ?></span>
                          </div>
                          <!-- /.timeline-label -->
                           <!-- timeline item -->
                          
                          <div>
                            <i class="far fa-comments bg-gray"></i>
                            <div class="timeline-item">
                              <span class="time"><i class="fas fa-clock"></i> <?php echo e(date("d-m-Y H:i:s", strtotime($data_konsul_detail->created_at))); ?></span>
                              <h3 class="timeline-header"><b><?php echo e($data_konsul_detail->created_by); ?></b> said</h3>

                              <div class="timeline-body">
                                <?php echo $data_konsul_detail->details; ?>

                              </div>
                            </div>

                            <?php if($data_konsul_detail->dokumen != null): ?>
                            <div class="timeline-item">
                              <div class="timeline-header">
                                  <label class="">Dokumen / File Pendukung    : </label>
                                  <a href="<?php echo e(url('/').'/dokumen/'.$data_konsul_detail->dokumen); ?>" target="_blank"><?php echo e($data_konsul_detail->dokumen); ?></a>
                                </div>
                            </div>
                          <?php endif; ?>

                          <?php if($data_konsul_detail->is_answered == 2): ?>
                            <div class="timeline-item">
                              <div class="timeline-header">
                                  <label style="color: black;">*Approved by Subkoordinator at <?php echo e(date("d M Y H:i", strtotime($data_konsul_detail->updated_at))); ?></label>
                                </div>
                            </div>
                            <?php elseif($data_konsul_detail->is_answered == 3): ?>
                            <div class="timeline-item">
                              <div class="timeline-header">
                                  <label style="color: black;">*Revised by Subkoordinator (<?php echo e($data_konsul_detail->created_by); ?>) at <?php echo e(date("d M Y H:i", strtotime($data_konsul_detail->updated_at))); ?></label>
                                </div>
                            </div>
                          <?php endif; ?>

                          </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>

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



<?php echo $__env->make('admin.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\webapp\webpusbin2021\public\konsultasi\resources\views/admin/view2_konsulonline.blade.php ENDPATH**/ ?>
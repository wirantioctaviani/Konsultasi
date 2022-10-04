

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
                            <?php elseif($data_konsul_detail->is_answered == 1): ?>
                            <div class="timeline-item">
                              <div class="timeline-header">
                                  <label style="color: black;">*Jawaban tidak dikirimkan user</label>
                                </div>
                            </div>
                          <?php endif; ?>

                          </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>

              </div>
                          <?php $__currentLoopData = $datarating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datarating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($datarating->status_id == '4'): ?>
                          <div class="panel-body">
                              <div class="col text-center">
                                                  <!-- <button type="submit" onclick="return confirm('Close Konsultasi?')" class="btn btn-primary btn-lg" >Close Case</button> -->
                                                  <label style="color: black;font-size: 20px">Tiket ini sudah close. Klik tombol di bawah ini untuk melihat penilaian dari penanya.</label>
                                                  <br>
                                                  <br>
                                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-ratting">Lihat Penilaian</button>
                                                  <br>
                                                  <br>
                                                  <br>
                              </div>
                          </div>
                          <?php endif; ?>
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

<div class="modal fade" id="modal-ratting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="<?php echo e(action('App\Http\Controllers\UsersController@store_rating', [$data_konsul_detail->id_konsul])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ulasan Penanya Terkait Konsultasi Online Pusbin JFA Tiket #<?php echo e($datarating->no_tiket); ?> </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>

                            <?php if($datarating->rating != null): ?>
                                <div class="modal-body" style="text-align: center;">
                                          <?php for($i = 0; $i < 5; $i++): ?>
                                            <?php if($i < $datarating->rating): ?>
                                              <span class="fa fa-star fa-3x" style="color: orange;"></span>
                                            <?php else: ?>
                                              <span class="fa fa-star fa-3x" style="color: black;"></span>
                                            <?php endif; ?>
                                          <?php endfor; ?>
                                      
                                    <div class="form-group">
                                      <br>
                                          <div class="timeline-body">
                                            <textarea class="form-control" rows="4" readonly><?php echo e($datarating->ulasan); ?></textarea>
                                            <h6 class="modal-title" style="text-align: left;"><?php echo e(date("d M Y H:i", strtotime($datarating->created_at))); ?></h6>
                                          </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <h3 style="text-align: center;">Belum ada penilaian</h3>
                            <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
              </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\web\konsultasi\resources\views/admin/view2_konsulonline.blade.php ENDPATH**/ ?>


<?php $__env->startSection('content'); ?>

<section class="content-header">
</section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">PERGANTIAN PIC LAYANAN KONSULTASI</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php $__currentLoopData = $data_konsul_online; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_konsul_online): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">No Tiket : </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="nama" value="<?php echo e($data_konsul_online->no_tiket); ?>" disabled="">
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
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <form action="<?php echo e(action('App\Http\Controllers\AdminController@changepic_proses', [$data_konsul_online->id_konsul])); ?>" method="post">
                      <input type="hidden" name="id_konsul" value="<?php echo e($data_konsul_online->id_konsul); ?>" class="form-control">
                      <input type="hidden" name="no_tiket" value="<?php echo e($data_konsul_online->no_tiket); ?>" class="form-control">
                      <input type="hidden" name="pic_id_lama" value="<?php echo e($data_konsul_online->pic_id); ?>" class="form-control">
                      <input type="hidden" name="layanan_id" value="<?php echo e($data_konsul_online->layanan_id); ?>" class="form-control"> 
                      <input type="hidden" name="subbid_id" value="<?php echo e($data_konsul_online->subbid_id); ?>" class="form-control">     
                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Jenis Layanan Baru : </label>
                        <div class="col-sm-6">
                          <select name="id_layanan_baru" id="id_layanan_baru" class="form-control input-lg dynamic" data-dependent="pic_id">
                                  <option value="option_select" disabled selected>Pilih Layanan</option>
                                  <?php $__currentLoopData = $data_layanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_layanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($data_layanan->id); ?>"><?php echo e($data_layanan->jenis_layanan); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>
                      <?php if(Auth::user()->mstr_role_id != "4"): ?>
                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">New PIC : </label>
                        <div class="col-sm-6">
                          <select name="pic_id" id="pic_id" class="form-control input-lg">
                                  <option value="">Pilih PIC</option>
                          </select>
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>
                      <?php endif; ?>
                      
                      <?php echo e(csrf_field()); ?>

                      <div class="form-group row">
                        <div class="col-sm-2">
                        </div>
                        <label class="col-sm-2 col-form-label">Keterangan Pergantian PIC : </label>
                        <div class="col-sm-6">
                          <textarea name="ket_pic" rows="4" cols="91"></textarea>
                        </div>
                        <div class="col-sm-2">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col text-center">
                          <a href="<?php echo e(action('App\Http\Controllers\AdminController@list_konsulonline_open')); ?>" class="btn btn-default">Cancel</a>
                          <button type="submit" class="btn btn-primary btn-md">Save</button>
                        </div>
                      </div>
                      </form>

              </div>
              <!-- /.card-body -->
              <br>
              <br>
              
              <?php if(!$data_history_pic->isEmpty()): ?>
              <div class="card-body">
                <h4>History Pergantian PIC Konsultasi </h4>
                      <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Jenis Layanan Lama</th>
                          <th>PIC Lama</th>
                          <th>Changed at</th>
                          <th>Keterangan</th>
                        </tr>
                        </thead> 
                        <tbody>
                        <?php $__currentLoopData = $data_history_pic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_history_pic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($loop->iteration); ?></td>
                          <td><?php echo e($data_history_pic->jenis_layanan); ?></td>
                          <td><?php echo e($data_history_pic->name); ?></td>
                          <td><?php echo e(date("d M Y H:i", strtotime($data_history_pic->created_at))); ?></td>
                          <td><?php echo e($data_history_pic->ket_pic); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                  </table>
                      <br>
              </div>
              <?php endif; ?>

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



<?php echo $__env->make('admin.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bitnami73\apache2\htdocs\public\konsultasi\resources\views/admin/changepic.blade.php ENDPATH**/ ?>
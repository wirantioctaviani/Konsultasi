

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
                <h3 class="card-title">Daftar FAQ</h3>
              </div>
                    
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-default" data-toggle='modal' data-target="#ModalAdd"><i class="nav-icon fas fa-plus"></i>  Tambah Kategori</button>
               <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Jenis Layanan</th>
                          <th>Kategori</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $datakategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datakategoris): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($datakategoris->jenis_layanan); ?></td>
                                <td><a href="<?php echo e(action('App\Http\Controllers\FaqController@managesubkategori', ['id_kategori' => $datakategoris->id_kategori, 'layanan_id' => $datakategoris->layanan_id])); ?>"><?php echo e($datakategoris->nama_kategori); ?></a></td>
                                <td>
                                  <div class="btn-group-vertical">
                                    <button 
                                        type="button" 
                                        class="btn icon btn-info"
                                        data-toggle="modal" 
                                        data-target="#edit-<?php echo e($datakategoris->id_kategori); ?>">Edit
                                    </button>
                                    <a href="<?php echo e(action('App\Http\Controllers\FaqController@deletekategori', ['id_kategori' => $datakategoris->id_kategori])); ?>" onclick="return confirm('Anda yakin ingin menghapus kategori ?')" class="btn btn-danger">Hapus Kategori</a>
                                  </div>
                                </td>
                              </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                  </table>
              </div>
              <!-- /.card-body -->
              <!-- Modal Add Begin-->
                    <div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Tambah Kategori FAQ</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="<?php echo e(action('App\Http\Controllers\FaqController@addkategori')); ?>" class="form-prevent" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Jenis Layanan</label>
                                <select name="layanan_id" class="form-control" aria-label="Default select example" data-dependent="kategori_id" required>
                                  <option value="option_select" disabled selected>Pilih Layanan</option>
                                  <?php $__currentLoopData = $datalayanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datalayanans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($datalayanans->id); ?>"><?php echo e($datalayanans->jenis_layanan); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                                <input name="nama_kategori" type="text" class="form-control" id="exampleInputEmail1" required>
                              </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-info button-prevent" type="submit">
                                    <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                    <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Tambah </div>
                                    <div class="hide-text">Tambah</div>
                                </button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
              <!-- Modal Add End-->

              <!-- Modal Edit Begin -->
                  <?php $__currentLoopData = $datakategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datakategoris2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="modal fade" id="edit-<?php echo e($datakategoris2->id_kategori); ?>" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title text-center" id="exampleModalLabel">Edit Kategori FAQ</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form class="form-prevent" action="<?php echo e(action('App\Http\Controllers\FaqController@editkategori', [$datakategoris2->id_kategori])); ?>" enctype="multipart/form-data" method="POST">
                              <div class="modal-body">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Nama Kategori :</label>
                                  <input name="nama_kategori" type="text" class="form-control" id="no_tiket" value="<?php echo e($datakategoris2->nama_kategori); ?>">
                                  <input name="id_kategori" type="text" class="form-control" id="id" value="<?php echo e($datakategoris2->id_kategori); ?>" hidden>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Jenis Layanan :</label>
                                  <select name="layanan_id" id="layanan_id" class="form-control input-lg">
                                    <?php $__currentLoopData = $datalayanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datalayanans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <option value="<?php echo e($datalayanans->id); ?>" <?php echo e($datakategoris2->layanan_id == $datalayanans->id  ? 'selected' : ''); ?>><?php echo e($datalayanans->jenis_layanan); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-info button-prevent" type="submit">
                                  <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                  <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Submit </div>
                                  <div class="hide-text">Submit</div>
                                </button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <!-- Modal Edit End-->

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



<?php echo $__env->make('admin.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\web\konsultasi\resources\views/admin/managefaq.blade.php ENDPATH**/ ?>
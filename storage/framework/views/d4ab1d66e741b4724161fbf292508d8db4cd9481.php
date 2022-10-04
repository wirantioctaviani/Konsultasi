

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
                <h3 class="card-title">Daftar Subkategori FAQ</h3>
              </div>
                    
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-default" data-toggle='modal' data-target="#ModalAdd"><i class="nav-icon fas fa-plus"></i>  Tambah Subkategori</button>
               <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Jenis Layanan</th>
                          <th>Kategori</th>
                          <th>Subkategori</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $datasubkategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datasubkategoris): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($datasubkategoris->jenis_layanan); ?></td>
                                <td><?php echo e($datasubkategoris->nama_kategori); ?></td>
                                <td><?php echo e($datasubkategoris->nama_subkategori); ?></td>
                                <td>
                                  <div class="btn-group-vertical">
                                    <button 
                                        type="button" 
                                        class="btn icon btn-info"
                                        data-toggle="modal" 
                                        data-target="#edit-<?php echo e($datasubkategoris->id_subkategori); ?>">Edit
                                    </button>
                                    <a href="<?php echo e(action('App\Http\Controllers\FaqController@deletesubkategori', ['id_subkategori' => $datasubkategoris->id_subkategori, 'kategori_id' => $kategori_id,
                                      'layanan_id' => $layanan_id])); ?>" onclick="return confirm('Anda yakin ingin menghapus subkategori ?')" class="btn btn-danger">Hapus Subkategori</a>
                                  </div>
                                </td>
                              </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                  </table>
              </div>
              <!-- /.card-body -->
              <!-- Modal Add Begin -->
                    <div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Tambah Subkategori FAQ</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="<?php echo e(action('App\Http\Controllers\FaqController@addsubkategori')); ?>" class="form-prevent" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                            <input type="hidden" name="kategori_id" value="<?php echo e($kategori_id); ?>" class="form-control">
                            <input type="hidden" name="layanan_id" value="<?php echo e($layanan_id); ?>" class="form-control">  
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Nama Subkategori</label>
                                <input name="nama_subkategori" type="text" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Jawaban</label>
                                <textarea name="jawaban" class="form-control post-input summernote" rows="5" id="summernote"></textarea>
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
              <!-- Modal Add End -->

              <!-- Modal Edit Begin -->
                  <?php $__currentLoopData = $datasubkategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datasubkategoris2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="modal fade" id="edit-<?php echo e($datasubkategoris2->id_subkategori); ?>" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title text-center" id="exampleModalLabel">Edit Kategori FAQ</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form class="form-prevent" action="<?php echo e(action('App\Http\Controllers\FaqController@editsubkategori', [$datasubkategoris2->id_subkategori])); ?>" enctype="multipart/form-data" method="POST">
                              <div class="modal-body">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Nama Subkategori :</label>
                                  <input name="nama_subkategori" type="text" class="form-control" id="nama_subkategori" value="<?php echo e($datasubkategoris2->nama_subkategori); ?>">
                                  <input name="id_subkategori" type="text" class="form-control" id="id" value="<?php echo e($datasubkategoris2->id_subkategori); ?>" hidden>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Jawaban :</label>
                                  <textarea id="summernote2" name="jawaban" cols="30" rows="10" class="form-control summernote2" ><?php echo e(Request::old('jawaban', $datasubkategoris2->jawaban)); ?></textarea>
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



<?php echo $__env->make('admin.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\web\konsultasi\resources\views/admin/managesubkategori.blade.php ENDPATH**/ ?>
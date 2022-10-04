<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Konsultasi Online | Pusbin JFA</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('/adminlte/plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('/adminlte/dist/css/adminlte.min.css')); ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/summernote/summernote-bs4.min.css')); ?>">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/codemirror/codemirror.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/codemirror/theme/monokai.css')); ?>">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper" style="background-color: #2596be;">
  <div class="header" style="background-color: white;">
    <div class="row mb-2">
          <div class="col-sm-1">
          </div>
          <div class="col-sm-3">
            <img src="<?php echo e(asset('adminlte/dist/img/pusbin.png')); ?>" class="img-responsive" style="opacity: .8; width: 130px; height: 120px;">
          </div>
          <div class="col-sm-8">
            <h1 style="margin-top: 30px;">Layanan Konsultasi Online Pusbin JFA</h1>
            </div>
          </div>
    </div>
  <div class="container-fluid" style="width: 1500px;"> 
      <section class="content-header">
        <div class="container-fluid">
          <?php if(session('sukses')): ?>
          <div class="alert alert-success" role="alert">
          <?php echo e(session('sukses')); ?>

          </div>
          <?php endif; ?>
          <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
    <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
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
                      <br>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      <div class="timeline">
                          <!-- timeline time label -->
                          <?php $__currentLoopData = $data_konsul_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_konsul_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="time-label">
                            <span class="bg-gray"><?php echo e(\Carbon\Carbon::parse($data_konsul_detail->created_at)->format('d M Y')); ?></span>
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
                                  <!-- <input type="hidden" name="no_tiket" value="<?php echo e($data_konsul_detail->no_tiket); ?>" class="form-control"> -->
                              </div>
                              <!-- <?php if($data_konsul_detail->is_answered = 2): ?>
                              <div class="timeline-body">
                                <label style="color: red;">*Approved by Subkoordinator at <?php echo e($data_konsul_detail->updated_at); ?></label>
                              </div>
                              <?php endif; ?> -->
                          </div>
                          <?php endif; ?>
                          </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>

              <?php if($data_konsul_online->status_id == '1'): ?>
                  <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                      <div class="container-fluid">
                        <div class="accordion" id="accordionExample">
                          <div class="card">
                            <div class="card-header" id="headingThree">
                              <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  <h5><i class="fas fa-plus"></i> Kirim Respon </h5>
                                </button>
                              </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                              <div class="card-body">
                                <form action="<?php echo e(action('App\Http\Controllers\UsersController@ask_konsulonline', [$data_konsul_detail->id_konsul])); ?>" method="post" enctype="multipart/form-data">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="id_konsul" value="<?php echo e($data_konsul_detail->id_konsul); ?>" class="form-control">
                                        <input type="hidden" name="no_tiket" value="<?php echo e($data_konsul_online->no_tiket); ?>" class="form-control">
                                        <input type="hidden" name="nama" value="<?php echo e($data_konsul_online->nama); ?>" class="form-control">
                                        <div class="form-group">
                                            <label for="">Detail</label>
                                            <textarea id="summernote" name="details" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                                            <label for="exampleInputFile">Dokumen Pendukung</label>
                        <input type="file" name="dokumen" class="form-control" id="dokumen" accept="image/*, application/pdf, application/msword">
                                                          </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                    </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                    </div>
                  </div>
              <?php endif; ?>


              <?php if($data_konsul_online->status_id == '3'): ?>
                <div class="panel-body">
                    <div class="col text-center">
                        <form action="<?php echo e(action('App\Http\Controllers\UsersController@closed_konsulonline', [$data_konsul_detail->id_konsul])); ?>" method="post">
                                        <?php echo e(csrf_field()); ?>

                                        <button type="submit" onclick="return confirm('Close Konsultasi?')" class="btn btn-primary btn-lg" >Close Case</button>
                                        <br>
                                        <br>
                                        <input type="hidden" name="id_konsul" value="<?php echo e($data_konsul_detail->id_konsul); ?>" id="parent_id" class="form-control">
                                        <input type="hidden" name="nama" value="<?php echo e($data_konsul_online->nama); ?>" class="form-control">
                                        <input type="hidden" name="no_tiket" value="<?php echo e($data_konsul_detail->no_tiket); ?>" class="form-control">
                                        <input type="hidden" name="id_detail" value="<?php echo e($data_konsul_detail->id_detail); ?>" id="parent_id" class="form-control">
                        </form>
                    </div>
                </div>

                  <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                      <div class="container-fluid">
                        <div class="accordion" id="accordionExample">
                          <div class="card">
                            <div class="card-header" id="headingThree">
                              <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  <h5><i class="fas fa-plus"></i> Respon </h5>
                                </button>
                              </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                              <div class="card-body">
                                <form action="<?php echo e(action('App\Http\Controllers\UsersController@reply_konsulonline', [$data_konsul_detail->id_konsul])); ?>" method="post" enctype="multipart/form-data">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="id_konsul" value="<?php echo e($data_konsul_detail->id_konsul); ?>" class="form-control">
                                        <input type="hidden" name="no_tiket" value="<?php echo e($data_konsul_online->no_tiket); ?>" class="form-control">
                                        <input type="hidden" name="nama" value="<?php echo e($data_konsul_online->nama); ?>" class="form-control">
                                        <div class="form-group">
                                            <label for="">Detail</label>
                                            <textarea id="summernote" name="details" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputFile">Dokumen Pendukung</label>
                                        <input type="file" name="dokumen" class="form-control" id="dokumen" accept="image/*, application/pdf, application/msword">
                                                          </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                    </div>
                  </div>
              <?php endif; ?>
            </div>
                  <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
  </div>
  <div class="footer" style="background-color: black; height: 70px;">
    <div class="container" style="margin-top:20px">
      <div class="row">
        <div class="col-md-12">
          <h5 style="text-align: center; color: white;margin-top: 20px">Copyright &copy; 2021 <a href="pusbinjfa.bpkp.go.id">Pusbin JFA</a>. All rights reserved. </h5>
        </div>
      </div>
    </div>
  </div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo e(asset('/adminlte/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('/adminlte/dist/js/adminlte.min.js')); ?>"></script>
<!-- Summernote -->
  <script src="<?php echo e(asset('adminlte/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
  <!-- CodeMirror -->
  <script src="<?php echo e(asset('adminlte/plugins/codemirror/codemirror.js')); ?>"></script>
  <script src="<?php echo e(asset('adminlte/plugins/codemirror/mode/css/css.js')); ?>"></script>
  <script src="<?php echo e(asset('adminlte/plugins/codemirror/mode/xml/xml.js')); ?>"></script>
  <script src="<?php echo e(asset('adminlte/plugins/codemirror/mode/htmlmixed/htmlmixed.js')); ?>"></script>
<script>
    $(function () {
      // Summernote
      // $('#summernote').summernote()

      // // CodeMirror
      // CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      //   mode: "htmlmixed",
      //   theme: "monokai"
      // });
      $('#summernote').summernote({
  toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['fontname', ['fontname']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
    ['table', ['table']],
  ['insert', ['picture']]
  ]
});
    })
  </script>
</body>
</html>
<?php /**PATH C:\bitnami73\apache2\htdocs\public\konsultasi\resources\views/users/DetailKonsulOnline.blade.php ENDPATH**/ ?>
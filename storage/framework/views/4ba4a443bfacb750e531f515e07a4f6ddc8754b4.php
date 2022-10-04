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
            <h1 style="margin-top: 30px;">Formulir Konsultasi Online Pusbin JFA</h1>
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
                <!-- form start -->
                <form action="<?php echo e(action('App\Http\Controllers\UsersController@create_konsul')); ?>" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input name="nama" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter nama"required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jabatan</label>
                      <input name="jabatan" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter jabatan" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Unit Kerja</label>
                      <input name="unit_kerja" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter unit kerja" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nomor HP</label>
                      <input name="no_hp" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter nomor hp"> 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input name="email" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                          <label>Jenis Layanan Konsultasi</label>
                          <select class="custom-select" name="layanan_id">
                            <option value="option_select" disabled selected>Pilih Layanan</option>
                            <?php $__currentLoopData = $data_layanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_layanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($data_layanan->id); ?>"><?php echo e($data_layanan->jenis_layanan); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Judul</label>
                      <input name="judul" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Judul" required>
                    </div>
                    <div class="form-group">
                          <label>Detail Permasalahan</label>
                          <textarea id="summernote" name="details" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                          <label style="color: red;">*Untuk upload gambar, silakan klik ikon "Picture" yang berada paling kanan</label>
                        </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Dokumen Pendukung</label>
                          <input type="file" name="dokumen" class="form-control" id="dokumen" accept="application/pdf, application/msword">
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
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
<?php /**PATH C:\bitnami73\apache2\htdocs\public\konsultasi\resources\views/users/form_konsulonline.blade.php ENDPATH**/ ?>
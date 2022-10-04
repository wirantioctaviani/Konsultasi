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
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="<?php echo e(asset('/adminlte/dist/img/bpkp.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PUSBIN JFA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo e(asset('/adminlte/dist/img/user2-160x160.jpg')); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo e(action('App\Http\Controllers\UsersController@konsul_online')); ?>" class="nav-link <?php echo e((request()->is('konsul_online')) ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>Form Konsultasi Online</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(action('App\Http\Controllers\UsersController@list_konsul_online')); ?>" class="nav-link <?php echo e((request()->is('list_konsul_online')) ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                List Konsultasi Online
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(action('App\Http\Controllers\UsersController@pengaduan')); ?>" class="nav-link <?php echo e((request()->is('pengaduan')) ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Form Pengaduan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <?php echo $__env->yieldContent('content'); ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    </div>
    <strong>Copyright &copy; 2021 <a href="pusbinjfa.bpkp.go.id">Pusbin JFA</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
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
  <!-- DataTables  & Plugins -->
  <script src="<?php echo e(asset('adminlte/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
  <script src="<?php echo e(asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
  <script src="<?php echo e(asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
  <script src="<?php echo e(asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
  <script src="<?php echo e(asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
  <script src="<?php echo e(asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
  <script src="<?php echo e(asset('adminlte/plugins/jszip/jszip.min.js')); ?>"></script>
  <script src="<?php echo e(asset('adminlte/plugins/pdfmake/pdfmake.min.js')); ?>"></script>
  <script src="<?php echo e(asset('adminlte/plugins/pdfmake/vfs_fonts.js')); ?>"></script>
  <script src="<?php echo e(asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
  <script src="<?php echo e(asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js')); ?>"></script>
  <script src="<?php echo e(asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script>
  <!-- CodeMirror -->
  <script src="<?php echo e(asset('adminlte/plugins/codemirror/codemirror.js')); ?>"></script>
  <script src="<?php echo e(asset('adminlte/plugins/codemirror/mode/css/css.js')); ?>"></script>
  <script src="<?php echo e(asset('adminlte/plugins/codemirror/mode/xml/xml.js')); ?>"></script>
  <script src="<?php echo e(asset('adminlte/plugins/codemirror/mode/htmlmixed/htmlmixed.js')); ?>"></script>
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
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
<?php /**PATH C:\bitnami73\apache2\htdocs\public\konsultasi\resources\views/users/master.blade.php ENDPATH**/ ?>
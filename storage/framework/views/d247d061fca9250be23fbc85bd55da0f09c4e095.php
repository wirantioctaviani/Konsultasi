<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <!-- CSRF Token -->
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <title>Konsultasi Online Pusbin JFA</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/dist/css/adminlte.min.css')); ?>">
  <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">
    <!-- summernote -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/summernote/summernote-bs4.min.css')); ?>">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/codemirror/codemirror.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/codemirror/theme/monokai.css')); ?>">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(asset('adminlte/dist/img/pusbin.png')); ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<style>
        /* untuk menghilangkan spinner  */
        .spinner {
            display: none;
        }
</style>
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
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo e(action('App\Http\Controllers\AuthController@logout')); ?>" class="nav-link">LOGOUT</a>
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
    <div class="sidebar" >
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" align="center">
        <div class="image" align="center">
          <img src="<?php echo e(asset('/adminlte/dist/img/user2.png')); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info" align="center">
          <a href="#" class="d-block"><?php echo e(Auth()->user()->name); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo e(action('App\Http\Controllers\AdminController@dashboard')); ?>" class="nav-link <?php if($active=='dashboard'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(action('App\Http\Controllers\AdminController@list_konsulonline')); ?>" class="nav-link <?php if($active=='all'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                List All Konsultasi Online
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(action('App\Http\Controllers\AdminController@list_konsulonline_open')); ?>" class="nav-link <?php if($active=='open'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                List Konsultasi Online On-Going
              </p>
            </a>
          </li>
          <?php if(auth()->user()->mstr_role_id == '1'): ?>
          <li class="nav-item">
            <a href="<?php echo e(action('App\Http\Controllers\AdminUserManagerController@manage_user')); ?>" class="nav-link <?php if($active=='user'): ?> active <?php endif; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(action('App\Http\Controllers\AdminController@manage_layanan')); ?>" class="nav-link <?php if($active=='layanan'): ?> active <?php endif; ?>">
              <i class="nav-icon far fa-comment"></i>
              <p>
                Manage Layanan
              </p>
            </a>
          </li>
          <?php endif; ?>
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
      <b>Version</b> 3.1.0
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
<script src="<?php echo e(asset('adminlte/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('adminlte/dist/js/adminlte.min.js')); ?>"></script>
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
  <!-- Summernote -->
  <script src="<?php echo e(asset('adminlte/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
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
      $("#example2").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false
      }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
  </script>
  <script>
      $(document).ready(function(){
       $('.dynamic').change(function(){
        if($(this).val() != '')
        {
         var select = $(this).attr("id");
         var value = $(this).val();
         var dependent = $(this).data('dependent');
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"<?php echo e(route('dynamicdependent.fetch')); ?>",
          method:"POST",
          data:{select:select, value:value, _token:_token, dependent:dependent},
          success:function(result)
          {
           $('#'+dependent).html(result);
          }

         })
        }
       });

       $('#subbid_id').change(function(){
        $('#pic_id').val('');
       });
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
  <?php echo $__env->yieldContent('footer'); ?>
<script>
        // jika form-prevent disubmit maka disable button-prevent dan tampilkan spinner
        (function () {
            $('.form-prevent').on('submit', function () {
                $('.button-prevent').attr('disabled', 'true');
                $('.spinner').show();
                $('.hide-text').hide();
            })
        })();
</script> 
</body>
</html>
<?php /**PATH D:\webapp\webpusbin2021\public\konsultasi\resources\views/admin/master2.blade.php ENDPATH**/ ?>
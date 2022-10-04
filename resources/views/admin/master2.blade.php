<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Konsultasi Online Pusbin JFA</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
  <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- summernote -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/summernote/summernote-bs4.min.css')}}">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/codemirror/codemirror.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/codemirror/theme/monokai.css')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('adminlte/dist/img/pusbin.png')}}">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
        <a href="{{ action('App\Http\Controllers\LoginController@logout') }}" class="nav-link">LOGOUT</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{asset('/adminlte/dist/img/bpkp.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PUSBIN JFA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" >
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" align="center">
        <div class="image" align="center">
          <img src="{{asset('/adminlte/dist/img/user2.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info" align="center">
          <a href="#" class="d-block">{{request()->session()->get('namalengkap')}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ action('App\Http\Controllers\AdminController@dashboard') }}" class="nav-link @if($active=='dashboard') active @endif">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ action('App\Http\Controllers\AdminController@list_konsulonline') }}" class="nav-link @if($active=='all') active @endif">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                List All Konsultasi Online
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ action('App\Http\Controllers\AdminController@list_konsulonline_open') }}" class="nav-link @if($active=='open') active @endif">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                List Konsultasi Online On-Going
              </p>
            </a>
          </li>
          @if(request()->session()->get('level') == '1')
          <li class="nav-item">
            <a href="{{ action('App\Http\Controllers\AdminUserManagerController@manage_user') }}" class="nav-link @if($active=='user') active @endif">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ action('App\Http\Controllers\AdminController@manage_layanan') }}" class="nav-link @if($active=='layanan') active @endif">
              <i class="nav-icon far fa-comment"></i>
              <p>
                Manage Layanan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ action('App\Http\Controllers\FaqController@managefaq') }}" class="nav-link @if($active=='faq') active @endif">
              <i class="nav-icon fa fa-question-circle"></i>
              <p>
                Manage FAQ
              </p>
            </a>
          </li>
          @endif
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
    @yield('content')
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
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- DataTables  & Plugins -->
  <script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/jszip/jszip.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/pdfmake/pdfmake.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/pdfmake/vfs_fonts.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
  <!-- Summernote -->
  <script src="{{asset('adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <!-- CodeMirror -->
  <script src="{{asset('adminlte/plugins/codemirror/codemirror.js')}}"></script>
  <script src="{{asset('adminlte/plugins/codemirror/mode/css/css.js')}}"></script>
  <script src="{{asset('adminlte/plugins/codemirror/mode/xml/xml.js')}}"></script>
  <script src="{{asset('adminlte/plugins/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
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
          url:"{{ route('dynamicdependent.fetch') }}",
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
        height: 300,
        toolbar: [
          // [groupName, [list of button]]
          ['style', ['bold', 'italic', 'underline']],
          ['font', [ 'superscript', 'subscript']],
          ['fontsize', ['fontsize']],
          ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']]
        ]
      });
    })
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
      $('#summernote2').summernote({
        height: 300,
        toolbar: [
          // [groupName, [list of button]]
          ['style', ['bold', 'italic', 'underline']],
          ['font', [ 'superscript', 'subscript']],
          ['fontsize', ['fontsize']],
          ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']]
        ]
      });
    })
  </script>
  @yield('footer')
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

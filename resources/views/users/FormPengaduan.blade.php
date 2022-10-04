<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Konsultasi Online | Pusbin JFA</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/adminlte/dist/css/adminlte.min.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/summernote/summernote-bs4.min.css')}}">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/codemirror/codemirror.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/codemirror/theme/monokai.css')}}">
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
      <img src="{{asset('adminlte/dist/img/bpkp.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PUSBIN JFA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
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
            <a href="{{ action('App\Http\Controllers\UsersController@konsul_online') }}" class="nav-link {{ (request()->is('App\Http\Controllers\UsersController@konsul_online')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>Form Konsultasi Online</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ action('App\Http\Controllers\UsersController@list_konsul_online') }}" class="nav-link {{ (request()->is('App\Http\Controllers\UsersController@list_konsul_online')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                List Konsultasi Online
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link {{ (request()->is('App\Http\Controllers\UsersController@list_konsul_online')) ? 'active' : '' }}">
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
    

<!-- Content Wrapper. Contains page content -->
    <section class="content-header">
      <div class="container-fluid">
        @if(session('sukses'))
        <div class="alert alert-success" role="alert">
        {{session('sukses')}}
        </div>
        @endif
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Layanan Pengaduan</h1>
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
              <div class="card-header">
                <h1 class="card-title">Form Layanan Pengaduan</h1>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ action('App\Http\Controllers\UsersController@InputPengaduan') }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  {{csrf_field()}}
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
                    <label for="exampleInputEmail1">Judul</label>
                    <input name="judul" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Judul" required>
                  </div>
                  <div class="form-group">
                        <label>Detail Pengaduan</label>
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
<script src="{{asset('/adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- Summernote -->
  <script src="{{asset('adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <!-- CodeMirror -->
  <script src="{{asset('adminlte/plugins/codemirror/codemirror.js')}}"></script>
  <script src="{{asset('adminlte/plugins/codemirror/mode/css/css.js')}}"></script>
  <script src="{{asset('adminlte/plugins/codemirror/mode/xml/xml.js')}}"></script>
  <script src="{{asset('adminlte/plugins/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
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

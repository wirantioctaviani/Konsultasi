<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Layanan Konsultasi Online - Pusbin JFA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('adminlte/dist/img/pusbin.png')}}" rel="icon">
  <link href="{{asset('/vesperassets/img/bpkp.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/adminlte/plugins/fontawesome-free/css/all.min.css')}}">

  <!-- Vendor CSS Files -->
  <link href="{{asset('/vesperassets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('/vesperassets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('/vesperassets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('/vesperassets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('/vesperassets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('/vesperassets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('/vesperassets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('/vesperassets/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('/vesperassets/css/searchbox.css')}}" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
  <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>

  <!-- =======================================================
  * Template Name: Vesperr - v4.7.0
  * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
        /* untuk menghilangkan spinner  */
        .spinner {
            display: none;
        }
  </style>
  <style>
        .searchContainer {
            display: inline-flex;
            flex: 1 1 300px;
            position: relative;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
          }

          .searchIcon {
            padding: 0.5rem;
          }

          .searchBox {
            border: 0;
            padding: 0.5rem 0.5rem 0.5rem 0;
            flex: 1;
          }

          .searchButton {
            background: #538AC5;
            border: 0;
            color: white;
            padding: 0.5rem;
            border-radius: 0;
          }

          #sidebar-wrapper .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
          }

          .nav-link.active {
            /*color: #3498db;*/
            font-weight: bold;
          }
    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="{{ action('App\Http\Controllers\UsersController@formkonsul') }}"><img src="{{asset('/vesperassets/img/logopusbin.jpg')}}" alt="" class="img-fluid"></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <!-- <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Layanan</a></li>
          <li><a class="nav-link scrollto" href="#form">Formulir Konsultasi</a></li> -->
          <li><a class="getstarted scrollto" href="{{ action('App\Http\Controllers\UsersController@formkonsul') }}">BERANDA</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
<!--   <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <br>
          <br>
          <h1 data-aos="fade-up">Media Layanan Konsultasi Online</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Pusat Pembinaan Jabatan Fungsional Auditor</h2>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="{{asset('/vesperassets/img/hero-img.png')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section> -->
  <br>
  <br>
  <main id="main">

  <!-- ======= Pricing Section ======= -->
    <section id="faq" class="pricing section-bg">      
        <div class="section-title">
          <h2><i>Detail FAQ</i></h2>
          <br>
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <form action="{{ action('App\Http\Controllers\UsersController@hasilpencarian') }}" method="get">                                   
                  <div class="row"> 
                      <div class="col-md-2"></div>                           
                      <div class="col-md-8">
                                <div class="col-rt-3">
                                  <div class="sb-example-1">
                                     <div class="search">
                                        <input type="text" class="searchTerm" placeholder="Apa yang ingin Anda cari ?" name="keyword">
                                        <button type="submit" class="searchButton">
                                          <i class="fa fa-search"></i>
                                       </button>
                                     </div>
                                  </div>
                                </div>
                      </div>
                      <div class="col-md-2"></div>
                  </div>
                  <br>
                </form>
              </div>
              <div class="col-md-2"></div>
            </div>
        </div>

      <div class="container-xl" >
        <div class="container-fluid" id="main" style="border: 2px solid #00b4cc;background-color: #f7fbfe;height: auto;margin-top: 10px;margin-bottom: 20px;">
            <div class="row row-offcanvas row-offcanvas-left vh-100">
                <div class="col-md-3 h-100 overflow-auto bg-light" id="sidebar" role="navigation" >  
                  <div class="sidebar-heading" style="margin-top:20px;margin-bottom: 20px;margin-left: 10px;font-size: 18px;"><b>{{$subkategorishow->jenis_layanan}}</b> </div>
                  <hr>
                  @foreach($kategori as $kategoris)
                    <ul class="nav flex-column mt-4" style="background-color:transparent;">
                        <!-- <li class="nav-item"><a class="nav-link" href="#">Overview</a></li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="" style="color: black" data-toggle="collapse" data-target="#menu{{$kategoris->id_kategori}}"><b>{{$kategoris->nama_kategori}}▾</b></a>
                              @if($kategoris->id_kategori == $id_kategori)
                              <!-- <label>ada</label> -->
                                <ul class="list-unstyled flex-column pl-6" id="menu{{$kategoris->id_kategori}}" aria-expanded="false">
                                  @foreach($subkategori as $subkategoris)
                                    @if($subkategoris->kategori_id == $kategoris->id_kategori)
                                        <li class="nav-item"><a class="nav-link @if($id_subkategori==$subkategoris->id_subkategori) active @endif" href="{{ action('App\Http\Controllers\UsersController@detailfaq', ['layanan_id' => $subkategoris->layanan_id, 'id_kategori' => $subkategoris->kategori_id, 'id_subkategori' => $subkategoris->id_subkategori
                                          ]) }}">{{$subkategoris->nama_subkategori}}</a></li>
                                   <!-- <li class="nav-item"><a class="nav-link" href="">Report 2</a></li> -->
                                    @endif
                                  @endforeach
                                </ul>
                              @else
                              <!-- <label>nda ada</label> -->
                                <ul class="list-unstyled flex-column pl-6 collapse" id="menu{{$kategoris->id_kategori}}" aria-expanded="false">
                                  @foreach($subkategori as $subkategoris)
                                    @if($subkategoris->kategori_id == $kategoris->id_kategori)
                                        <li class="nav-item"><a class="nav-link @if($id_subkategori==$subkategoris->id_subkategori) active @endif" href="{{ action('App\Http\Controllers\UsersController@detailfaq', ['layanan_id' => $subkategoris->layanan_id, 'id_kategori' => $subkategoris->kategori_id, 'id_subkategori' => $subkategoris->id_subkategori
                                          ]) }}">{{$subkategoris->nama_subkategori}}</a></li>
                                   <!-- <li class="nav-item"><a class="nav-link" href="">Report 2</a></li> -->
                                    @endif
                                  @endforeach
                                </ul>
                              @endif
                        </li>
                       <!--  <li class="nav-item">
                            <a class="nav-link" href="#submenu2" data-toggle="collapse" data-target="#submenu2">Reports▾</a>
                            <ul class="list-unstyled flex-column pl-3 collapse" id="submenu2" aria-expanded="false">
                               <li class="nav-item"><a class="nav-link" href="">Report 1</a></li>
                               <li class="nav-item"><a class="nav-link" href="">Report 2</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#submenu3" data-toggle="collapse" data-target="#submenu3">Reports▾</a>
                            <ul class="list-unstyled flex-column pl-3 collapse" id="submenu3" aria-expanded="false">
                               <li class="nav-item"><a class="nav-link" href="">Report 1</a></li>
                               <li class="nav-item"><a class="nav-link" href="">Report 2</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#submenu4" data-toggle="collapse" data-target="#submenu4">Reports▾</a>
                            <ul class="list-unstyled flex-column pl-3 collapse" id="submenu4" aria-expanded="false">
                               <li class="nav-item"><a class="nav-link" href="">Report 1</a></li>
                               <li class="nav-item"><a class="nav-link" href="">Report 2</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#submenu5" data-toggle="collapse" data-target="#submenu5">Reports▾</a>
                            <ul class="list-unstyled flex-column pl-3 collapse" id="submenu5" aria-expanded="false">
                               <li class="nav-item"><a class="nav-link" href="">Report 1</a></li>
                               <li class="nav-item"><a class="nav-link" href="">Report 2</a></li>
                            </ul>
                        </li> -->
                        <!-- <li class="nav-item"><a class="nav-link" href="#">Analytics</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Export</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Snippets</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Flexbox</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Layouts</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Templates</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Themes</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Last Item</a></li> -->
                    </ul>
                  @endforeach
                </div>
                <!--/col-->
                <div class="col main h-100 overflow-auto">
                    <h2 class="sub-header mt-3 text-center">{{$subkategorishow->nama_subkategori}}</h2>
                    <hr>
                    <div class="mb-3">
                        <div class="card-deck">
                            <div class="card card-inverse card-success ">
                                <div class="card-body">
                                    <blockquote class="card-blockquote">
                                        <p style="text-align:justify;">{!!$subkategorishow->jawaban!!}</p>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/main col-->
            </div>
        </div>
      </div>
    </section><!-- End Pricing Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; <i>Copyright</i> <strong>Pusbin JFA 2022</strong>. <i>Developed by </i><b>Sibijak DevTeam</b>.
          </div>
          <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
    <!--             <a href="#intro" class="scrollto">Home</a>
            <a href="#about" class="scrollto">About</a>
            <a href="#services">Layanan</a> -->
            <a href="http://pusbinjfa.bpkp.go.id">Website Pusbin JFA</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('/vesperassets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('/vesperassets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('/vesperassets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('/vesperassets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('/vesperassets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('/vesperassets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('/vesperassets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('/vesperassets/js/main.js')}}"></script>

</body>

</html>
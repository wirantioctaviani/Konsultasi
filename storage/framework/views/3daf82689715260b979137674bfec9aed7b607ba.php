<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Layanan Konsultasi Online - Pusbin JFA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo e(asset('adminlte/dist/img/pusbin.png')); ?>" rel="icon">
  <link href="<?php echo e(asset('/vesperassets/img/bpkp.png')); ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('/adminlte/plugins/fontawesome-free/css/all.min.css')); ?>">

  <!-- Vendor CSS Files -->
  <link href="<?php echo e(asset('/vesperassets/vendor/aos/aos.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('/vesperassets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('/vesperassets/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('/vesperassets/vendor/boxicons/css/boxicons.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('/vesperassets/vendor/glightbox/css/glightbox.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('/vesperassets/vendor/remixicon/remixicon.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('/vesperassets/vendor/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo e(asset('/vesperassets/css/style.css')); ?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/vesperassets/css/searchbox.css')); ?>" />

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
    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
</head>

<body>

        <?php if(Session('Berrhasil')): ?>
        <script>
            swal(`Pertanyaan Berhasil Terkirim`, "Terima Kasih. Pertanyaan Anda telah terkirim. Mohon cek email Anda secara berkala untuk melihat jawaban konsultasi.", "success");
        </script>
        <?php endif; ?>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.html"><img src="<?php echo e(asset('/vesperassets/img/bpkp.png')); ?>" alt="" class="img-fluid"></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Layanan</a></li>
          <!-- <li><a class="nav-link scrollto " href="#services">FAQ</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li> -->
          <li><a class="nav-link scrollto" href="#form">Formulir Konsultasi</a></li>
          <li><a class="getstarted scrollto" href="#faq">FAQ</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <br>
          <br>
          <h1 data-aos="fade-up">Media Layanan Konsultasi Online</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Pusat Pembinaan Jabatan Fungsional Auditor</h2>
          <!-- <div data-aos="fade-up" data-aos-delay="800">
            <a href="#about" class="btn-get-started scrollto"><i class="fas fa-angle-double-down"></i></a>
          </div> -->
          <!-- <form action="https://jdih.bpkp.go.id/page/pencarian" method="get">                              
            <div class="row">                            
                <div class="col-lg-10 col-xs-12">
                    <input type="text" style="border: 2px solid #3498db;" class="form-control input-lg" id="q" name="q" placeholder="Ketik kata kunci pencarian">
                </div>
            </div>
            <br>
            <div class="d-lg-flex">
              <button id="cari" type="submit" class="btn btn-get-started scrollto">Cari Pertanyaan</button>
            </div>
          </form> -->
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="<?php echo e(asset('/vesperassets/img/hero-img.png')); ?>" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <br>
  <br>
  <main id="main">

          <!-- ======= Pricing Section ======= -->
<!--     <section id="faq" class="features section-bg">
      <div class="container">

        <div class="section-title">
          <h2>FAQ SIBIJAK</h2>
          <p>Sit sint consectetur velit nemo qui impedit suscipit alias ea</p>
          <br>
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <form action="" method="get">                                   
                  <div class="row"> 
                      <div class="col-md-2"></div>                           
                      <div class="col-md-8">
                                <div class="col-rt-3 equal-height">
                                  <div class="sb-example-1">
                                     <div class="search">
                                        <input type="text" class="searchTerm" placeholder="What are you looking for?">
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

        <div class="row">

          <div class="col-lg-3 col-md-4">
            <div class="box" data-aos="zoom-in-right" data-aos-delay="200" style="background-color: #f7fbfe;border: 0px;">
                <div class="panel-group" style="background-color: white;border: 2px solid #00b4cc;">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#collapse1" style="font-size:20px;color: black;">Gagal Login Ke Aplikasi SIBIJAK</a>
                        </h4>
                      </div>
                      <div id="collapse1" class="panel-collapse collapse">
                        <ul class="list-group">
                          <li class="list-group-item"><a href="">Lupa Password</a></li>
                          <li class="list-group-item"><a href="">Username/Password Salah</a></li>
                        </ul>
                      </div>
                    </div>
                </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="box" data-aos="zoom-in-right" data-aos-delay="200" style="background-color: #f7fbfe;border: 0px;">
                <div class="panel-group" style="background-color: white;border: 2px solid #00b4cc;">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#collapse2" style="font-size:20px;color: black">Pejabat Pengusul</a>
                        </h4>
                      </div>
                      <div id="collapse2" class="panel-collapse collapse">
                        <ul class="list-group">
                          <li class="list-group-item"><a href="">Bagaimana cara menetapkan atau mengganti pejabat pengusul di SIBIJAK</a></li>
                        </ul>
                      </div>
                    </div>
                </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="box" data-aos="zoom-in-right" data-aos-delay="200" style="background-color: #f7fbfe;border: 0px;">
                <div class="panel-group" style="background-color: white;border: 2px solid #00b4cc;">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#collapse3" style="font-size:20px;color: black">Saldo Awal</a>
                        </h4>
                      </div>
                      <div id="collapse3" class="panel-collapse collapse">
                        <ul class="list-group">
                          <li class="list-group-item"><a href="">Cara Pengisian Saldo Awal PAK</a></li>
                          <li class="list-group-item"><a href="">Salah Input Saldo Awal atau Saldo Awal Tidak Muncul</a></li>
                        </ul>
                      </div>
                    </div>
                </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="icon-box" data-aos="zoom-in-right" data-aos-delay="200" style="background-color: #f7fbfe;border: 0px;">
                <div class="panel-group" style="background-color: white;border: 2px solid #00b4cc;">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#collapse4" style="font-size:20px;color: black">Jam Lembur</a>
                        </h4>
                      </div>
                      <div id="collapse4" class="panel-collapse collapse">
                        <ul class="list-group">
                          <li class="list-group-item"><a href="">Jumlah Jam Lembur Melebihi 200 Jam Per Semester</a></li>
                        </ul>
                      </div>
                    </div>
                </div>
            </div>
          </div>

        </div>

      </div>
    </section> --><!-- End Pricing Section -->

        <section id="faq" class="features section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>FAQ SIBIJAK</h2>
          <!-- <p>Silakan klik layanan yang diinginkan untuk melihat daftar pertanyaan dan jawaban dari layanan terkait atau Anda dapat mengettikkan kata kunci dari pertanyaan yang ingin Anda cari.</p> -->
          <br>
            <!-- <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <form action="" method="get">                                   
                  <div class="row"> 
                      <div class="col-md-2"></div>                           
                      <div class="col-md-8">
                                <div class="col-rt-3 equal-height">
                                  <div class="sb-example-1">
                                     <div class="search">
                                        <input type="text" class="searchTerm" placeholder="Apa yang ingin Anda cari?">
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
            </div> -->
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="300">
          <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategoris): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-4" style="margin-bottom: 20px;">
              <div class="icon-box" style="height: auto;background-color: white;border: 2px solid #00b4cc;">
                <div class="panel-group" style="background-color: white;">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title text-center">
                            <a data-toggle="collapse" href="#collapse1" style="font-size:20px;color: black;"><?php echo e($kategoris->nama_kategori); ?></a>
                          </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse show">
                          <ul class="list-group">
                            <?php $__currentLoopData = $subkategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subkategoris): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($subkategoris->id_kategori == $kategoris->id_kategori): ?>
                                <li class="list-group-item"><a href=""><?php echo e($subkategoris->nama_subkategori); ?></a></li>
                              <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ul>
                        </div>
                      </div>
                  </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--           <div class="col-lg-3 col-md-4">
            <div class="icon-box" style="height: auto;background-color: white;border: 2px solid #00b4cc;">
              <div class="panel-group" style="background-color: white;">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title text-center">
                          <a data-toggle="collapse" href="#collapse1" style="font-size:20px;color: black;">Saldo Awal</a>
                        </h4>
                      </div>
                      <div id="collapse1" class="panel-collapse collapse show">
                        <ul class="list-group">
                          <li class="list-group-item"><a href="">Cara Pengisian Saldo Awal PAK</a></li>
                          <li class="list-group-item"><a href="">Salah Input Saldo Awal atau Saldo Awal Tidak Muncul</a></li>
                        </ul>
                      </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4">
            <div class="icon-box" style="height: auto;background-color: white;border: 2px solid #00b4cc;">
                <div class="panel-group" style="background-color: white;">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#collapse2" style="font-size:20px;color: black">Pejabat Pengusul</a>
                        </h4>
                      </div>
                      <div id="collapse2" class="panel-collapse collapse show">
                        <ul class="list-group">
                          <li class="list-group-item"><a href="">Bagaimana cara menetapkan atau mengganti pejabat pengusul di SIBIJAK</a></li>
                        </ul>
                      </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4">
            <div class="icon-box" style="height: auto;background-color: white;border: 2px solid #00b4cc;">
              <div class="panel-group" style="background-color: white;">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#collapse4" style="font-size:20px;color: black">Jam Lembur</a>
                        </h4>
                      </div>
                      <div id="collapse4" class="panel-collapse collapse show">
                        <ul class="list-group">
                          <li class="list-group-item"><a href="">Jumlah Jam Lembur Melebihi 200 Jam Per Semester</a></li>
                        </ul>
                      </div>
                    </div>
                </div>
            </div>
          </div> -->
        </div>
    </section><!-- End FAQ Section -->
    <!-- ======= FAQ Section ======= -->
    <!-- <section id="faq" class="features section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Frequently Asked Questions</h2>
          <br>
          <h4>Apa yang Anda cari ?</h4>
          <br>
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <form action="" method="get">                                   
                  <div class="row"> 
                      <div class="col-md-2"></div>                           
                      <div class="col-md-8">
                        <div class="searchContainer">
                          <i class="fa fa-search searchIcon"></i>
                          <input class="searchBox form-control input-lg" type="search" name="search" placeholder="Search...">
                          <input type="submit" value="Search" class="searchButton">
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



      </div>
    </section> --><!-- End FAQ Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong>Pusbin JFA 2022</strong>. Developed by <b>Sibijak DevTeam</b>.
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/vesperr-free-bootstrap-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="#intro" class="scrollto">Home</a>
            <a href="#about" class="scrollto">About</a>
            <a href="#services">Layanan</a>
            <a href="http://pusbinjfa.bpkp.go.id">Website Pusbin JFA</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo e(asset('/vesperassets/vendor/purecounter/purecounter.js')); ?>"></script>
  <script src="<?php echo e(asset('/vesperassets/vendor/aos/aos.js')); ?>"></script>
  <script src="<?php echo e(asset('/vesperassets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('/vesperassets/vendor/glightbox/js/glightbox.min.js')); ?>"></script>
  <script src="<?php echo e(asset('/vesperassets/vendor/isotope-layout/isotope.pkgd.min.js')); ?>"></script>
  <script src="<?php echo e(asset('/vesperassets/vendor/swiper/swiper-bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('/vesperassets/vendor/php-email-form/validate.js')); ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo e(asset('/vesperassets/js/main.js')); ?>"></script>

    <script>
      $(function () {  
      $('.error').hide();
        $('#summernote').summernote({
          placeholder: 'Tuliskan detail permasalahan (Sertakan nama, nip, dan unit kerja)',
          tabsize: 2,
          height: 120,
          toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']]
          ]
        });


      $(document).on('click', '#submitButton', chkSubmit);
      function chkSubmit() {
          var msg = $('.summernote').val();
          var textmsg = $.trim($(msg).text());
            if (textmsg == '') {
              //alert('nogo');
              $('.error').show();
              $('.error').html('Mohon untuk mengisi detail permasalahan');
              return false;
            }
            else{
              //alert(textmsg);
              $('.error').hide();
              $('.error').html('');
            }
          }
    }); 
    </script>

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

</html><?php /**PATH D:\web\konsultasi\resources\views/faq.blade.php ENDPATH**/ ?>
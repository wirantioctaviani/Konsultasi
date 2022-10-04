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

  <!-- Vendor CSS Files -->
  <link href="<?php echo e(asset('/vesperassets/vendor/aos/aos.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('/vesperassets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('/vesperassets/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('/vesperassets/vendor/boxicons/css/boxicons.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('/vesperassets/vendor/glightbox/css/glightbox.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('/vesperassets/vendor/remixicon/remixicon.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('/vesperassets/vendor/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('/adminlte/plugins/fontawesome-free/css/all.min.css')); ?>">

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
        .input-icons i {
            position: absolute;
        }
          
        .input-icons {
            width: 100%;
            margin-bottom: 10px;
        }
          
        .icon {
            padding: 10px;
            min-width: 40px;
        }
          
        .input-field {
            width: 100%;
            padding: 10px;
            text-align: center;
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
        <h1><a href="<?php echo e(action('App\Http\Controllers\UsersController@formkonsul')); ?>"><img src="<?php echo e(asset('/vesperassets/img/logopusbin.jpg')); ?>" alt="" class="img-fluid"></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
          <!-- <li><a class="nav-link scrollto " href="#services">FAQ</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li> -->
          <li><a class="getstarted scrollto" href="#faq">FAQ</a></li>
          <li><a class="nav-link scrollto" href="#form">Formulir Konsultasi</a></li>
          <li><a class="nav-link scrollto" href="#services">Layanan</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center ">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Media Layanan Konsultasi <i>Online</i></h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Pusat Pembinaan Jabatan Fungsional Auditor</h2>
          <!-- <div data-aos="fade-up" data-aos-delay="800">
            <a href="#about" class="btn-get-started scrollto"><i class="fas fa-angle-double-down"></i></a>
          </div> -->
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
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <?php if(session('sukses')): ?>
          <div class="alert alert-success" role="alert">
          <?php echo e(session('sukses')); ?>

          </div>
          <?php elseif(session('gagalupload')): ?>
          <div class="alert alert-danger" role="alert">
          <?php echo e(session('gagalupload')); ?>

          </div>
          <?php endif; ?>
        </div>
        <div class="col-md-2"></div>
      </div>

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Tentang Konsultasi <i>Online</i></h2>
        </div>

        <div class="row content">
          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="150">
            <p>
              Aplikasi Konsultasi Online adalah media layanan konsultasi terkait permasalahan ke-JFA-an yang disediakan oleh Pusat Pembinaan Jabatan Fungsional Auditor. Berikut adalah tahapan dalam melakukan konsultasi online :
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> 1. Pastikan untuk melihat pada halaman FAQ terkait pertanyaan yang akan ditanyakan sebelum mengisi formulir konsultasi</li>
              <li><i class="ri-check-double-line"></i> 2. Jika pertanyaan yang ingin ditanyakan tidak terdapat pada FAQ, Penanya mengisi formulir isian konsultasi online secara lengkap pada halaman ini (menyertakan nama, nip, dan unit kerja)</li>
              <li><i class="ri-check-double-line"></i> 3. Disarankan penanya menyampaikan pertanyaan secara lengkap agar langsung mendapat jawaban secara lengkap (terhindar dari waktu menunggu jawaban atas pertanyaan susulan)</li>
              <li><i class="ri-check-double-line"></i> 4. Jawaban akan diberikan dalam waktu maksimal 1x24 jam sejak pertanyaan terkirim dalam waktu hari kerja</li>
              <li><i class="ri-check-double-line"></i> 5. Notifikasi jawaban akan dikirimkan oleh sistem ke email penanya</li>
              <li><i class="ri-check-double-line"></i> 6. Setelah mendapat jawaban yang diinginkan, pastikan untuk klik tombol SELESAI/CLOSED dan memberikan rating terkait konsultasi yang telah diberikan</li>
              <li><i class="ri-check-double-line"></i> 7. Proses konsultasi akan berakhir secara otomatis oleh sistem setelah jawaban terkirim pada penanya dalam waktu 1x24 jam</li>
              <li><i class="ri-check-double-line"></i> 8. Segala bentuk konsultasi pada Pusbin JFA hanya dilakukan secara online melalui aplikasi ini dan tidak dipungut biaya</li>
            </ul>
          </div>
          <br>
          <br>
          <div class="row content">
            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="150">
              <hr>
              <label>Klik tombol di bawah ini untuk <i>download</i> Materi Penerapan JFA</label>
              <br>
              <br>
              <a href="https://drive.google.com/drive/u/0/folders/1kthm4i_QucWlPfCL_lOXc4NzSIcszaoe" class="btn btn-info">Materi Penerapan JFA</a>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->


    <!-- ======= FAQ Section ======= -->
    <section id="faq" class="features">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2><i>Frequently Asked Questions</i></h2>
          <p>Silakan klik layanan yang diinginkan untuk melihat daftar pertanyaan dan jawaban dari layanan terkait atau Anda dapat mengetikkan kata kunci dari pertanyaan yang ingin Anda cari.</p>
          <br>
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <form action="<?php echo e(action('App\Http\Controllers\UsersController@hasilpencarian')); ?>" method="get">                                   
                  <div class="row"> 
                      <div class="col-md-2"></div>                           
                      <div class="col-md-8">
                                <div class="col-rt-3">
                                  <div class="sb-example-1">
                                     <div class="search">
                                        <input type="text" class="searchTerm" placeholder="Apa yang ingin Anda cari?" name="keyword">
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

        <div class="row" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-3 col-md-4">
            <div class="icon-box" style="height: 100px;background-color: white;border: 2px solid #00b4cc;">
              <i class="ri-user-fill" style="color: #ffbb2c;"></i>
              <h3><a href="https://pusbinjfa.bpkp.go.id/faq/1/fasilitasi-pengangkatan">Fasilitasi Pengangkatan</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4">
            <div class="icon-box" style="height: 100px;background-color: white;border: 2px solid #00b4cc;">
              <i class="ri-user-follow-fill" style="color: #e361ff;"></i>
              <h3><a href="https://pusbinjfa.bpkp.go.id/faq/2/sertifikasi-auditor">Sertifikasi Auditor</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4">
            <div class="icon-box" style="height: 100px;background-color: white;border: 2px solid #00b4cc;">
              <i class="ri-draft-fill" style="color: #e80368;"></i>
              <h3><a href="https://pusbinjfa.bpkp.go.id/faq/3/penilaian-angka-kredit">Penilaian Angka Kredit</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4">
            <div class="icon-box" style="height: 100px;background-color: white;border: 2px solid #00b4cc;">
              <i class="ri-computer-line" style="color: #5578ff;"></i>
              <h3><a href="<?php echo e(action('App\Http\Controllers\UsersController@detailfaq', ['layanan_id' => 5, 'id_kategori' => 1, 'id_subkategori' => 1])); ?>">Aplikasi SIBIJAK</a></h3>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End FAQ Section -->


    <!-- ======= Form Section ======= -->
    <section id="form" class="form section-bg">
      <div class="container" >

        <div class="section-title" data-aos="fade-up">
          <h2>Formulir Konsultasi <i>Online</i></h2>
        </div>

        <div class="row">

          <div class="col-lg-1 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="contact-about">
          <!--    <h3>Vesperr</h3>
              <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
              <div class="social-links">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div> -->
            </div>
          </div>


          <div class="col-lg-10 col-md-12" data-aos="fade-up" data-aos-delay="300" style="border: 2px solid #00b4cc;background-color: #f7fbfe;">
            <form class="needs-validation form-prevent"  action="<?php echo e(action('App\Http\Controllers\UsersController@create_konsul')); ?>" role="form" name="form" method="POST" enctype="multipart/form-data" novalidate>
              <?php echo csrf_field(); ?>
                <br>
                <div class="create-post-wrapper">
                    <div class="form-group">
                        <div class="row" style="margin-bottom: 10px;">
                            <!-- <div class="col-md-1"></div> -->
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label style="color:black;">Nama Penanya*</label>
                                </div>
                            </div>
                            <div class="col-md-1" style="color:black;">:</div>
                            <div class="col-md-7"><input name="nama" type="text" class="form-control post-input" placeholder="Tuliskan nama" required></div>
                            <!-- <div class="col-md-1"></div> -->
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="row" style="margin-bottom: 10px;">
                          <!-- <div class="col-md-1"></div> -->
                          <div class="col-md-4">
                              <div class="form-group">
                                <label style="color:black;">Jabatan*</label>
                              </div>
                          </div>
                          <div class="col-md-1" style="color:black;">:</div>
                          <div class="col-md-7"><input name="jabatan" type="text" class="form-control post-input" id="exampleInputnama" placeholder="Tuliskan jabatan" required></div>
                          <!-- <div class="col-md-1"></div> -->
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="row" style="margin-bottom: 10px;">
                          <!-- <div class="col-md-1"></div> -->
                          <div class="col-md-4">
                              <div class="form-group">
                                <label style="color:black;">Unit Kerja*</label>
                              </div>
                          </div>
                          <div class="col-md-1" style="color:black;">:</div>
                          <div class="col-md-7"><input name="unit_kerja" type="text" class="form-control post-input" id="exampleInputnama" placeholder="Tuliskan unit kerja" required></div>
                          <!-- <div class="col-md-1"></div> -->
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="row" style="margin-bottom: 10px;">
                          <!-- <div class="col-md-1"></div> -->
                          <div class="col-md-4">
                              <div class="form-group">
                                <label style="color:black;">Nomor HP (WhatsApp)*</label>
                              </div>
                          </div>
                          <div class="col-md-1" style="color:black;">:</div>
                          <div class="col-md-7"><input name="no_hp" type="text" class="form-control post-input" id="exampleInputnama" placeholder="Tuliskan nomor hp" required></div>
                          <!-- <div class="col-md-1"></div> -->
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="row" style="margin-bottom: 10px;">
                          <!-- <div class="col-md-1"></div> -->
                          <div class="col-md-4">
                              <div class="form-group">
                                <label style="color:black;">Email*</label>
                              </div>
                          </div>
                          <div class="col-md-1" style="color:black;">:</div>
                          <div class="col-md-7"><input name="email" id="email" type="email" class="form-control post-input email2" placeholder="Tuliskan email" required>
                            <span class="error2" style="color: #a80000;font-weight: bold;"></span>
                            <span class="error3" style="color: #a80000;font-weight: bold;"></span>
                          </div>
                          <!-- <div class="col-md-1"></div> -->
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="row" style="margin-bottom: 10px;">
                          <!-- <div class="col-md-1"></div> -->
                          <div class="col-md-4">
                              <div class="form-group">
                                <label style="color:black;">Jenis Layanan Konsultasi*</label>
                              </div>
                          </div>
                          <div class="col-md-1" style="color:black;">:</div>
                          <div class="col-md-7"><select class="form-control post-input" name="layanan_id" required>
                                <option value="option_select" disabled selected>Pilih Layanan</option>
                                <?php $__currentLoopData = $data_layanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_layanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data_layanan->id); ?>"><?php echo e($data_layanan->jenis_layanan); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select></div>
                          <!-- <div class="col-md-1"></div> -->
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="row" style="margin-bottom: 10px;">
                          <!-- <div class="col-md-1"></div> -->
                          <div class="col-md-4">
                              <div class="form-group">
                                <label style="color:black;">Judul Permasalahan*</label>
                              </div>
                          </div>
                          <div class="col-md-1" style="color:black;">:</div>
                          <div class="col-md-7">
                            <!-- <input name="judul" type="text" class="form-control" id="exampleInputnama" placeholder="Tuliskan judul" required> -->
                            <input name="judul" type="text" class="form-control post-input" id="exampleInputEmail1" placeholder="Tuliskan Judul" required>
                          </div>
                          <!-- <div class="col-md-1"></div> -->
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="row" style="margin-bottom: 10px;">
                          <!-- <div class="col-md-1"></div> -->
                          <div class="col-md-4">
                              <div class="form-group">
                                <label style="color:black;">Detail Permasalahan*</label>
                              </div>
                          </div>
                          <div class="col-md-1" style="color:black;">:</div>
                          <div class="col-md-7">
                            <!-- <textarea name="details" class="tinymce" id="details"></textarea> -->
                              <!-- <span class="error" style="color: #a80000;font-weight: bold;"></span></div> -->
                          <!-- <div class="col-md-1"></div> -->
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="row" style="margin-bottom: 10px;">
                          <!-- <div class="col-md-1"></div> -->
                          <div class="col-md-12">
                              <textarea name="details" class="form-control post-input summernote" id="summernote"></textarea>
                              <span class="error" style="color: #a80000;font-weight: bold;"></span>
                          <!-- <div class="col-md-1"></div> -->
                          </div>
                    </div>
                  </div>  
                </div>
              <div class="form-group">
                  <div class="row" style="margin-bottom: 10px;">
                      <!-- <div class="col-md-1"></div> -->
                      <div class="col-md-4">
                          <div class="form-group">
                            <label style="color:black;">Lampiran Dokumen (Opsional)</label>
                            <!-- <label style="color:black;font-size: 11px;">Dokumen yang dilampirkan dapat lebih dari 1 file</label> -->
                          </div>
                      </div>
                      <div class="col-md-1" style="color:black;">:</div>
                      <div class="col-md-7"><input type="file" name="dokumen" class="form-control" id="dokumen" accept="application/pdf">
                        <label style="color:black;font-size: 12px;"><b>*File dalam format PDF</b></label></div>
                      <!-- <div class="col-md-1"></div> -->
                  </div>
              </div>
              <!-- <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div> -->
              <!-- <div class="text-center"><button type="submit">Send Message</button></div> -->
              <hr>
              <div class="text-center">
                  <button class="btn btn-info btn-lg button-prevent" type="submit" id="submitButton">
                      <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                      <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Submit </div>
                      <div class="hide-text">Submit</div>
                  </button>
              </div>
              <br>
            </form>
          </div>

          <div class="col-lg-1 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="contact-about">
        <!--          <h3>Vesperr</h3>
              <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
              <div class="social-links">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div> -->
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

    <!-- ======= Layanan Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Jenis Layanan Konsultasi</h2>
          <p>Berikut adalah beberapa jenis layanan terkait JFA pada Aplikasi Konsultasi <i>Online</i></p>
        </div>

        <div class="row">
            <?php $__currentLoopData = $data_konsul_online; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_konsul_online): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-3 align-items-stretch " >
                <div class="icon-box text-center" data-aos="fade-up" data-aos-delay="100" style="margin-bottom:20px;height: 180px;">
                  <h4 class="title" style="font-size:12px"><a href=""><?php echo e($data_konsul_online->jenis_layanan); ?></a></h4>
                  <span data-purecounter-start="0" data-purecounter-end="<?php echo e($data_konsul_online->jumlah); ?>" data-purecounter-duration="1" style="font-size: 35px;" class="purecounter"></span>
                  <div class="row">
                    <?php $__currentLoopData = $open; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opens): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($opens->layanan_id == $data_konsul_online->layanan_id): ?>
                        <div class="col col-md-4">
                          <span data-purecounter-start="0" data-purecounter-end="<?php echo e($opens->jumlahopen); ?>" data-purecounter-duration="1" style="font-size: 14px;color: red;" class="purecounter"></span>
                          <h4 class="title" style="font-size:10px;color: red";><i>Open </i></h4>
                        </div>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $proses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prosess): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($prosess->layanan_id == $data_konsul_online->layanan_id): ?>
                        <div class="col col-md-4">
                          <span data-purecounter-start="0" data-purecounter-end="<?php echo e($prosess->jumlahproses); ?>" data-purecounter-duration="1" style="font-size: 14px;color: #fcba03;" class="purecounter"></span>
                          <h4 class="title" style="font-size:10px;color: #fcba03";>Proses</h4>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $closed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $close): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($close->layanan_id == $data_konsul_online->layanan_id): ?>
                        <div class="col col-md-4">
                          <span data-purecounter-start="0" data-purecounter-end="<?php echo e($close->jumlahclosed); ?>" data-purecounter-duration="1" style="font-size: 14px;color:green;" class="purecounter"></span>
                          <h4 class="title" style="font-size:10px;color:green;"><i>Closed</i></h4>
                        </div>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

      </div>
    </section><!-- End Services Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; <i>Copyright</i> <strong>Pusbin JFA 2022</strong>.<i> Developed by </i><b>Sibijak DevTeam</b>.
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
            <a href="#intro" class="scrollto">Beranda</a>
            <a href="#about" class="scrollto">Tentang</a>
            <a href="#faq" class="scrollto">FAQ</a>
            <a href="#form">Formulir</a>
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

<!--   <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/tinymce.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/jquery.tinymce.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/vbwit9dpespn4ppnyghi8a2obi5fgx5tzbd3l9smgjbcq6vh/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
   -->

<!--   <script>
    tinymce.init({
      selector: "textarea.tiny",
      menubar: false,
      readonly : 0,
      plugins: [
      "advlist autolink lists link image charmap print preview anchor",
      "searchreplace visualblocks code fullscreen",
      "insertdatetime media table paste",
      "autoresize"
      ],

      image_title: true,
      automatic_uploads: true,
      file_picker_types: 'image',

      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",

      file_picker_callback: function (cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');


        input.onchange = function () {
          var file = this.files[0];

          var reader = new FileReader();
          reader.onload = function () {

            var id = 'blobid' + (new Date()).getTime();
            var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
            var base64 = reader.result.split(',')[1];
            var blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);

            cb(blobInfo.blobUri(), { title: file.name });
          };
          reader.readAsDataURL(file);
        };

        input.click();
      }
    });

    $.extend(M.Modal.prototype, {
      _handleFocus(e) {
        if (!this.el.contains(e.target) && this._nthModalOpened === M.Modal._modalsOpen && document.defaultView.getComputedStyle(e.target, null).zIndex < 1002) {
          this.el.focus();
        }
      }
    });
  </script>

  <script>
    $(function () {  
    $('.error').hide();
      tinymce.init({
          selector: ".tinymce",
          menubar: false,
          statusbar: false,
      //////////////////this was added to make the "required" attribute work///////////////////
          setup: function (editor) {
              editor.on('change', function () {
                  tinymce.triggerSave();
          chkSubmit();
              });
          }
      //////////////////this was added to make the "required" attribute work///////////////////    
      });

    $(document).on('click', '#submitButton', chkSubmit);
      function chkSubmit() {
          var msg = $('.tinymce').val();
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
  </script> -->

<!--   <script>
    $(function () { 
      $('.error2').hide();
      $('.error3').hide();
        $(document).on('click', '#submitButton', ValidateEmail);
        function ValidateEmail() 
        {
          var textmsg = $('.email2').val();
          if (textmsg == '') {
              $('.error2').show();
              $('.error2').html('Mohon untuk mengisi email');
              return false;
          }
            else
            {
                const email = document.querySelector('.email'),
                inputEmail = document.querySelector('#email'),
                formatEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                if (inputEmail.value.match(formatEmail)) {
                $('.error2').hide();
                $('.error2').html('');
                $('.error3').hide();
                $('.error3').html('');
              } else 
              {
                $('.error2').hide();
                $('.error3').show();
                      $('.error3').html('Mohon mengisi format email dengan benar');
                      return false;
              }
            }
        }
    }); 
  </script> -->

  <script>
      let postBtn = document.querySelector('.button-prevent');
      let wrapper = document.querySelector('.create-post-wrapper');
      let inputs = [...wrapper.querySelectorAll('.post-input')];

        function validate() {
        let isIncomplete = inputs.some(input => !input.value);
        postBtn.disabled = isIncomplete;
        postBtn.style.cursor = isIncomplete ? 'not-allowed' : 'pointer';
      }
      wrapper.addEventListener('input', validate);
        validate();
  </script>

  <script>
    $(function () { 
      // $('.error2').hide();
      $('.error3').hide();
        $(document).on('click', '#submitButton', ValidateEmail);
        function ValidateEmail() 
        {
            const email = document.querySelector('.email'),
                inputEmail = document.querySelector('#email'),
                formatEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                if (inputEmail.value.match(formatEmail)) {
                // $('.error2').hide();
                // $('.error2').html('');
                $('.error3').hide();
                $('.error3').html('');
              } else 
              {
                // $('.error2').hide();
                $('.error3').show();
                      $('.error3').html('Mohon untuk mengisi format email dengan benar');
                      return false;
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

</html><?php /**PATH D:\web\konsultasi\resources\views/homepage/homepage.blade.php ENDPATH**/ ?>
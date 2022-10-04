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
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/vesperassets/css/timeline.css')); ?>" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
  <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>

  <!-- =======================================================
  * Template Name: Vesperr - v4.7.0
  * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">


    <style type="text/css">
            /* untuk menghilangkan spinner  */
            .spinner {
                display: none;
            }

        .star-rating__stars {
            position: relative;
            height: 5rem;
            width: 25rem;
            background: url(<?php echo e(asset('assets/off.svg')); ?>);
        background-size: 5rem 5rem;
        }

        .star-rating__label {
            position: absolute;
            height: 100%;
            background-size: 5rem 5rem;
        }

        .star-rating__input {
            margin: 0;
            position: absolute;
            height: 1px;
            width: 1px;
            overflow: hidden;
            clip: rect(1px, 1px, 1px, 1px);
        }

        .star-rating__stars .star-rating__label:nth-of-type(1) {
            z-index: 5;
            width: 20%;
        }

        .star-rating__stars .star-rating__label:nth-of-type(2) {
            z-index: 4;
            width: 40%;
        }

        .star-rating__stars .star-rating__label:nth-of-type(3) {
            z-index: 3;
            width: 60%;
        }

        .star-rating__stars .star-rating__label:nth-of-type(4) {
            z-index: 2;
            width: 80%;
        }

        .star-rating__stars .star-rating__label:nth-of-type(5) {
            z-index: 1;
            width: 100%;
        }

        .star-rating__input:checked+.star-rating__label,
        .star-rating__input:focus+.star-rating__label,
        .star-rating__label:hover {background-image: url(<?php echo e(asset('assets/on.svg')); ?>);}

        .star-rating__label:hover~.star-rating__label {background-image: url(<?php echo e(asset('assets/off.svg')); ?>);}

        .star-rating__input:focus~.star-rating__focus {
            position: absolute;
            top: -.25em;
            right: -.25em;
            bottom: -.25em;
            left: -.25em;
            outline: 0.25rem solid lightblue;
        }
    </style>
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
          <!-- <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Layanan</a></li>
          <li><a class="nav-link scrollto" href="#form">Formulir Konsultasi</a></li> -->
          <li><a class="getstarted scrollto" href="<?php echo e(action('App\Http\Controllers\UsersController@formkonsul')); ?>">Formulir Konsultasi Online</a></li>
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

    <!-- ======= Form Section ======= -->
    <section id="form" class="form section-bg">
      <div class="container" >

        <div class="section-title" data-aos="fade-up">
          <h2>Halaman <i>Detail</i> Konsultasi</h2>
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
                <br>
              <?php $__currentLoopData = $data_konsul_online; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_konsul_online): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="create-post-wrapper">
                    <div class="form-group">
                        <div class="row" style="margin-bottom: 10px;">
                            <!-- <div class="col-md-1"></div> -->
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label style="color:black;">No Tiket</label>
                                </div>
                            </div>
                            <div class="col-md-1" style="color:black;">:</div>
                            <div class="col-md-7"><input name="no_tiket" type="text" class="form-control post-input" value="<?php echo e($data_konsul_online->no_tiket); ?>" disabled></div>
                            <!-- <div class="col-md-1"></div> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row" style="margin-bottom: 10px;">
                            <!-- <div class="col-md-1"></div> -->
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label style="color:black;">Nama Penanya</label>
                                </div>
                            </div>
                            <div class="col-md-1" style="color:black;">:</div>
                            <div class="col-md-7"><input name="nama" type="text" class="form-control post-input" value="<?php echo e($data_konsul_online->nama); ?>" disabled></div>
                            <!-- <div class="col-md-1"></div> -->
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="row" style="margin-bottom: 10px;">
                          <!-- <div class="col-md-1"></div> -->
                          <div class="col-md-4">
                              <div class="form-group">
                                <label style="color:black;">Unit Kerja</label>
                              </div>
                          </div>
                          <div class="col-md-1" style="color:black;">:</div>
                          <div class="col-md-7"><input name="jabatan" type="text" class="form-control post-input" id="exampleInputnama" value="<?php echo e($data_konsul_online->unit_kerja); ?>" disabled></div>
                          <!-- <div class="col-md-1"></div> -->
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="row" style="margin-bottom: 10px;">
                          <!-- <div class="col-md-1"></div> -->
                          <div class="col-md-4">
                              <div class="form-group">
                                <label style="color:black;">Jabatan</label>
                              </div>
                          </div>
                          <div class="col-md-1" style="color:black;">:</div>
                          <div class="col-md-7"><input name="unit_kerja" type="text" class="form-control post-input" id="exampleInputnama" value="<?php echo e($data_konsul_online->jabatan); ?>" disabled></div>
                          <!-- <div class="col-md-1"></div> -->
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="row" style="margin-bottom: 10px;">
                          <!-- <div class="col-md-1"></div> -->
                          <div class="col-md-4">
                              <div class="form-group">
                                <label style="color:black;">Jenis Layanan</label>
                              </div>
                          </div>
                          <div class="col-md-1" style="color:black;">:</div>
                          <div class="col-md-7"><input name="no_hp" type="text" class="form-control post-input" id="exampleInputnama" value="<?php echo e($data_konsul_online->jenis_layanan); ?>" disabled></div>
                          <!-- <div class="col-md-1"></div> -->
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="row" style="margin-bottom: 10px;">
                          <!-- <div class="col-md-1"></div> -->
                          <div class="col-md-4">
                              <div class="form-group">
                                <label style="color:black;">Judul Konsultasi</label>
                              </div>
                          </div>
                          <div class="col-md-1" style="color:black;">:</div>
                          <div class="col-md-7">
                            <!-- <input name="judul" type="text" class="form-control" id="exampleInputnama" placeholder="Tuliskan judul" required> -->
                            <input name="judul" type="text" class="form-control post-input" id="exampleInputEmail1" value="<?php echo e($data_konsul_online->judul); ?>" disabled>
                          </div>
                          <!-- <div class="col-md-1"></div> -->
                      </div>
                  </div> 
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <hr>
              <br>

                  <div class="container">
                     <ul class="timeline">
                        <?php $__currentLoopData = $data_konsul_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_konsul_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li>
                             <!-- begin timeline-time -->
                             <div class="timeline-time">
                                <span class="date"><?php echo e(date("d M Y", strtotime($data_konsul_detail->created_at))); ?></span>
                                <span class="time"><?php echo e(date("H:i", strtotime($data_konsul_detail->created_at))); ?></span>
                             </div>
                             <!-- end timeline-time -->
                             <!-- begin timeline-icon -->
                             <div class="timeline-icon">
                                <a href="javascript:;">&nbsp;</a>
                             </div>
                             <!-- end timeline-icon -->
                             <!-- begin timeline-body -->
                             <div class="timeline-body">
                                <div class="timeline-header">
                                   <span class="userimage"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""></span>
                                   <span class="username"><a href="javascript:;"><?php echo e($data_konsul_detail->created_by); ?></a> <small></small></span>
                                </div>
                                <div class="timeline-content" style="font-size:15px">
                                    <?php echo $data_konsul_detail->details; ?>

                                </div>
                                <?php if($data_konsul_detail->dokumen != null): ?>
                                  <div class="timeline-footer">
                                     <label class="">Dokumen Pendukung    : </label>
                                      <a href="<?php echo e(url('/').'/dokumen/'.$data_konsul_detail->dokumen); ?>" style="color:skyblue;" target="_blank"><?php echo e($data_konsul_detail->dokumen); ?></a>
                                  </div>
                                <?php endif; ?>
                             </div>
                             <!-- end timeline-body -->
                          </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </ul>
                  </div>

              <br>
              <hr>

              <?php if($data_konsul_online->status_id == '1' || $data_konsul_online->status_id == '0'): ?>
                  <div class="row">
                    <div class="text-center">
                          <label style="color: black;">Terima kasih telah menggunakan layanan konsultasi online Pusbin JFA.</label>
                          <br>
                          <label style="color: black;">Pertanyaan Anda telah terkirim dan sedang dalam proses antrian.</label>
                          <br>
                          <label style="color: black;">Silakan klik tombol di bawah ini untuk memberikan respon atau mengirimkan pertanyaan kembali.</label>
                          <br/>
                          <br>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                      <div class="container-fluid">                        
                        <div class="accordion" id="accordionExample">
                          <div class="card">
                            <div class="card-header" id="headingThree">
                              <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  <h5><i class="fas fa-plus"></i> Kirim Pertanyaan </h5>
                                </button>
                              </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                              <div class="card-body">
                                <form class="form-prevent" action="<?php echo e(action('App\Http\Controllers\UsersController@ask_konsulonline', [$data_konsul_detail->id_konsul])); ?>" method="post" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id_konsul" value="<?php echo e($data_konsul_detail->id_konsul); ?>" class="form-control">
                                        <input type="hidden" name="no_tiket" value="<?php echo e($data_konsul_online->no_tiket); ?>" class="form-control">
                                        <input type="hidden" name="pic_id" value="<?php echo e($data_konsul_online->pic_id); ?>" class="form-control">
                                        <input type="hidden" name="koor_id" value="<?php echo e($data_konsul_online->koor_id); ?>" class="form-control">
                                        <input type="hidden" name="nama" value="<?php echo e($data_konsul_online->nama); ?>" class="form-control">
                                        <div class="form-group">
                                            <label for="">Detail</label>
                                            <textarea id="summernote" name="details" cols="30" rows="10" class="form-control"required></textarea>
                                            <label for="exampleInputEmail1" class="form-label" style="color: red;"><b>Mohon untuk mengisi detail pertanyaan</b></label>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                        <label for="exampleInputFile">Dokumen Pendukung</label>
                                        <input type="file" name="dokumen" class="form-control" id="dokumen" accept="application/pdf">
                                        <label for="exampleInputEmail1" class="form-label" style="color: red;"><b>*File dalam format PDF</b></label>
                                                          </div>
                                        <!-- <button type="submit" class="btn btn-primary btn-sm">Submit</button> -->
                                        <br>
                                        <div class="form-group text-center">
                                          <button class="btn btn-lg btn-info button-prevent" type="submit">
                                              <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                              <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Kirim </div>
                                              <div class="hide-text">Kirim</div>
                                          </button>
                                        </div>
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
              <?php elseif($data_konsul_online->status_id == '2'): ?>
                <div class="panel-body">
                    <div class="col text-center">
                        <label style="color: black;">Terima kasih telah menggunakan layanan konsultasi online Pusbin JFA. </label>
                        <br/>
                        <label style="color: black;">Konsultasi Anda sedang dalam proses. Mohon menunggu respon dari PIC kami.</label>
                        <br/>
                    </div>
                </div>
              <?php elseif($data_konsul_online->status_id == '3'): ?>
                <div class="panel-body">
                    <div class="col text-center">
                                        <!-- <button type="submit" onclick="return confirm('Close Konsultasi?')" class="btn btn-primary btn-lg" >Close Case</button> -->
                                        <label style="color: black;">Terima kasih telah menggunakan layanan konsultasi online Pusbin JFA.</label>
                                        <br>
                                        <label style="color: black;">Apabila layanan konsultasi sudah <b>selesai</b>, mohon untuk memberikan <b>penilaian dan ulasan</b> dengan klik tombol di bawah ini.</label>
                                        <br>
                                        <label style="color: red;">Sistem akan melakukan close tiket secara otomatis dalam waktu 60 menit.</label>
                                        <br/>
                                        <br/>
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal-ratting">Beri Penilaian</button>
                                        <br>
                                        <br>
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
                                  <h5><i class="fas fa-plus"></i> Kirim Pertanyaan </h5>
                                </button>
                              </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                              <div class="card-body">
                                <form class="form-prevent" action="<?php echo e(action('App\Http\Controllers\UsersController@reply_konsulonline', [$data_konsul_detail->id_konsul])); ?>" method="post" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id_konsul" value="<?php echo e($data_konsul_detail->id_konsul); ?>" class="form-control">
                                        <input type="hidden" name="no_tiket" value="<?php echo e($data_konsul_online->no_tiket); ?>" class="form-control">
                                        <input type="hidden" name="pic_id" value="<?php echo e($data_konsul_online->pic_id); ?>" class="form-control">
                                        <input type="hidden" name="koor_id" value="<?php echo e($data_konsul_online->koor_id); ?>" class="form-control">
                                        <input type="hidden" name="nama" value="<?php echo e($data_konsul_online->nama); ?>" class="form-control">
                                        <div class="form-group">
                                            <label for="">Detail</label>
                                            <textarea id="summernote" name="details" cols="30" rows="10" class="form-control"required></textarea>
                                            <label for="exampleInputEmail1" class="form-label" style="color: red;"><b>Mohon untuk mengisi detail pertanyaan</b></label>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                        <label for="exampleInputFile">Dokumen Pendukung</label>
                                        <input type="file" name="dokumen" class="form-control" id="dokumen" accept="application/pdf">
                                        <label for="exampleInputEmail1" class="form-label" style="color: red;"><b>*File dalam format PDF</b></label>
                                                          </div>
                                        <!-- <button type="submit" class="btn btn-primary btn-sm">Submit</button> -->
                                        <br>
                                        <div class="form-group text-center">
                                            <button class="btn btn-lg btn-info button-prevent" type="submit">
                                                <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                                <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Submit </div>
                                                <div class="hide-text">Submit</div>
                                            </button>
                                      </div>
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
              <?php elseif($data_konsul_online->status_id == '4'): ?>
                <div class="panel-body">
                    <div class="col text-center">
                                        <!-- <button type="submit" onclick="return confirm('Close Konsultasi?')" class="btn btn-primary btn-lg" >Close Case</button> -->
                                        <label style="color: black;">Tiket ini sudah <i>closed.</i></label>
                                        <br>
                                        <?php if($rating->isEmpty()): ?>
                                        <label style="color: black;">Terima kasih telah menggunakan layanan konsultasi online Pusbin JFA. </label>
                                        <br/>
                                        <label style="color: black;">Mohon untuk memberikan penilaian dan ulasan dengan klik tombol di bawah ini.</label>
                                        <br/>
                                        <br/>
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal-ratting">Beri Penilaian</button>
                                        <?php else: ?>
                                        <label style="color: black;">Terima kasih telah menggunakan layanan konsultasi online Pusbin JFA.</label>
                                        <?php endif; ?>

                                        <br>
                                        <br>
                    </div>
                </div>
              <?php endif; ?>


              <br>
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
  </main><!-- End #main -->

              <div class="modal fade" id="modal-ratting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form class="form-prevent" action="<?php echo e(action('App\Http\Controllers\UsersController@store_rating', [$data_konsul_detail->id_konsul])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Beri Penilaian dan Ulasan Konsultasi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id_konsul" value="<?php echo e($data_konsul_detail->id_konsul); ?>">
                                <input type="hidden" name="no_tiket" value="<?php echo e($data_konsul_online->no_tiket); ?>">

                                <fieldset class="star-rating">
                                    <div class="star-rating__stars">
                                        <input class="star-rating__input" type="radio" name="ratting" value="1" id="rating-1" />
                                        <label class="star-rating__label" for="rating-1" aria-label="One"></label>

                                        <input class="star-rating__input" type="radio" name="ratting" value="2" id="rating-2" />
                                        <label class="star-rating__label" for="rating-2" aria-label="Two"></label>

                                        <input class="star-rating__input" type="radio" name="ratting" value="3" id="rating-3" />
                                        <label class="star-rating__label" for="rating-3" aria-label="Three"></label>

                                        <input class="star-rating__input" type="radio" name="ratting" value="4" id="rating-4" />
                                        <label class="star-rating__label" for="rating-4" aria-label="Four"></label>

                                        <input class="star-rating__input" type="radio" name="ratting" value="5" id="rating-5" />
                                        <label class="star-rating__label" for="rating-5" aria-label="Five"></label>
                                        <div class="star-rating__focus"></div>
                                    </div>
                                </fieldset>
                                <div class="form-group">
                                  <br>
                                      <textarea  name="ulasan" rows="5" placeholder="Tuliskan ulasan anda terkait layanan konsultasi online Pusbin JFA" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Close</button>
                                <button class="btn btn-lg btn-info button-prevent" type="submit">
                                            <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                            <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Submit </div>
                                            <div class="hide-text">Submit</div>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
              </div>

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
            <a class="getstarted scrollto" href="http://pusbinjfa.bpkp.go.id">Website Pusbin JFA</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- jQuery -->
  <!-- <script src="<?php echo e(asset('/adminlte/plugins/jquery/jquery.min.js')); ?>"></script> -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="<?php echo e(asset('/vesperassets/vendor/purecounter/purecounter.js')); ?>"></script>
  <script src="<?php echo e(asset('/vesperassets/vendor/aos/aos.js')); ?>"></script>
  <!-- <script src="<?php echo e(asset('/vesperassets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script> -->
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
          placeholder: 'Tuliskan detail pertanyaan',
          tabsize: 2,
          height: 120,
          toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']]
          ]
        });
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

</body>

</html><?php /**PATH D:\web\konsultasi\resources\views/users/detailkonsultasi.blade.php ENDPATH**/ ?>
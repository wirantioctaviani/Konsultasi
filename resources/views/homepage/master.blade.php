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

  <!-- Vendor CSS Files -->
  <link href="{{asset('/vesperassets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('/vesperassets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('/vesperassets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('/vesperassets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('/vesperassets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('/vesperassets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('/vesperassets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/adminlte/plugins/fontawesome-free/css/all.min.css')}}">

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

        @if(Session('Berrhasil'))
        <script>
            swal(`Pertanyaan Berhasil Terkirim`, "Terima Kasih. Pertanyaan Anda telah terkirim. Mohon cek email Anda secara berkala untuk melihat jawaban konsultasi.", "success");
        </script>
        @endif

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.html"><img src="{{asset('/vesperassets/img/logopusbin.jpg')}}" alt="" class="img-fluid"></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
          <li><a class="nav-link scrollto" href="#services">Layanan</a></li>
          <!-- <li><a class="nav-link scrollto " href="#services">FAQ</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li> -->
          <li><a class="getstarted scrollto" href="#faq">FAQ</a></li>
          <li><a class="nav-link scrollto" href="#form">Formulir Konsultasi</a></li>
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
          <img src="{{asset('/vesperassets/img/hero-img.png')}}" class="img-fluid animated" alt="">
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
          @if(session('sukses'))
          <div class="alert alert-success" role="alert">
          {{session('sukses')}}
          </div>
          @endif
        </div>
        <div class="col-md-2"></div>
      </div>


      @yield('content')


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
            <a href="#intro" class="scrollto">Beranda</a>
            <a href="#about" class="scrollto">Tentang</a>
            <a href="#services">Layanan</a>
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

</html>
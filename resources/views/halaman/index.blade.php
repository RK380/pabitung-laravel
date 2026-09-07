<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Layanan Internal | Pengadilan Agama Bitung</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/pa.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/footer.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="/" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/ma.png" alt="">
        <img src="assets/img/pa.png" alt="">
        <h1 class="sitename">PA Bitung</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/monperkara">Monitoring Perkara</a></li>
          <li><a href="/monipendis">Monitoring Pendistribusian Berkas</a></li>
          <li><a href="/monpihakmed">Monitoring Pihak Mediasi</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      @guest
          <a class="btn-getstarted flex-md-shrink-0"
            href="{{ route('login') }}">
              Login
          </a>
      @endguest

      @auth
          <div class="d-flex align-items-center gap-2">
              <span style="font-size:14px;margin-left:20px;color: #056e4f;">
                  {{ auth()->user()->name }}
                  ({{ auth()->user()->role_label }})
              </span>
              <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit"
                          class="btn-getstarted border-0">
                      Logout
                  </button>
              </form>
          </div>
      @endauth

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->

    <!-- Services Section -->
    <section id="services" class="services section" style="margin-top: 100px;">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item item-red position-relative">
              <i class="bi bi-activity icon"></i>
              <h3>KETUA PENGADILAN/KETUA MAJELIS</h3>
              <a href="/hakim" class="read-more stretched-link"><span></span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item item-red position-relative">
              <i class="bi bi-person-plus icon"></i>
              <h3>MAJELIS HAKIM/HAKIM TUNGGAL</h3>
              <a href="/hakim2" class="read-more stretched-link"><span></span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item item-cyan position-relative">
              <i class="bi bi-broadcast icon"></i>
              <h3>PANITERA</h3>
              <a href="/panitera" class="read-more stretched-link"><span></span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item item-teal position-relative">
              <i class="bi bi-easel icon"></i>
              <h3>PENDISTRIBUSIAN BERKAS PERKARA</h3>
              <a href="/pendistribusian" class="read-more stretched-link"><span></span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item item-orange position-relative">
              <i class="bi bi-bounding-box-circles icon"></i>
              <h3>OPERATOR</h3>
              <a href="/operator" class="read-more stretched-link"><span></span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item item-teal position-relative">
                <i class="bi bi-chat-square-text icon"></i>
                <h3>DAFTAR HADIR MEDIASI</h3>
                <a href="#" class="read-more stretched-link" data-bs-toggle="modal" data-bs-target="#barcodeModal">
                <span>Lihat Barcode</span> <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            </div>
            <div class="modal fade" id="barcodeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Barcode Daftar Hadir</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="assets/img/brcnew.jpeg" alt="Barcode Daftar Hadir" class="img-fluid">
                </div>
                </div>
            </div>
          </div>

        </div>
      </div>
    </section><!-- /Services Section -->

  </main>

  <footer id="footer" class="footer-modern">

    <div class="footer-overlay"></div>

    <div class="container footer-container">

        <div class="row g-4">

            <!-- KOLOM 1 -->
            <div class="col-lg-4 col-md-6">

                <div class="footer-brand">

                    <div class="footer-logo">
                        <img src="/assets/img/ma.png" alt="Mahkamah Agung">
                        <img src="/assets/img/pa.png" alt="PA Bitung">
                    </div>

                    <h3>Mahkamah Agung Republik Indonesia</h3>

                    <div class="footer-divider"></div>

                    <h5>Pengadilan Agama Bitung</h5>
                    <p class="footer-subtitle">
                        Pelayanan Internal
                    </p>

                </div>

                <div class="visitor-modern">

                    <div class="visitor-title">

                        <i class="bi bi-bar-chart-fill"></i>

                        <span>Total Pengunjung</span>

                    </div>


                    <div class="visitor-grid">

                        <div class="visitor-item today">

                            <span>Hari Ini</span>

                            <strong>{{ $today }}</strong>

                        </div>


                        <div class="visitor-item">

                            <span>Minggu Ini</span>

                            <strong>{{ $thisWeek }}</strong>

                        </div>


                        <div class="visitor-item">

                            <span>Bulan Ini</span>

                            <strong>{{ $thisMonth }}</strong>

                        </div>


                        <div class="visitor-item">

                            <span>Tahun Ini</span>

                            <strong>{{ $thisYear }}</strong>

                        </div>


                        <div class="visitor-item total">

                            <span>Total</span>

                            <strong>{{ $total }}</strong>

                        </div>

                    </div>

                </div>

                <div class="footer-contact-modern">

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="bi bi-telephone-fill"></i>
                        </div>

                        <div>
                            <span>Telepon</span>
                            <strong>(0438) 35566</strong>
                        </div>
                    </div>


                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="bi bi-whatsapp"></i>
                        </div>

                        <div>
                            <span>WhatsApp</span>
                            <strong>0823-9343-8722</strong>
                        </div>
                    </div>


                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="bi bi-envelope-fill"></i>
                        </div>

                        <div>
                            <span>Email</span>
                            <strong>pengadilanagamabitung@yahoo.co.id</strong>
                        </div>
                    </div>

                </div>

            </div>


            <!-- KOLOM 2 -->
            <div class="col-lg-4 col-md-6">

                <div class="footer-section-title">

                    <div class="title-icon">
                        <i class="bi bi-grid-fill"></i>
                    </div>

                    <div>
                        <h4>Unit Kerja</h4>
                        <p>Akses layanan internal</p>
                    </div>

                </div>


                <div class="unit-card">

                    <a href="https://sipp.pa-bitung.go.id/list_jadwal_sidang">

                        <img src="/assets/img/jadwal_sidang.jpeg"
                            alt="Jadwal Sidang">

                        <div class="unit-overlay">
                            <span>
                                <i class="bi bi-calendar-event"></i>
                                Jadwal Sidang
                            </span>
                        </div>

                    </a>

                </div>


                <div class="unit-card">

                    <a href="https://sipp.pa-bitung.go.id/">

                        <img src="/assets/img/sipp.jpeg"
                            alt="SIPP">

                        <div class="unit-overlay">
                            <span>
                                <i class="bi bi-folder2-open"></i>
                                Sistem Informasi Penelusuran Perkara
                            </span>
                        </div>

                    </a>

                </div>


                <div class="unit-card">

                    <a href="https://siwas.mahkamahagung.go.id/">

                        <img src="/assets/img/siwas.jpeg"
                            alt="SIWAS">

                        <div class="unit-overlay">
                            <span>
                                <i class="bi bi-shield-check"></i>
                                SIWAS
                            </span>
                        </div>

                    </a>

                </div>

            </div>


            <!-- KOLOM 3 -->
            <div class="col-lg-4 col-md-12">

                <div class="footer-section-title">

                    <div class="title-icon">
                        <i class="bi bi-share-fill"></i>
                    </div>

                    <div>
                        <h4>Media Sosial</h4>
                        <p>Ikuti informasi terbaru kami</p>
                    </div>

                </div>


                <div class="social-modern">

                    <a href="https://share.google/ll5Qn4DR9ERXaxUPt"
                        class="instagram">

                        <i class="bi bi-instagram"></i>

                    </a>


                    <a href="https://www.youtube.com/results?search_query=pengadilan+agama+bitung"
                        class="youtube">

                        <i class="bi bi-youtube"></i>

                    </a>


                    <a href="https://www.facebook.com/profile.php?id=100066547001608"
                        class="facebook">

                        <i class="bi bi-facebook"></i>

                    </a>

                </div>


                <!-- INSTAGRAM -->
                <div class="instagram-box">

                    <div class="instagram-header">

                        <div>
                            <i class="bi bi-instagram"></i>
                            <span>Instagram PA Bitung</span>
                        </div>

                        <a href="https://www.instagram.com/pa_bitung/"
                            target="_blank">

                            Lihat Profil
                            <i class="bi bi-arrow-up-right"></i>

                        </a>

                    </div>


                    <div class="instagram-content">

                        <blockquote class="instagram-media"
                            data-instgrm-captioned
                            data-instgrm-permalink="https://www.instagram.com/p/DU507d4kktz/?utm_source=ig_embed&amp;utm_campaign=loading"
                            data-instgrm-version="14">

                        </blockquote>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- COPYRIGHT -->

    <div class="footer-bottom">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-6 text-center text-md-start">

                    <p>
                        © 2026
                        <span>Muhammad Rizky</span>
                    </p>

                </div>


                <div class="col-md-6 text-center text-md-end">

                    <p class="footer-institution">

                        <strong>Pengadilan Agama Bitung</strong>

                        <span class="separator">•</span>

                        Mahkamah Agung Republik Indonesia

                    </p>

                </div>

            </div>

        </div>

    </div>

  </footer>
  
  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

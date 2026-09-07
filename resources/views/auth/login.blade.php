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

  <!-- Main CSS -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <!-- Login CSS -->
  <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header class="login-header">

    <div class="container">

        <a href="/"
           class="login-brand">

            <img src="assets/img/ma.png"
                 alt="Mahkamah Agung">

            <img src="assets/img/pa.png"
                 alt="PA Bitung">

            <span>PA Bitung</span>

        </a>

        <div class="login-header-text">

            <i class="bi bi-shield-check"></i>

            Sistem Pelayanan Internal

        </div>

    </div>

  </header>

  <main class="main login-main">

    <section class="login-section">

        <!-- Background Decoration -->
        <div class="login-shape shape-1"></div>
        <div class="login-shape shape-2"></div>
        <div class="login-shape shape-3"></div>

        <div class="container">

            <div class="row justify-content-center align-items-center min-vh-100">

                <div class="col-lg-10 col-xl-9">

                    <div class="login-wrapper">

                        <!-- BAGIAN KIRI -->
                        <div class="login-info">

                            <div class="login-info-content">

                                <div class="institution-logo">

                                    <img src="assets/img/ma.png"
                                        alt="Mahkamah Agung">

                                    <img src="assets/img/pa.png"
                                        alt="Pengadilan Agama Bitung">

                                </div>

                                <span class="welcome-badge">
                                    <i class="bi bi-shield-check"></i>
                                    Sistem Internal
                                </span>

                                <h1>
                                    Pelayanan Internal
                                    <span>PA Bitung</span>
                                </h1>

                                <p>
                                    Sistem pelayanan internal Pengadilan Agama
                                    Bitung untuk mendukung pengelolaan informasi
                                    dan pelayanan secara efektif, cepat dan aman.
                                </p>

                                <div class="login-features">

                                    <div class="feature-item">

                                        <div class="feature-icon">
                                            <i class="bi bi-shield-lock"></i>
                                        </div>

                                        <div>
                                            <h5>Aman & Terpercaya</h5>
                                            <p>Data dan informasi terlindungi dengan baik.</p>
                                        </div>

                                    </div>


                                    <div class="feature-item">

                                        <div class="feature-icon">
                                            <i class="bi bi-lightning-charge"></i>
                                        </div>

                                        <div>
                                            <h5>Cepat & Efisien</h5>
                                            <p>Mempermudah pelayanan internal.</p>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        <!-- BAGIAN KANAN LOGIN -->
                        <div class="login-card-area">

                            <div class="login-card">

                                <div class="login-card-header">

                                    <div class="login-icon">

                                        <i class="bi bi-person-lock"></i>

                                    </div>

                                    <h2>Selamat Datang</h2>

                                    <p>
                                        Silakan masuk menggunakan akun Anda
                                    </p>

                                </div>


                                <!-- ERROR LOGIN -->
                                @if(session('error'))

                                    <div class="alert alert-danger">

                                        <i class="bi bi-exclamation-circle"></i>

                                        {{ session('error') }}

                                    </div>

                                @endif


                                <!-- VALIDATION ERROR -->
                                @if ($errors->any())

                                    <div class="alert alert-danger">

                                        <ul class="mb-0">

                                            @foreach ($errors->all() as $error)

                                                <li>{{ $error }}</li>

                                            @endforeach

                                        </ul>

                                    </div>

                                @endif


                                <form method="POST"
                                    action="{{ route('login.authenticate') }}">

                                    @csrf


                                    <!-- EMAIL -->

                                    <div class="login-form-group">

                                        <label for="email">

                                            Email Address

                                        </label>


                                        <div class="input-group-modern">

                                            <span class="input-icon">

                                                <i class="bi bi-envelope"></i>

                                            </span>


                                            <input
                                                type="email"
                                                name="email"
                                                id="email"
                                                value="{{ old('email') }}"
                                                placeholder="Masukkan email Anda"
                                                required
                                                autofocus
                                            >

                                        </div>

                                    </div>


                                    <!-- PASSWORD -->

                                    <div class="login-form-group">

                                        <label for="password">

                                            Password

                                        </label>


                                        <div class="input-group-modern">

                                            <span class="input-icon">

                                                <i class="bi bi-lock"></i>

                                            </span>


                                            <input
                                                type="password"
                                                name="password"
                                                id="password"
                                                placeholder="Masukkan password"
                                                required
                                            >


                                            <button
                                                type="button"
                                                class="password-toggle"
                                                id="togglePassword">

                                                <i class="bi bi-eye"></i>

                                            </button>

                                        </div>

                                    </div>


                                    <!-- REMEMBER -->

                                    <div class="login-options">

                                        <div class="form-check">

                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="remember"
                                                id="remember"
                                            >

                                            <label
                                                class="form-check-label"
                                                for="remember">

                                                Ingat saya

                                            </label>

                                        </div>

                                    </div>


                                    <!-- BUTTON LOGIN -->

                                    <button
                                        type="submit"
                                        class="login-btn">

                                        <span>

                                            <i class="bi bi-box-arrow-in-right"></i>

                                            Masuk ke Sistem

                                        </span>

                                        <i class="bi bi-arrow-right"></i>

                                    </button>


                                </form>


                                <div class="login-footer">

                                    <p>

                                        <i class="bi bi-shield-check"></i>

                                        Sistem Pelayanan Internal

                                    </p>

                                </div>


                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

  </main>

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
  <!-- <script src="assets/js/main.js"></script> -->
  <script>

    const togglePassword =
        document.getElementById('togglePassword');

    const password =
        document.getElementById('password');


    togglePassword.addEventListener(
        'click',
        function () {

            const type =
                password.getAttribute('type') === 'password'
                    ? 'text'
                    : 'password';


            password.setAttribute(
                'type',
                type
            );


            this.querySelector('i')
                .classList
                .toggle('bi-eye');


            this.querySelector('i')
                .classList
                .toggle('bi-eye-slash');

        }
    );

  </script>

</body>

</html>
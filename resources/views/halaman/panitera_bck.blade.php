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
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <style>
    #myDataTable {
        font-size: 13px;
    }

    .dataTables_length {
        font-size: 13px;
    }

    .dataTables_filter {
        font-size: 13px;
    }

    .dataTables_info {
        font-size: 13px;
    }

    .dataTables_paginate {
        font-size: 13px;
    }
  </style>

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

      <a href="#" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/ma.png" alt="">
        <img src="assets/img/pa.png" alt="">
        <h1 class="sitename">PA Bitung</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#">Pelayanan Internal Pengadilan Agama Bitung</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">
    <!-- Contact Section -->
    <section id="contact" class="contact section" style="margin-top: 50px;">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Panitera</h2>
        <p>Panitera Pengadilan Agama Bitung</p>
      </div><!-- End Section Title -->

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                <p>{{ session('success') }}</p>
            </div>
        @endif

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

        <div class="col-lg-12">
        <p>Data Perkara Pengadilan Agama Bitung</p>
        <div class="table-responsive">
          <table id="myDataTable" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                <th>No</th>
                <th>Jenis Perkara</th>
                <th>Nomor</th>
                <th>Pemohon</th>
                <th>Tergugat</th>
                <th>Kuasa Hukum</th>
                <th>Lokasi Pemohon</th>
                <th>Lokasi Tergugat</th>
                <th>Keterangan</th>
                <th>Tanggal Pendaftaran</th>
                <th>Hakim</th>
                <th>Hakim Tunggal</th>
                <th>Penetapan Hari Sidang</th>
                <th>Penunjukkan Panitera Pengganti</th>
                <th>Penunjukkan Jurusita/Jurusita Pengganti</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $index => $row)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $row->jenis }}</td>
                    <td>{{ $row->noperkara }}</td>
                    <td>{{ $row->pemohon }}</td>
                    <td>{{ $row->tergugat }}</td>
                    <td>{{ $row->kuasa_hukum }}</td>
                    <td>{{ $row->lokasi_pemohon }}</td>
                    <td>{{ $row->lokasi_tergugat }}</td>
                    <td>{{ $row->keterangan }}</td>
                    <td>{{ $row->tanggal_pendaftaran }}</td>
                    <td>{{ $row->jenis_hakim_text }}</td>
                    <td>{{ $row->hakim_tunggal_name }}</td>
                    <td>{{ $row->jadwal }}</td>
                    <td>{{ $row->panitera_pengganti_name }}</td>
                    <td>{{ $row->juru_sita_name }}</td>
                    <td>
                        {{-- <form action={{ route('admin.informasipublik.destroy',$informasi->id) }} method="post" onsubmit = "return confirm('Yakin Ingin Menghapus Informasi ?')"> --}}
                            @csrf
                            {{-- @method('delete') --}}
                            <a href={{ route('perkara.editpanitera',$row->id) }} class="btn btn-warning icon">
                                {{-- <i data-feather="edit" width="20"></i> --}}
                                <i class="bi bi-pencil-square" width="20"></i>
                            </a>
                        {{-- </form> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        </div>
        </div>
      </div>
    </section><!-- /Contact Section -->
    </main>
  <footer id="footer" class="footer">
    <div class="container copyright text-center mt-4">
      <p>© 2025 <span>Muhammad Rizky</span> <strong class="px-1 sitename">Pengadilan Agama Bitung</strong>| Mahkamah Agung Republik Indonesia</p>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
     $(document).ready(function () {
    $('#myDataTable').DataTable({
        responsive: true,
        autoWidth: false, // opsional agar lebar kolom lebih fleksibel
        columnDefs: [
            { targets: '_all', className: 'dt-body-nowrap' } // hindari wrapping teks
            ]
        });
    });
  </script>
</body>
</html>

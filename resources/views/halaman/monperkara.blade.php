<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ $title ?? 'Layanan Internal | Pengadilan Agama Bitung' }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href={{ asset('assets/img/pa.png') }} rel="icon">
    <link href={{ asset('assets/img/apple-touch-icon.png') }} rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href={{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }} rel="stylesheet">
    <link href={{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }} rel="stylesheet">
    <link href={{ asset('assets/vendor/aos/aos.css') }} rel="stylesheet">
    <link href={{ asset('assets/vendor/glightbox/css/glightbox.min.css') }} rel="stylesheet">
    <link href={{ asset('assets/vendor/swiper/swiper-bundle.min.css') }} rel="stylesheet">

    <!-- Main CSS File -->
    <link href={{ asset('assets/css/main.css') }} rel="stylesheet">
    <link href="https://cdn.datatables.net/v/bs5/dt-2.3.4/datatables.min.css" rel="stylesheet" integrity="sha384-i0jVPhw/X00l5EPvMOBv0lcGYXlSQGOqNYpMK/406rxta9oBump0IZJIHzvtf3+H" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .table-sm {
            font-size: 13px !important;
        }
    </style>

    @yield('styles')

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

  @extends('layouts.layout')
  @section('content')

  <main class="main">

    <!-- Hero Section -->

    <!-- Services Section -->
    <section id="services" class="services section" style="margin-top: 100px;">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-12">
                        <h4>Data Perkara Terkini Pengadilan Agama Bitung</h4>
                        <div class="table-responsive">
                            <table id="myDataTable" class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap text-center"><i class="fas fa-cog"></i></th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">No</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Jenis Perkara</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Nomor</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Pemohon</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Pemohon II</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Pemohon III</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Pemohon IV</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Tergugat</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Tergugat II</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Tergugat III</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Tergugat IV</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Kuasa Hukum</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Lokasi Pemohon</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Lokasi Tergugat</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Keterangan</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Tanggal Pendaftaran</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Jenis Hakim</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Hakim</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Penetapan Tanggal Sidang</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Penunjukkan Panitera Pengganti</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Penunjukkan Jurusita/Jurusita Pengganti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $row)
                                        <tr>
                                            <td class="text-nowrap">

                                                <span class="badge {{ $row->status_operator['badge'] }}">

                                                    {{ $row->status_operator['status'] }}

                                                    @if(!empty($row->status_operator['keterangan']))

                                                        <span style="color:#FFFFFF;font-size:12px;">
                                                            ⏳ {{ $row->status_operator['keterangan'] }}
                                                        </span>

                                                    @endif

                                                </span>
                                            </td>
                                            <td class="text-nowrap" style="font-size:14px;color:grey;font-weight:normal;font-family:Arial;">{{ $loop->iteration }}</td>
                                            <td class="text-nowrap"><span class="badge bg-info text-dark">{{ $row->jenis }}</span></td>
                                            <td class="text-nowrap"><span class="badge bg-secondary">{{ $row->noperkara }}</span></td>
                                            <td class="text-nowrap" style="font-size:14px;color:grey;font-weight:normal;font-family:Arial;">{{ $row->pemohon }}</td>
                                            <td class="text-nowrap" style="font-size:14px;color:grey;font-weight:normal;font-family:Arial;">{{ $row->pemohoni }}</td>
                                            <td class="text-nowrap" style="font-size:14px;color:grey;font-weight:normal;font-family:Arial;">{{ $row->pemohoniii }}</td>
                                            <td class="text-nowrap" style="font-size:14px;color:grey;font-weight:normal;font-family:Arial;">{{ $row->pemohoniv }}</td>
                                            <td class="text-nowrap" style="font-size:14px;color:grey;font-weight:normal;font-family:Arial;">{{ $row->tergugat }}</td>
                                            <td class="text-nowrap" style="font-size:14px;color:grey;font-weight:normal;font-family:Arial;">{{ $row->tergugatii }}</td>
                                            <td class="text-nowrap" style="font-size:14px;color:grey;font-weight:normal;font-family:Arial;">{{ $row->tergugatiii }}</td>
                                            <td class="text-nowrap" style="font-size:14px;color:grey;font-weight:normal;font-family:Arial;">{{ $row->tergugativ }}</td>
                                            <td class="text-nowrap" style="font-size:14px;color:grey;font-weight:normal;font-family:Arial;">{{ $row->kuasa_hukum }}</td>
                                            <td class="text-nowrap" style="font-size:14px;color:grey;font-weight:normal;font-family:Arial;">{{ $row->lokasi_pemohon }}</td>
                                            <td class="text-nowrap" style="font-size:14px;color:grey;font-weight:normal;font-family:Arial;">{{ $row->lokasi_tergugat }}</td>
                                            <td style="font-size:14px;color:grey;font-weight:normal;font-family:Arial;">
                                                <div style="/* Kolom ke-13 = Keterangan */ #myDataTable td:nth-child(13), #myDataTable th:nth-child(13) {max-width: 800px !important;
                                                            white-space: normal !important;
                                                            word-wrap: break-word;
                                                        }">
                                                    {{ $row->keterangan }}
                                                </div>
                                            </td>
                                            <td class="text-nowrap" style="text-align:center;"
                                                data-order="{{ \Carbon\Carbon::parse($row->tanggal_pendaftaran)->format('Y-m-d') }}">
                                                
                                                <span class="badge bg-warning text-dark">
                                                    {{ \Carbon\Carbon::parse($row->tanggal_pendaftaran)->format('d-m-Y') }}
                                                </span>
                                            </td>
                                            <td class="text-nowrap">
                                                @if (empty($row->jenisHakim))
                                                    <span class="badge bg-danger">-</span>
                                                @elseif ($row->jenisHakim == 1)
                                                    <span class="badge bg-danger">Majelis Hakim</span>
                                                @elseif ($row->jenisHakim == 2)
                                                    <span class="badge bg-danger">Hakim Tunggal</span>
                                                @else
                                                    <span class="badge bg-danger">-</span>
                                                @endif
                                            </td>
                                            <td class="text-nowrap">
                                                @if (empty($row->jenisHakim))
                                                    <span class="badge bg-light text-dark">-</span>
                                                @elseif ($row->jenisHakim == 1)
                                                    <span class="badge bg-light text-dark">{!! $row->majelis_hakim_name ?? '-' !!}</span>
                                                @elseif ($row->jenisHakim == 2)
                                                    <span class="badge bg-light text-dark">{!! $row->hakim_tunggal_name ?? '-' !!}</span>
                                                @else
                                                    <span class="badge bg-light text-dark">-</span>
                                                @endif
                                            </td>
                                            <td class="text-nowrap" style="text-align:center;"
                                                data-order="{{ \Carbon\Carbon::parse($row->jadwal)->format('Y-m-d') }}">
                                                
                                                <span class="badge bg-success text-white">
                                                    {{ \Carbon\Carbon::parse($row->jadwal)->format('d-m-Y') }}
                                                </span>
                                            </td>
                                            <td class="text-nowrap"><span class="badge bg-light text-dark">{{ $row->panitera_pengganti_name }}</span></td>
                                            <td class="text-nowrap"><span class="badge bg-light text-dark">{{ $row->juru_sita_name }}</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
        </div>
      </div>
    </section><!-- /Services Section -->

  </main>
<!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src={{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('assets/vendor/php-email-form/validate.js') }}></script>
    <script src={{ asset('assets/vendor/aos/aos.js') }}></script>
    <script src={{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}></script>
    <script src={{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}></script>
    <script src={{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}></script>
    <script src={{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}></script>
    <script src={{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-2.3.4/datatables.min.js" integrity="sha384-jVoHjtunWKmr2zpSki5PSXfFYRsTQQm1uk4wpf45zuYxast668XkB2fJL8PjloNc" crossorigin="anonymous"></script>

    <!-- Main JS File -->
    <script src={{ asset('assets/js/main.js') }}></script>
    <script>
        $(document).ready(function() {
            $('#myDataTable').DataTable({
                scrollX: true,
                responsive: false,
                autoWidth: false,
                order: [[1, 'asc']]
            });
        });
    </script>
</body>
</html>

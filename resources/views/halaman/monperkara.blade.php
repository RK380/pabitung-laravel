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
                            <!-- <div class="col-12 text-center">
                                <a href="/operator" type="button" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left fa-fw"></i> Kembali
                                </a>
                            </div> -->
                        </div>
                    </div>
        </div>
      </div>
    </section><!-- /Services Section -->

  </main>

  <footer id="footer" class="footer">
    <div class="container footer-top">
          <div class="row gy-4">
            <div class="col-lg-4 col-md-4 footer-about">
              <a href="index.html" class="d-flex align-items-center">
                <span class="sitename">Mahkamah Agung Republik Indonesia</span>
              </a>
              <div class="footer-contact pt-3">
                <p><strong>Pengadilan Agama Bitung</strong></p>
                <p><strong>Pelayanan Internal</strong></p>
                <p class="mt-3"><strong>Phone:</strong> <span>(0438) 35566</span></p>
                <p class="mt-3"><strong>WhatsApp:</strong> <span>0823-9343-8722</span></p>
                <p><strong>Email:</strong> <span>pengadilanagamabitung@yahoo.co.id</span></p>
              </div>
              <div class="row">
                <h4 class="title" style="margin-bottom: 5px;padding-top:1rem;">Total Pengunjung</h4>
                <div class="d-flex flex-row flex-wrap flex-md-nowrap justify-content-between visitor">
							<div class="p-2 visitor-online" style="color:white;width:100%;background: #056e4f;border-top-left-radius: 7px;">
								<strong class="d-block">Hari Ini</strong>
								{{ $today }}
							</div>
							<div class="p-2 ms-0 ms-md-1 mt-1 mt-md-0 visitor-week" style="color:black;width:100%;background-color: #BD9E01;">
								<strong class="d-block" style="color:black;">Minggu Ini</strong>
								{{ $thisWeek }}
							</div>
							<div class="p-2 ms-0 ms-md-1 mt-1 mt-md-0 visitor-monthly" style="color:black;width:100%;background-color: #BD9E01;border-top-right-radius: 7px;">
								<strong class="d-block" style="color:black;">Bulan Ini</strong>
								{{ $thisMonth }}
							</div>
							
						</div>
						<div class="d-flex flex-row mt-1 flex-wrap flex-md-nowrap visitor">
							<div class="p-2 visitor-year" style="color:black;width:100%;background-color: #BD9E01;border-bottom-left-radius: 7px;">
								<strong class="d-block" style="color:black">Tahun Ini</strong>
								{{ $thisYear }}
							</div>
							<div class="p-2 ms-0 ms-md-1 mt-1 mt-md-0 visitor-all" style="color:black;width:100%;background-color: #BD9E01;border-bottom-right-radius: 7px;">
								<strong class="d-block" style="color:black;">Total Kunjungan</strong>
								{{ $total }}
							</div>
						</div>
            </div>
            </div>
    
            <div class="col-lg-4 col-md-4 footer-links">
              <h4>UNIT KERJA</h4>
              <div class="flicker-img">
                <a href="https://sipp.pa-bitung.go.id/list_jadwal_sidang">
                    <img src="/assets/img/jadwal_sidang.jpeg" style="max-width:100%;heigh:auto;">
                </a>
                <a href="https://sipp.pa-bitung.go.id/">
                    <img src="/assets/img/sipp.jpeg" style="max-width:100%;heigh:auto;">
                </a>
                <a href="https://siwas.mahkamahagung.go.id/">
                  <img src="/assets/img/siwas.jpeg" style="max-width:100%;heigh:auto;">
                </a>
              </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <h4>Mahkamah Agung Republik Indonesia</h4>
                <p>PENGADILAN AGAMA BITUNG</p>
                <div class="social-links d-flex">
                  <a href="https://share.google/ll5Qn4DR9ERXaxUPt"><i class="bi bi-instagram"></i></a>
                  <a href="https://www.youtube.com/results?search_query=pengadilan+agama+bitung"><i class="bi bi-youtube"></i></a>
                  <a href="https://www.facebook.com/profile.php?id=100066547001608"><i class="bi bi-facebook"></i></a>
                </div>
                <div class="tab-content" id="pills-tabContent" style="height: 350px;overflow-y:scroll;margin-top:10px;">
                    <div class="tab-pane fade active show" id="pills-ig" role="tabpanel" aria-labelledby="pills-ig-tab">
                        <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/p/DU507d4kktz/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/p/DU507d4kktz/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">View this post on Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/DU507d4kktz/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Pengadilan Agama Bitung (@pa_bitung)</a></p></div></blockquote>
                        <script async src="//www.instagram.com/embed.js"></script>
                    </div>
                </div>
            </div>

          </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© 2025 <span>Muhammad Rizky</span> <strong class="px-1 sitename">Pengadilan Agama Bitung</strong>| Mahkamah Agung Republik Indonesia</p>
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
   <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <link rel="stylesheet"
        href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
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

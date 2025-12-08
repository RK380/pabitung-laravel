@extends('layouts.layout')
@section('content')
    <main class="main">
        <!-- Contact Section -->
        <section id="contact" class="contact section" style="margin-top: 90px;">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Operator</h2>
                <p>Operator Pengadilan Agama Bitung</p>
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

            @if (session('success'))
                <div class="alert alert-success">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">
                    {{-- <form action="{{ route('daftarhadir.laporan.pdf') }}" method="GET" target="_blank">
                <div class="row">
                    <div class="col">
                        <select name="tahun" class="form-control">
                            <option value="">-- Pilih Tahun --</option>
                            @for ($i = date('Y'); $i >= 2020; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col">
                        <select name="bulan" class="form-control">
                            <option value="">-- Pilih Bulan --</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ date("F", mktime(0, 0, 0, $i, 1)) }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col">
                        <select name="jenis" class="form-control">
                            <option value="">-- Jenis Perkara --</option>
                            <option value="Cerai Talak">Cerai Talak</option>
                            <option value="Cerai Gugat">Cerai Gugat</option>
                        </select>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-success">Download PDF <i class="bi bi-download" width="20"></i></button>
                    </div>
                </div>
            </form> --}}
                </div>

                <div class="row gy-4">
                    <div class="col-lg-12">
                        <h4>Data Daftar Hadir Mediasi Terkini Pengadilan Agama Bitung</h4>
                        <div class="table-responsive">
                            <table id="myDataTable" class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">No</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Tanggal</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Nomor Perkara</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Jenis Perkara</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Penggugat/Pemohon</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Kuasa Hukum Pemohon</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Tergugat/Termohon</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Kuasa Hukum Tergugat</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Tanda Tangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $row)
                                        <tr>
                                            <td class="text-nowrap" style="font-size:14px;color:grey;font-weight:bold;font-family:Arial;">{{ $loop->iteration }}</td>
                                            <td class="text-nowrap"><span class="badge bg-success">{{ $row->tanggal }}</span></td>
                                            <td class="text-nowrap"><span class="badge bg-secondary">{{ $row->nomor }}</span></td>
                                            <td class="text-nowrap"><span class="badge bg-info text-dark">{{ $row->jenis_perkara }}</span></td>
                                            <td class="text-nowrap" style="font-size:14px;color:grey;font-weight:normal;font-family:Arial;">{{ $row->penggugat }}</td>
                                            <td class="text-nowrap" style="font-size:14px;color:grey;font-weight:normal;font-family:Arial;">{{ $row->kuasa_hukum_pemohon }}</td>
                                            <td class="text-nowrap" style="font-size:14px;color:grey;font-weight:normal;font-family:Arial;">{{ $row->tergugat }}</td>
                                            <td class="text-nowrap" style="font-size:14px;color:grey;font-weight:normal;font-family:Arial;">{{ $row->kuasa_hukum_tergugat }}</td>
                                            <td class="text-nowrap">
                                                @if ($row->tanda_tangan)
                                                    <img src="{{ asset($row->tanda_tangan) }}" alt="TTD"
                                                        style="width:100px;">
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="col-12 text-center">
                                <a href="/operator" type="button" class="btn btn-primary"><i class="bi bi-arrow-left"></i>
                                    Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Contact Section -->
    </main>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#myDataTable').DataTable({
                scrollX: true,
                responsive: false,
                autoWidth: false,
            });
        });
    </script>
@endsection

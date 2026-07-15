@php
    use App\Enums\JenisHakim;
@endphp
@extends('layouts.layout')
@section('content')
    <main class="main">
        <section id="contact" class="contact section" style="margin-top: 90px;">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Panitera</h2>
                <p>Panitera Pengadilan Agama Bitung</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-12">

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <h4>Data Perkara Pengadilan Agama Bitung</h4>
                        <div class="table-responsive">
                            <table id="myDataTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap text-center">
                                            <i class="fas fa-cog"></i>
                                        </th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">No</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Jenis Perkara</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Nomor</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Pemohon/Penggugat</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Pemohon II</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Pemohon III</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Pemohon IV</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Termohon/Tergugat</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Kuasa Hukum</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Lokasi Pemohon/Penggugat</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Lokasi Termohon/Tergugat</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Keterangan</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Tanggal Pendaftaran</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Jenis Hakim</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Hakim</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Penetapan Hari Sidang</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Penunjukkan Panitera Pengganti</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Penunjukkan Jurusita/Jurusita Pengganti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $row)
                                        <tr>
                                            <td class="text-nowrap">
                                                <a href={{ route('perkara.editpanitera', $row->id) }} class="btn btn-warning icon">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>

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
                                            <td class="text-nowrap" style="text-align:center;"><span class="badge bg-warning text-dark">{{ $row->tanggal_pendaftaran }}</span></td>
                                            <td class="text-nowrap">
                                                <span class="badge bg-danger">
                                                    {{ match($row->jenisHakim?->value) {
                                                        1 => 'Majelis Hakim',
                                                        2 => 'Hakim Tunggal',
                                                        default => '-'
                                                    } }}
                                                </span>
                                            </td>
                                            <td class="text-nowrap">
                                                @if (is_null($row->jenisHakim))
                                                    <span class="badge bg-light text-dark">-</span>
                                                @elseif ($row->jenisHakim === JenisHakim::MAJELIS)
                                                    <span class="badge bg-light text-dark">
                                                        {!! $row->majelis_hakim_name ?? '-' !!}
                                                    </span>
                                                @elseif ($row->jenisHakim === JenisHakim::TUNGGAL)
                                                    <span class="badge bg-light text-dark">
                                                        {!! $row->hakim_tunggal_name ?? '-' !!}
                                                    </span>
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

            <div class="d-flex justify-content-center">
                <a href="{{ route('home') }}" class="btn btn-secondary" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-arrow-left fa-fw"></i> Kembali
                </a>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#myDataTable').DataTable({
                scrollX: true,
                responsive: false,
                autoWidth: true,
                order: [
                    [1, 'asc']
                ], // Mengurutkan berdasarkan kolom kedua (indeks 1) secara ascending
                columnDefs: [{
                        targets: 0,
                        orderable: false,
                        searchable: false
                    } // disable column index 0 being sort or search
                ]
            });
        });
    </script>
@endsection

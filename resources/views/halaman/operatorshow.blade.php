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
                <div class="row gy-4 mb-5">
                    <form action="{{ route('perkara.report.pdf') }}" method="GET" target="_blank">
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
                                        <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col">
                                <input type="text" name="kuasa_hukum" class="form-control" placeholder="Kuasa Hukum">
                            </div>
                            <div class="col">
                                <select name="jenis" class="form-control">
                                    <option value="">-- Jenis Perkara --</option>
                                    <option value="Cerai Talak">Cerai Talak</option>
                                    <option value="Cerai Gugat">Cerai Gugat</option>
                                    <option value="Permohonan Isbat Nikah">Permohonan Isbat Nikah</option>
                                    <option value="Permohonan Dispensasi Kawin">Permohonan Dispensasi Kawin</option>
                                    <option value="Permohonan Asal Usul Anak">Permohonan Asal Usul Anak</option>
                                    <option value="Kewarisan">Kewarisan</option>
                                    <option value="Kewarisan">Harta Bersama</option>
                                </select>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-success">Download PDF <i class="bi bi-download"
                                        width="20"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
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
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Kuasa Hukum</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Lokasi Pemohon</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Lokasi Tergugat</th>
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
                                        @php
                                            // Ambil nilai jadwal dari $row (aman untuk array atau object)
                                            $jadwalVal = data_get($row, 'jadwal');

                                            // jika kosong -> null, jika ada -> Carbon instance
                                            $jadwal = $jadwalVal ? \Carbon\Carbon::parse($jadwalVal) : null;
                                        @endphp
                                        <tr>
                                            <td class="text-nowrap">
                                                <form action="{{ route('perkara.destroy', $row->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin hapus?')"><i
                                                            class="bi bi-trash"></i></button>
                                                </form>
                                                @if (is_null($jadwal))
                                                    <span class="badge bg-secondary">Belum Dijadwalkan</span>
                                                @elseif ($jadwal->isPast())
                                                    <span class="badge bg-success">Selesai Sidang</span>
                                                @else
                                                    <span class="badge bg-warning text-dark">Menunggu Waktu Sidang</span>
                                                @endif
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
                                            <td class="text-nowrap" style="text-align:center;"><span class="badge bg-warning text-dark">{{ $row->tanggal_pendaftaran }}</td>
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
                                            <td class="text-nowrap" style="text-align:center;"><span class="badge bg-success">{{ $row->jadwal }}</span></td>
                                            <td class="text-nowrap"><span class="badge bg-light text-dark">{{ $row->panitera_pengganti_name }}</span></td>
                                            <td class="text-nowrap"><span class="badge bg-light text-dark">{{ $row->juru_sita_name }}</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="col-12 text-center">
                                <a href="/operator" type="button" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left fa-fw"></i> Kembali
                                </a>
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

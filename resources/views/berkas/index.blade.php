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

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row">
                    <div class="col-12">
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
                    </div>
                </div>

                <form action="{{ route('pendistribusian.download.pdf') }}" method="GET" target="_blank">
                    <div class="row gy-4 mb-5">
                        <div class="col-sm-12 col-md-3">
                            <select name="tahun" class="form-control">
                                <option value="">-- Pilih Tahun --</option>
                                @for ($i = date('Y'); $i >= 2020; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <select name="bulan" class="form-control">
                                <option value="">-- Pilih Bulan --</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <select name="panitera" class="form-control">
                                <option value="">-- Panitera/Panitera Muda/Panitera Pengganti --</option>
                                <option value="1">1. HASNA BIN NURDIN HARUN, S.H. (Panitera)</option>
                                <option value="2">2. JANE, S.H. (Panitera Muda Permohonan)</option>
                                <option value="3">3. MUHAMMAD SHABRI HAKIM, S.H.I., M.H. (Panitera Muda Gugatan)
                                </option>
                                <option value="4">4. SITTI AISA HALIDU, S.H. (Panitera Muda Hukum)</option>
                                <option value="5">5. LUTFIAH MAMONTO, S.Ag (Panitera Pengganti)</option>
                                <option value="6">6. RISKA POLI (Panitera Pengganti)</option>
                                <option value="7">7. FIRDHA DJUBEDI, S.H., M.H. (Panitera Pengganti)</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <button type="submit" class="btn btn-success w-100">
                                Download PDF <i class="bi bi-download" width="20"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <div class="row gy-4">
                    <div class="col-lg-12">
                        <h4>Data Pendistribusian Berkas Perkara Terkini Pengadilan Agama Bitung</h4>
                        <div class="table-responsive">
                            <table id="myDataTable" class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap text-center">
                                            <i class="fas fa-cog"></i>
                                        </th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">No</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Nomor Perkara</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Tanggal</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Panitera/Panitera Muda/Panitera Pengganti</th>
                                        <th class="text-nowrap" style="font-size:15px;color:green;font-weight:bold;font-family:Arial;">Paraf</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $row)
                                        <tr>
                                            <td class="text-nowrap">
                                                <form action="{{ route('berkas.destroy', $row->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin hapus?')"><i
                                                            class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                            <td class="text-nowrap" style="font-size:14px;color:grey;font-weight:bold;font-family:Arial;">{{ $loop->iteration }}</td>
                                            <td class="text-nowrap"><span class="badge bg-info text-dark">{{ $row->nomor }}</span></td>
                                            <td class="text-nowrap"><span class="badge bg-success">{{ $row->tanggal }}</span></td>
                                            <td class="text-nowrap"><span class="badge bg-light text-dark">{{ $row->panitera_pengganti_name }}</span></td>
                                            <td class="text-nowrap">
                                                @if ($row->tanda_tangan)
                                                    <img src="{{ asset($row->tanda_tangan) }}" alt="TTD"
                                                        style="width:100px;">
                                                @endif
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

@extends('layouts.layout')

@section('content')
    <main class="main">
        <!-- Contact Section -->
        <section id="contact" class="contact section" style="margin-top: 50px;">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Majelis Hakim</h2>
                <p>Majelis Hakim Pengadilan Agama Bitung</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-12">
                        <h4>Data Perkara Pengadilan Agama Bitung</h4>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-12">
                        <form action="{{ route('perkara.update', $data->id) }}" method="POST" data-aos="fade-up"
                            data-aos-delay="200">
                            @csrf
                            @method('PUT')
                            <div class="row gy-4">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="row gy-4">
                                            <div class="col-md-6 ">
                                                <label for="jenis">Jenis Perkara</label>
                                                <input type="text" class="form-control"
                                                    value="{{ old('jenis', $data->jenis) }}" name="jenis" disabled>
                                            </div>

                                            <div class="col-md-6 ">
                                                <label for="noperkara">Nomor Perkara</label>
                                                <input type="text" class="form-control"
                                                    value="{{ old('noperkara', $data->noperkara) }}" name="noperkara"
                                                    disabled>
                                            </div>

                                            <div class="col-md-6 ">
                                                <label for="pemohon">Pemohon/Penggugat</label>
                                                <input type="text" class="form-control"
                                                    value="{{ old('pemohon', $data->pemohon) }}" name="pemohon" disabled>
                                            </div>

                                            <div class="col-md-6 ">
                                                <label for="tergugat">Tergugat</label>
                                                <input type="text" class="form-control"
                                                    value="{{ old('tergugat', $data->tergugat) }}" name="tergugat" disabled>
                                            </div>

                                            <div class="col-md-6 ">
                                                <label for="pilihan">Kuasa Hukum</label>
                                                <input type="text" class="form-control"
                                                    value="{{ old('kuasa_hukum', $data->kuasa_hukum) }}"
                                                    name="kuasa_hukum_status" disabled>
                                            </div>
                                            <!-- Input Kuasa Hukum (awal disembunyikan) -->
                                            <div class="col-md-6 mt-3" id="formKuasa" style="display:none;">
                                                <label for="namaKuasa">Nama Kuasa Hukum</label>
                                                <input type="text" class="form-control" id="namaKuasa" name="kuasa_hukum"
                                                    disabled>
                                            </div>

                                            <div class="col-md-6 ">
                                                <label for="lokasipemohon">Lokasi Pemohon/Penggugat</label>
                                                <input type="text" class="form-control" name="lokasipemohon"
                                                    value="{{ old('lokasi_pemohon', $data->lokasi_pemohon) }}" disabled>
                                            </div>
                                            <div class="col-md-6 ">
                                                <label for="lokasitergugat">Lokasi Tergugat</label>
                                                <input type="text" class="form-control" name="lokasitergugat"
                                                    value="{{ old('lokasi_tergugat', $data->lokasi_tergugat) }}" disabled>
                                            </div>
                                            <div class="col-md-6 ">
                                                <label for="lokasitergugat">Keterangan</label>
                                                <input type="text" class="form-control" name="keterangan"
                                                    value="{{ old('keterangan', $data->keterangan) }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="jenisHakim">Penetapan Majelis Hakim <i style="color: red">*</i></label>
                                    <select class="form-select" id="jenisHakim" name="jenisHakim">
                                        <option value="" selected>-Pilih-</option>
                                        <option value="1">Majelis Hakim</option>
                                        <option value="2">Hakim Tunggal</option>
                                    </select>
                                    <p style="font-size:12px;color:red;padding-top:5px;">* Penetapan Majelis Hakim Wajib Di Isi</p>
                                </div>

                                <!-- Form untuk menampilkan semua nama hakim (Majelis Hakim) -->
                                <div class="col-md-6 mt-3" id="formMajelis" style="display:none;">
                                    <ol>
                                        <li>Harisan Upuolat, S.H.I., M.H. (Ketua Majelis)</li>
                                        <li>Jasni Manoso, S.H.I (Hakim Anggota 1)</li>
                                        <li>Muhammad Iklil Lahilote, S.H. (Hakim Anggota 2)</li>
                                    </ol>
                                </div>

                                <!-- Form untuk Hakim Tunggal -->
                                <div class="col-md-6 mt-3" id="formTunggal" style="display:none;">
                                    <label for="hakimTunggal">Pilih Hakim Tunggal <i style="color: red">*</i></label>
                                    <select class="form-select" id="hakimTunggal" name="hakimTunggal">
                                        <option value="1">Harisan Upuolat, S.H.I., M.H. (Ketua Majelis)</option>
                                        <option value="2">Jasni Manoso, S.H.I (Hakim Anggota 1)</option>
                                        <option value="3">Muhammad Iklil Lahilote, S.H. (Hakim Anggota 2)</option>
                                    </select>
                                </div>

                                <div class="col-md-6 ">
                                    <label for="jadwal">Penetapan Hari Sidang <i style="color: red">*</i></label>
                                    <input type="date" class="form-control"
                                    value="{{ old('jadwal', $data->jadwal) }}" name="jadwal" required="">
                                    <p style="font-size:12px;color:red;padding-top:5px;">* Penetapan Hari Sidang Wajib Di Isi</p>
                                </div>

                                <div class="col-12 text-center">
                                    <a href="/hakim" type="button" class="btn btn-secondary"><i
                                            class="bi bi-arrow-left"></i> Kembali</a>
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i>
                                        Simpan</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>
@endsection

@section('scripts')
    <script>
        let jenisHakimOld = @json($data->jenisHakim);
        let hakimTunggalOld = @json($data->hakimTunggal);

        $(document).ready(function() {
            // Set old values for jenisHakim
            if (jenisHakimOld) {
                $('#jenisHakim').val(jenisHakimOld);
                $('#jenisHakim').trigger('change');

                if (jenisHakimOld == 2) {
                    $('#hakimTunggal').val(hakimTunggalOld);
                }
            }
        });

        $('#jenisHakim').on('change', function() {
            let val = $('#jenisHakim').val();
            let formMajelis = document.getElementById('formMajelis');
            let formTunggal = document.getElementById('formTunggal');

            if (val === "1") {
                formMajelis.style.display = "block";
                formTunggal.style.display = "none";
            } else if (val === "2") {
                formMajelis.style.display = "none";
                formTunggal.style.display = "block";
            } else {
                formMajelis.style.display = "none";
                formTunggal.style.display = "none";
            }
        });
    </script>
@endsection

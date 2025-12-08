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
            <!-- alert -->
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div class="col-12 text-left" style="margin-bottom: 50px;">
                        <a href="{{ route('perkara.show') }}" type="button" class="btn btn-danger">Monitoring Perkara <i
                                class="bi bi-eye" width="20"></i></a>
                        <a href="{{ route('berkas.index') }}" type="button" class="btn btn-success">Monitoring
                            Pendistribusian Perkara <i class="bi bi-eye" width="20"></i></a>
                        <a href="{{ route('daftarhadir.show') }}" type="button" class="btn btn-primary">Monitoring Daftar
                            Hadir Pihak Mediasi <i class="bi bi-eye" width="20"></i></a>
                    </div>
                </div>

                <div class="row gy-4">

                    <div class="col-lg-12">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success fade show" role="alert">
                                {{ session('success') }}
                            </div>
                            @php
                                $wa_link = request()->query('wa_link');
                                $wa_ketua_link = request()->query('wa_ketua_link');
                            @endphp
                            <div class="mb-3">
                                @if ($wa_link)
                                    <button type="button" id="btnWaHakim" class="btn btn-success me-2">
                                        Kirim WhatsApp ke Hakim
                                    </button>
                                @endif
                                @if ($wa_ketua_link)
                                    <button type="button" id="btnWaKetua" class="btn btn-warning">
                                        Kirim WhatsApp ke Ketua
                                    </button>
                                @endif
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('perkara.store') }}" method="post" data-aos="fade-up" data-aos-delay="200">
                            @csrf
                            <div class="row gy-4">

                                <div class="col-md-6 ">
                                    <label for="tanggal_pendaftaran">Tanggal Pendaftaran <i style="color: red">*</i></label>
                                    <input type="date" class="form-control" name="tanggal_pendaftaran" required value="{{ old('tanggal_pendaftaran') }}">
                                    <p style="font-size:12px;color:red;padding-top:5px;">* Tanggal Pendaftaran Wajib Di Isi</p>
                                </div>

                                <div class="col-md-6 ">
                                    <label for="jenis">Jenis Perkara <i style="color: red">*</i></label>
                                    <select class="form-select" name="jenis" aria-label="Default select example" required>
                                            <option value="" @selected(old('jenis') == '')>-Pilih-</option>
                                            <option value="Cerai Talak" @selected(old('jenis') == 'Cerai Talak')>Cerai Talak</option>
                                            <option value="Cerai Gugat" @selected(old('jenis') == 'Cerai Gugat')>Cerai Gugat</option>
                                            <option value="Permohonan Isbat Nikah" @selected(old('jenis') == 'Permohonan Isbat Nikah')>Permohonan Isbat Nikah</option>
                                            <option value="Permohonan Dispensasi Kawin" @selected(old('jenis') == 'Permohonan Dispensasi Kawin')>Permohonan Dispensasi Kawin</option>
                                            <option value="Permohonan Asal Usul Anak" @selected(old('jenis') == 'Permohonan Asal Usul Anak')>Permohonan Asal Usul Anak</option>
                                            <option value="Kewarisan" @selected(old('jenis') == 'Kewarisan')>Kewarisan</option>
                                            <option value="Harta Bersama" @selected(old('jenis') == 'Harta Bersama')>Harta Bersama</option>
                                    </select>
                                    <p style="font-size:12px;color:red;padding-top:5px;">* Jenis Perkara Wajib Di Isi</p>
                                </div>

                                <div class="col-md-6 ">
                                    <label for="noperkara">Nomor Perkara <i style="color: red">*</i></label>
                                    <input type="text" class="form-control" placeholder="Nomor Perkara" id="noperkara" name="noperkara" required value="{{ old('noperkara') }}">
                                    <p style="font-size:12px;color:red;padding-top:5px;">* Nomor Perkara Wajib Di Isi</p>
                                </div>

                                <div class="col-md-6 ">
                                    <label for="pemohon">Pemohon/Penggugat <i style="color: red">*</i></label>
                                    <input type="text" class="form-control" placeholder="Pemohon/Penggugat" id="pemohon" name="pemohon" required value="{{ old('pemohon') }}">
                                    <p style="font-size:12px;color:red;padding-top:5px;">* Pemohon/Penggugat Wajib Di Isi</p>
                                </div>

                                <div class="col-md-6 ">
                                    <label for="pemohoni">Pemohon II</label>
                                    <input type="text" class="form-control" placeholder="Pemohon II" id="pemohoni" name="pemohoni" value="{{ old('pemohoni') }}">
                                    <p style="font-size:12px;color:grey;padding-top:5px;">* (Optional) Isi (-) Jika Tidak Ada</p>
                                </div>
                                <div class="col-md-6 ">
                                    <label for="pemohoniii">Pemohon III</label>
                                    <input type="text" class="form-control" placeholder="Pemohon III" id="pemohoniii" name="pemohoniii" value="{{ old('pemohoniii') }}">
                                    <p style="font-size:12px;color:grey;padding-top:5px;">* (Optional) Isi (-) Jika Tidak Ada</p>
                                </div>
                                <div class="col-md-6 ">
                                    <label for="pemohoniv">Pemohon IV</label>
                                    <input type="text" class="form-control" placeholder="Pemohon IV" id="pemohoniv" name="pemohoniv" value="{{ old('pemohoniv') }}">
                                    <p style="font-size:12px;color:grey;padding-top:5px;">* (Optional) Isi (-) Jika Tidak Ada</p>
                                </div>

                                <div class="col-md-6 ">
                                    <label for="tergugat">Termohon/Tergugat <i style="color: red">*</i></label>
                                    <input type="text" class="form-control" placeholder="Termohon/Tergugat" id="tergugat" name="tergugat" required value="{{ old('tergugat') }}">
                                    <p style="font-size:12px;color:red;padding-top:5px;">* Termohon/Tergugat Wajib Di Isi</p>
                                </div>

                                <div class="col-md-6 ">
                                    <label for="kuasaHukum">Kuasa Hukum <i style="color: red">*</i></label>
                                    <select class="form-select" name="kuasa_hukum_status" id="kuasaHukum" required>
                                            <option value="" @selected(old('kuasa_hukum_status') == '')>-Pilih-</option>
                                            <option value="1" @selected(old('kuasa_hukum_status') == '1')>Ada</option>
                                            <option value="2" @selected(old('kuasa_hukum_status') == '2')>Tidak</option>
                                    </select>
                                    <p style="font-size:12px;color:red;padding-top:5px;">* Kuasa Hukum Wajib Di Isi</p>
                                </div>
                                <!-- Input Kuasa Hukum (awal disembunyikan) -->
                                <div class="col-md-6 mt-3" id="formKuasa" style="@if(old('kuasa_hukum_status') == 1) display:block; @else display:none; @endif">
                                    <label for="namaKuasa">Nama Kuasa Hukum <i style="color: red">*</i></label>
                                    <input type="text" class="form-control" id="namaKuasa" name="kuasa_hukum" placeholder="Masukkan nama kuasa hukum" value="{{ old('kuasa_hukum') }}">
                                    <p style="font-size:12px;color:red;padding-top:5px;">* Nama Kuasa Hukum Wajib Di Isi</p>
                                </div>

                                <div class="col-md-6 ">
                                    <label for="lokasipemohon">Lokasi Pemohon/Penggugat <i style="color: red">*</i></label>
                                    <input type="text" class="form-control" placeholder="Lokasi Pemohon/Penggugat" id="lokasipemohon" name="lokasipemohon" required value="{{ old('lokasipemohon') }}">
                                    <p style="font-size:12px;color:red;padding-top:5px;">* Lokasi Pemohon/Penggugat Wajib Di Isi</p>
                                </div>
                                <div class="col-md-6 ">
                                    <label for="lokasitergugat">Lokasi Tergugat</label>
                                    <input type="text" class="form-control" placeholder="Lokasi Tergugat" id="lokasitergugat" name="lokasitergugat" value="{{ old('lokasitergugat') }}">
                                    <p style="font-size:12px;color:grey;padding-top:5px;">* (Optional) Isi (-) Jika Tidak Ada</p>
                                </div>

                                <div class="col-md-6">
                                    <label for="emailpemohon">Email Pemohon/Penggugat <i style="color: red">*</i></label>
                                    <input type="email" class="form-control" placeholder="Email Pemohon/Penggugat" id="emailpemohon" name="emailpemohon" required value="{{ old('emailpemohon') }}">
                                    <p style="font-size:12px;color:red;padding-top:5px;">* Email Pemohon/Penggugat Wajib Di Isi</p>
                                </div>
                                <div class="col-md-6">
                                    <label for="emailpemohonii">Email Pemohon/Penggugat II</label>
                                    <input type="email" class="form-control" placeholder="Email Pemohon/Penggugat II" id="emailpemohonii" name="emailpemohonii" value="{{ old('emailpemohonii') }}">
                                    <p style="font-size:12px;color:grey;padding-top:5px;">* (Optional) Wajib Menggunakan @ Jika Ada Email</p>
                                </div>
                                <div class="col-md-6">
                                    <label for="emailpemohoniii">Email Pemohon/Penggugat III</label>
                                    <input type="email" class="form-control" placeholder="Email Pemohon/Penggugat III" id="emailpemohoniii" name="emailpemohoniii" value="{{ old('emailpemohoniii') }}">
                                    <p style="font-size:12px;color:grey;padding-top:5px;">* (Optional) Wajib Menggunakan @ Jika Ada Email</p>
                                </div>
                                <div class="col-md-6">
                                    <label for="emailpemohoniv">Email Pemohon/Penggugat IV</label>
                                    <input type="email" class="form-control" placeholder="Email Pemohon/Penggugat IV" id="emailpemohoniv" name="emailpemohoniv" value="{{ old('emailpemohoniv') }}">
                                    <p style="font-size:12px;color:grey;padding-top:5px;">* (Optional) Wajib Menggunakan @ Jika Ada Email</p>
                                </div>
                                <div class="col-md-6">
                                    <label for="emailtergugat">Email Tergugat</label>
                                    <input type="text" class="form-control" placeholder="Email Tergugat" id="emailtergugat" name="emailtergugat" value="{{ old('emailtergugat') }}">
                                    <p style="font-size:12px;color:grey;padding-top:5px;">* (Optional) Wajib Menggunakan @ Jika Ada Email</p>
                                </div>

                                <div class="col-12" id="formTextarea">
                                    <label for="keterangan">Keterangan <i style="color: red">*</i></label>
                                    <textarea class="form-control" name="keterangan" rows="6" placeholder="Keterangan" required>{{ old('keterangan') }}</textarea>
                                    <p style="font-size:12px;color:red;padding-top:5px;">* Keterangan Wajib Di Isi</p>
                                </div>

                                <div class="col-12 text-center">
                                    <a href="/" type="button" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Simpan</button>
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
        document.addEventListener('DOMContentLoaded', function() {
            // WhatsApp button logic for Hakim and Ketua
            const urlParams = new URLSearchParams(window.location.search);
            const waLinks = {
                btnWaHakim: urlParams.get('wa_link'),
                btnWaKetua: urlParams.get('wa_ketua_link')
            };

            function handleWaButton(btnId, linkEncoded) {
                const btn = document.getElementById(btnId);
                if (btn && linkEncoded) {
                    const waLink = atob(linkEncoded);
                    btn.addEventListener('click', function() {
                        const newWindow = window.open(waLink, '_blank');
                        if (!newWindow) {
                            alert('Please allow popups for this site. WhatsApp link: ' + waLink);
                        }
                    });
                }
            }

            handleWaButton('btnWaHakim', waLinks.btnWaHakim);
            handleWaButton('btnWaKetua', waLinks.btnWaKetua);
        });

        document.getElementById('kuasaHukum').addEventListener('change', function() {
            let val = this.value;
            let formKuasa = document.getElementById('formKuasa');
            let inputKuasa = document.getElementById('namaKuasa');

            if (val === "1") {
                // Tampilkan form dan aktifkan input
                formKuasa.style.display = "block";
                inputKuasa.removeAttribute('readonly');
                inputKuasa.value = "";
            } else if (val === "2") {
                // Sembunyikan form dan kosongkan input
                formKuasa.style.display = "none";
                inputKuasa.value = "";
            } else {
                // Belum pilih → sembunyikan
                formKuasa.style.display = "none";
                inputKuasa.value = "";
            }
        });
        // namakuasa ga ada proses input di controller
    </script>
    <script>
        document.getElementById('kuasaHukum').addEventListener('change', function() {
            let val = this.value;
            let formTextarea = document.getElementById('formTextarea');

            if (val === "1") {
                // Ada → full width
                formTextarea.classList.remove('col-md-6');
                formTextarea.classList.add('col-md-12');
            } else if (val === "2") {
                // Tidak → setengah
                formTextarea.classList.remove('col-md-12');
                formTextarea.classList.add('col-md-6');
            } else {
                // Default → setengah
                formTextarea.classList.remove('col-md-12');
                formTextarea.classList.add('col-md-6');
            }
        });
    </script>
@endsection

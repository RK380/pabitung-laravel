@extends('layouts.layout')

@section('styles')
    <style>
        #signature-pad {
            border: 1px solid #ccc;
            width: 300px;
            height: 200px;
        }

        #signature-pad canvas {
            width: 100%;
            height: 100%;
            touch-action: none;
            /*  Untuk mencegah masalah sentuhan pada perangkat */
        }
    </style>
@endsection

@section('content')
    <main class="main">
        <!-- Contact Section -->
        <section id="contact" class="contact section" style="margin-top: 90px;">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Daftar Hadir</h2>
                <p>Daftar Hadir Mediasi Pengadilan Agama Bitung</p>
            </div><!-- End Section Title -->
            <!-- alert -->
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

                        <form action="{{ route('daftarhadir.store') }}" method="post" data-aos="fade-up"
                            data-aos-delay="200">
                            @csrf
                            <div class="row gy-4">

                                <div class="col-12 col-md-4">
                                    <label for="tanggal">Tanggal Mediasi <i style="color: red">*</i></label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required="*">
                                    <p style="font-size:12px;color:red;padding-top:5px;">* Tanggal Mediasi Wajib Di Isi</p>
                                </div>

                                <div class="col-12 col-md-4">
                                    <label for="nomor">Nomor Perkara <i style="color: red">*</i></label>
                                    <input type="text" class="form-control" placeholder="Nomor Perkara" id="nomor" name="nomor"
                                        required="*">
                                    <p style="font-size:12px;color:red;padding-top:5px;">* Nomor Perkara Wajib Di Isi</p>
                                </div>

                                <div class="col-12 col-md-4">
                                    <label for="jenis_perkara">Jenis Perkara <i style="color: red">*</i></label>
                                    <select class="form-select" id="jenis_perkara" name="jenis_perkara" required>
                                        <option value="" selected>-Pilih-</option>
                                        <option value="Cerai Talak">Cerai Talak</option>
                                        <option value="Cerai Gugat">Cerai Gugat</option>
                                        <option value="Kewarisan">Kewarisan</option>
                                        <option value="Harta Bersama">Harta Bersama</option>
                                    </select>
                                    <p style="font-size:12px;color:red;padding-top:5px;">* Jenis Perkara Wajib Di Isi</p>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="pemohon">Pemohon/Penggugat <i style="color: red">*</i></label>
                                    <input type="text" class="form-control" placeholder="Pemohon/Penggugat" id="pemohon"
                                        name="penggugat">
                                    <p style="font-size:12px;color:red;padding-top:5px;">* Pemohon/Penggugat Wajib Di Isi</p>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="kuasa_hukum_pemohon">Kuasa Hukum Pemohon</label>
                                    <select class="form-select" id="kuasa_hukum_pemohon" name="kuasa_hukum_pemohon">
                                        <option value="" selected>-Pilih-</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                    <p style="font-size:12px;color:grey;padding-top:5px;">* (Optional)</p>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="tergugat">Termohon/Tergugat</label>
                                    <input type="text" class="form-control" placeholder="Termohon/Tergugat" id="tergugat"
                                        name="tergugat" required="">
                                    <p style="font-size:12px;color:grey;padding-top:5px;">* (Optional)</p>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="kuasa_hukum_tergugat">Kuasa Hukum Tergugat</label>
                                    <select class="form-select" id="kuasa_hukum_tergugat" name="kuasa_hukum_tergugat">
                                        <option value="" selected>-Pilih-</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                    <p style="font-size:12px;color:grey;padding-top:5px;">* (Optional)</p>
                                </div>

                                <div class="col-12 col-md-6 offset-md-3 d-flex justify-content-center align-items-center flex-column">
                                    <label for="paraf">Tanda Tangan <i style="color: red">*</i></label>
                                    <div id="signature-pad">
                                        <canvas></canvas>
                                    </div>
                                    <input type="hidden" name="tanda_tangan" id="tanda_tangan">
                                    <button id="clear-button" class="btn btn-danger mt-1" style="width: 300px;">Hapus</button>
                                    <p style="font-size:12px;color:red;padding-top:5px;">* Wajib Di Isi</p>
                                </div>

                                <div class="col-12 text-center">
                                    <a href="{{ route('home') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left fa-fw"></i> Kembali
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save fa-fw"></i> Simpan
                                    </button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
    <script>
        var canvas = document.querySelector("#signature-pad canvas");
        canvas.width = canvas.offsetWidth;
        canvas.height = canvas.offsetHeight;
        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(255, 255, 255)' // Warna latar belakang kanvas
        });

        // tombol hapus
        document.getElementById('clear-button').addEventListener('click', function(e) {
            e.preventDefault();
            signaturePad.clear();
            document.getElementById('tanda_tangan').value = "";
        });

        // sebelum form dikirim
        document.querySelector("form").addEventListener("submit", function(e) {
                if (signaturePad.isEmpty()) {
                    // Show notification if signature is empty
                    alert("Tanda tangan wajib diisi");
                    e.preventDefault();
                    return false;
                } else {
                    document.getElementById('tanda_tangan').value = signaturePad.toDataURL("image/png");
                }
        });
    </script>
@endsection

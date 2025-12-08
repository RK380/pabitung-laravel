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
                <h2>Pendistribusian Berkas Perkara</h2>
                <p>Pengadilan Agama Bitung</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-12">
                        <form action="{{ route('berkas.store') }}" method="POST" data-aos="fade-up" data-aos-delay="200">
                            @csrf
                            <div class="row gy-4">

                                <div class="col-md-6 ">
                                    <label for="tanggal">Tanggal <i style="color: red">*</i></label>
                                    <input type="date" class="form-control" name="tanggal" required="">
                                    <p style="font-size:12px;color:red;padding-top:5px;">* Tanggal Wajib Di Isi</p>
                                </div>

                                <div class="col-md-6 ">
                                    <label for="nomor">Nomor Perkara <i style="color: red">*</i></label>
                                    <input type="text" class="form-control" placeholder="Nomor Perkara" name="nomor"
                                        required="">
                                    <p style="font-size:12px;color:red;padding-top:5px;">* Nomor Perkara Wajib Di Isi</p>
                                </div>

                                <div class="col-md-6 ">
                                    <label for="panitera">Panitera/Panitera Muda/Panitera Pengganti <i
                                            style="color: red">*</i></label>
                                    <select class="form-select" id="panitera" name="panitera"
                                        aria-label="Default select example">
                                        <option selected>-Pilih-</option>
                                        <option value="1">1. HASNA BIN NURDIN HARUN, S.H. (Panitera)</option>
                                        <option value="2">2. JANE, S.H. (Panitera Muda Permohonan)</option>
                                        <option value="3">3. MUHAMMAD SHABRI HAKIM, S.H.I., M.H. (Panitera Muda
                                            Gugatan)</option>
                                        <option value="4">4. SITTI AISA HALIDU, S.H. (Panitera Muda Hukum)</option>
                                        <option value="5">5. LUTFIAH MAMONTO, S.Ag (Panitera Pengganti)</option>
                                        <option value="6">6. RISKA POLI (Panitera Pengganti)</option>
                                        <option value="7">7. FIRDHA DJUBEDI, S.H., M.H. (Panitera Pengganti)</option>
                                    </select>
                                    <p style="font-size:12px;color:red;padding-top:5px;">* Panitera/Panitera Muda/Panitera Pengganti Wajib Di Isi</p>
                                </div>

                                <div class="col-md-6 ">
                                    <label for="paraf">Tanda Tangan <i style="color: red">*</i></label>
                                    <div id="signature-pad">
                                        <canvas></canvas>
                                    </div>
                                    <input type="hidden" name="tanda_tangan" id="tanda_tangan">
                                    <button id="clear-button" class="btn btn-danger mt-1" style="width: 300px;">Hapus</button>
                                    <p style="font-size:12px;color:red;padding-top:5px;">* Tanda Tangan Wajib Di Isi</p>
                                </div>


                                <div class="col-12 text-center">
                                    <a href="/" type="button" class="btn btn-secondary"><i
                                            class="bi bi-arrow-left"></i> Kembali</a>
                                    <button type="submit" class="btn btn-primary" id="save-button"><i
                                            class="bi bi-floppy"></i> Simpan</button>
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
            if (!signaturePad.isEmpty()) {
                document.getElementById('tanda_tangan').value = signaturePad.toDataURL("image/png");
            }
        });
    </script>
@endsection

@extends('layouts.layout')

@section('content')
    <main class="main">
        <!-- Contact Section -->
        <section id="contact" class="contact section" style="margin-top: 50px;">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Panitera</h2>
                <p>Panitera Pengadilan Agama Bitung</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-12">
                        <h4>Data Perkara Pengadilan Agama Bitung</h4>
                    </div>

                    <div class="col-lg-12">
                        <form action="{{ route('perkara.updatepanitera', $data->id) }}" method="POST" data-aos="fade-up"
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
                                            <div class="col-md-6 ">
                                                <label for="majelisHakim">Hakim</label>
                                                <!-- <input type="text" class="form-control" name="hakim" value="{{ $data->majelisHakim === 'jenisHakim' ? $data->majelisHakim : $data->hakimTunggal }}" disabled> -->
                                                <input type="text" class="form-control" name="majelisHakim"
                                                    value="{{ $data->jenisHakim == '1' ? 'Majelis Hakim' : $data->hakimTunggalName }}"
                                                    disabled>
                                            </div>
                                            <div class="col-md-6 ">
                                                <label for="jadwal">Penetapan Jadwal Sidang</label>
                                                <input type="text" class="form-control" name="jadwal"
                                                    value="{{ old('jadwal', $data->jadwal) }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="panitera">Penunjukkan Panitera Pengganti <i style="color: red">*</i></label>
                                    <select class="form-select" id="paniteraPengganti" name="paniteraPengganti"
                                        aria-label="Default select example">
                                        <option selected>-Pilih-</option>
                                        <option value="1" @selected($data->paniteraPengganti == 1)>1. HASNA BIN NURDIN HARUN, S.H. (Panitera)</option>
                                        <option value="2" @selected($data->paniteraPengganti == 2)>2. JANE, S.H. (Panitera Muda Permohonan)</option>
                                        <option value="3" @selected($data->paniteraPengganti == 3)>3. MUHAMMAD SHABRI HAKIM, S.H.I., M.H. (Panitera Muda
                                            Gugatan)</option>
                                        <option value="4" @selected($data->paniteraPengganti == 4)>4. SITTI AISA HALIDU, S.H. (Panitera Muda Hukum)</option>
                                        <option value="5" @selected($data->paniteraPengganti == 5)>5. LUTFIAH MAMONTO, S.Ag (Panitera Pengganti)</option>
                                        <option value="6" @selected($data->paniteraPengganti == 6)>6. RISKA POLI (Panitera Pengganti)</option>
                                        <option value="7" @selected($data->paniteraPengganti == 7)>7. FIRDHA DJUBEDI, S.H., M.H. (Panitera Pengganti)</option>
                                    </select>
                                    <p style="font-size:12px;color:red;padding-top:5px;">* Penunjukkan Panitera Pengganti Wajib Di Isi</p>
                                </div>

                                <div class="col-md-6">
                                    <label for="jurusita">Penunjukkan Jurusita/Jurusita Pengganti <i
                                            style="color: red">*</i></label>
                                    <select class="form-select" id="juruSita" name="juruSita"
                                        aria-label="Default select example">
                                        <option selected>-Pilih-</option>
                                        <option value="1" @selected($data->juruSita == 1)>1. FADLY RATUWALANGON (Jurusita)</option>
                                        <option value="2" @selected($data->juruSita == 2)>2. NONA MIFTA KUSUMA, A.Md.A.B. (Jurusita)</option>
                                        <option value="3" @selected($data->juruSita == 3)>3. IMAM PURWO SULISTIYO, S.I.A (Jurusita Pengganti)</option>
                                    </select>
                                    <p style="font-size:12px;color:red;padding-top:5px;">* Penunjukkan Jurusita/Jurusita Pengganti Wajib Di Isi</p>
                                </div>

                                <div class="col-12 text-center">
                                    <a href="/panitera" type="button" class="btn btn-secondary"><i
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
    @push('scripts')
        <script>
            $(document).ready(function() {
                //
            });
        </script>
    @endpush
@endsection

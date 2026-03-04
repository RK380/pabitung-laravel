<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $judul }}</title>
    <style>
        @page {
            margin: 140px 30px 80px 30px;
        }

        body { 
            font-family: DejaVu Sans, sans-serif; 
            font-size: 11px; 
        }

        header {
            position: fixed;
            top: -120px;
            left: 0;
            right: 0;
            height: 110px;
            border-bottom: 4px solid #000;
        }

        .kop-table { width: 100%; }
        .kop-table td { vertical-align: middle; }
        .logo { width: 80px; }

        .instansi { text-align: center; }
        .instansi h3, .instansi h4, .instansi p { margin: 2px 0; }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9px;
        }

        th, td {
            /* border: 1px solid #000; */
            padding: 4px;
            vertical-align: top;
            word-break: break-word;
        }

        th {
            background: #f2f2f2;
        }

        thead { display: table-header-group; }
        tr { page-break-inside: avoid; }

        /* WATERMARK */
        .watermark {
            position: fixed;
            top: 35%;
            left: 10%;
            width: 80%;
            text-align: center;
            opacity: 0.08;
            font-size: 80px;
            transform: rotate(-30deg);
            z-index: -1000;
            color: #000;
        }
    </style>
</head>
<body>
    <!-- KOP SURAT -->
    <div class="watermark">
    DOKUMEN RESMI
    </div>

    <header>
        <table class="kop-table">
            <tr>
                <td style="width:100px;">
                    @php
                        $path = public_path('assets/img/pa.png');
                        $base64 = null;

                        if (file_exists($path)) {
                            $type = pathinfo($path, PATHINFO_EXTENSION);
                            $dataImg = file_get_contents($path);
                            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($dataImg);
                        }
                    @endphp

                    @if($base64)
                        <img src="{{ $base64 }}" class="logo">
                    @endif
                </td>

                <td class="instansi">
                    <h3>PENGADILAN TINGGI AGAMA MANADO</h3>
                    <h4>PENGADILAN AGAMA BITUNG</h4>
                    <p>Jl. Stadion Dua Saudara, Kel. Manembo-nembo, Kec. Matuari</p>
                    <p>Kota Bitung, Sulawesi Utara, 95545</p>
                    <p>Telp: (0438) 35566</p>
                </td>

                <td style="width:150px;">
                    <p><strong>Filter Digunakan:</strong></p>
                    @if($request->kuasa_hukum)
                        <p>Kuasa Hukum : {{ $request->kuasa_hukum }}</p>
                    @endif
        
                    @if($request->jenis)
                        <p>Jenis Perkara : {{ $request->jenis }}</p>
                    @endif
                </td>
            </tr>
        </table>
    </header>

    <!-- JUDUL -->
    <h2 style="text-align:center">
        {{ $judul }}
    </h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Pendaftaran</th>
                <th>No. Perkara</th>
                <th>Jenis</th>
                <th>Pemohon</th>
                <th>Tergugat</th>
                <th>Kuasa Hukum</th>
                <th>Lokasi Pemohon</th>
                <th>Lokasi Tergugat</th>
                <th>Email Pemohon</th>
                <th>Email Tergugat</th>
                <th>Keterangan</th>
                <th>Jenis Hakim</th>
                <th>Hakim Tunggal</th>
                <th>Jadwal Sidang</th>
                <th>Panitera</th>
                <th>Juru Sita</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $i => $row)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ \Carbon\Carbon::parse($row->tanggal_pendaftaran)
                    ->locale('id')
                    ->translatedFormat('d F Y') }}</td>
                <td>{{ $row->noperkara }}</td>
                <td>{{ $row->jenis }}</td>
                <td>{{ $row->pemohon }}</td>
                <td>{{ $row->tergugat }}</td>
                <td>{{ $row->kuasa_hukum }}</td>
                <td>{{ $row->lokasi_pemohon }}</td>
                <td>{{ $row->lokasi_tergugat }}</td>
                <td>{{ $row->email_pemohon }}</td>
                <td>{{ $row->email_tergugat ?? '-' }}</td>
                <td>{{ $row->keterangan }}</td>
                <td>{{ $row->jenis_hakim_text }}</td>
                <td>{{ $row->hakim_tunggal_name }}</td>
                <td>{{ \Carbon\Carbon::parse($row->jadwal)
                    ->locale('id')
                    ->translatedFormat('d F Y') }}</td>
                <td>{{ $row->panitera_pengganti_name }}</td>
                <td>{{ $row->juru_sita_name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">
        Total Data: {{ $total }} Perkara
    </div>

    @php
    $printedAt = "Dicetak pada: " . 
        \Carbon\Carbon::now('Asia/Makassar')
        ->locale('id')
        ->translatedFormat('d F Y H:i') . 
        " WITA | Pengadilan Agama Bitung";
    @endphp

    <script type="text/php">
    if (isset($pdf)) {

        $font = $fontMetrics->get_font("DejaVu Sans", "normal");
        $size = 9;

        // Posisi bawah (landscape A4)
        $y = 570;

        // Kiri bawah (tanggal cetak)
        $pdf->page_text(
            40,
            $y,
            "Dicetak pada: {{ date('d-m-Y H:i') }} | Pengadilan Agama Bitung",
            $font,
            $size
        );

        // Kanan bawah (nomor halaman)
        $pdf->page_text(
            760,
            $y,
            "Halaman {PAGE_NUM} dari {PAGE_COUNT}",
            $font,
            $size
        );
    }
    </script>
</body>
</html>

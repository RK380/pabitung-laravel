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
                        <img src="assets/img/pa.png" class="logo">
                </td>

                <td class="instansi">
                    <h3>PENGADILAN TINGGI AGAMA MANADO</h3>
                    <h4>PENGADILAN AGAMA BITUNG</h4>
                    <p>Jl. Stadion 2 Saudara No.Kel, Manembo-nembo Tengah</p>
                    <p>Kota Bitung, Sulawesi Utara</p>
                    <p>Telp: (0438) 35566</p>
                </td>

                <td style="width:150px;">
                    <p><strong>Filter Digunakan:</strong></p>
                    @if($namaPanitera)
                        <p>Nama Panitera : {{ $namaPanitera }}</p>
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
                <th>Tanggal</th>
                <th>Nomor</th>
                <th>Panitera</th>
                <th>Tanda Tangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal)
                    ->locale('id')
                    ->translatedFormat('d F Y') }}</td>
                <td>{{ $item->nomor }}</td>
                <td>{{ $item->panitera_pengganti_name }}</td>
                <td>
                    @if($item->tanda_tangan)

                        @php
                            $pathTtd = public_path($item->tanda_tangan);
                            $base64Ttd = null;

                            if (file_exists($pathTtd)) {
                                $type = pathinfo($pathTtd, PATHINFO_EXTENSION);
                                $dataImg = file_get_contents($pathTtd);
                                $base64Ttd = 'data:image/' . $type . ';base64,' . base64_encode($dataImg);
                            }
                        @endphp

                        @if($base64Ttd)
                            <img src="{{ $base64Ttd }}" style="width:100px;height:auto;">
                        @else
                            File tidak ditemukan
                        @endif

                    @else
                        Tidak ada
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">
        Total Data: {{ $total }} Berkas Perkara
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

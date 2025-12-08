<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Daftar Hadir</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            table-layout: fixed;
            word-wrap: break-word;
            page-break-inside: auto;
            font-size: 10px;
        }

        th, td {
            padding: 4px;
            text-align: left;
            vertical-align: top;
            word-break: break-word;
        }

        th {
            background: #f2f2f2;
        }

        h2 { text-align: center; margin-top: 5px; }

        .kop { border-bottom: 3px solid #000; padding-bottom: 10px; margin-bottom: 20px; }
        .kop-table { width: 100%; }
        .kop-table td { vertical-align: middle; }
        .logo { width: 80px; }
        .instansi { text-align: center; }
        .instansi h3, .instansi h4, .instansi p { margin: 2px 0; }

        /* Lebar kolom tertentu */
        th:nth-child(2), td:nth-child(2) { width: 80px; }   /* Tanggal */
        th:nth-child(6), td:nth-child(6) { width: 120px; }  /* Nomor Perkara */
        th:nth-child(7), td:nth-child(7) { width: 120px; }  /* Jenis Perkara */
        th:nth-child(8), td:nth-child(8) { width: 120px; }  /* Penggugat/Pemohon */
        th:nth-child(9), td:nth-child(9) { width: 120px; }  /* Tergugat/Termohon */
        th:nth-child(10), td:nth-child(10) { width: 120px; }/* Tanda Tangan */

        /* Agar tabel lanjut ke halaman baru */
        thead { display: table-header-group; }
        tfoot { display: table-row-group; }
        tr { page-break-inside: avoid; }
    </style>
</head>
<body>
    <!-- KOP SURAT -->
    <div class="kop">
        <table class="kop-table">
            <tr>
                <td style="width: 100px;">
                    <img src="{{ public_path('assets/img/pa.png') }}" class="logo">
                </td>
                <td class="instansi">
                    <h3>PENGADILAN TINGGI AGAMA MANADO</h3>
                    <h4>PENGADILAN AGAMA BITUNG</h4>
                    <p> Jl. Stadion 2 Saudara No.Kel, Manembo-nembo Tengah, Kec. Matuari, Kota Bitung, Sulawesi Utara</p>
                    <p>Telp: (0438) 35566</p>
                </td>
                <td style="width: 100px;"></td>
            </tr>
        </table>
    </div>

    <!-- JUDUL -->
    <h2>Laporan Monitoring Mediasi Pengadilan Agama Bitung</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nomor Perkara</th>
                <th>Jenis Perkara</th>
                <th>Penggugat/Pemohon</th>
                <th>Tergugat/Termohon</th>
                <th>Tanda Tangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $i => $row)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $row->tanggal }}</td>
                <td>{{ $row->nomor }}</td>
                <td>{{ $row->jenis_perkara }}</td>
                <td>{{ $row->penggugat }}</td>
                <td>{{ $row->tergugat }}</td>
                <td>
                    @if($row->tanda_tangan)
                        <img src="{{ asset($row->tanda_tangan) }}" alt="TTD" style="width:100px;">
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @php
    $printedAt = "Dicetak pada: " . date("d-m-Y H:i") . " | Pengadilan Agama Bitung";
    @endphp

    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("DejaVu Sans", "normal");
                $size = 10;

                // Tanggal cetak & instansi (kiri bawah)
                $printedText = "'.$printedAt.'";
                $y = 580;   // karena landscape, posisinya lebih rendah
                $pdf->text(50, $y, $printedText, $font, $size);

                // Nomor halaman (kanan bawah)
                $pageText = "Halaman " . $PAGE_NUM . " dari " . $PAGE_COUNT;
                $pdf->text(750, $y, $pageText, $font, $size);
            ');
        }
    </script>
</body>
</html>

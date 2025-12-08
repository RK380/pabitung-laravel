<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Pendistribusian Berkas</title>
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
        th:nth-child(6), td:nth-child(6) { width: 120px; }  /* Nomor */
        th:nth-child(7), td:nth-child(7) { width: 120px; }  /* Panitera */
        th:nth-child(8), td:nth-child(8) { width: 120px; }  /* Tanda Tangan */


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

    <h2 style="text-align:center;">Laporan Pendistribusian Berkas Perkara Pengadilan Agama Bitung</h2>
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
                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                <td>{{ $item->nomor }}</td>
                <td>{{ $item->panitera_pengganti_name }}</td>
                <td>
                    @if($item->tanda_tangan)
                        <img style="width:100px;height:50px;" src="{{ $item->tanda_tangan }}" class="signature">
                    @else
                        Tidak ada
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePerkaraRequest;
use App\Models\BerkasPerkara;
use App\Models\Perkara;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class PerkaraController extends Controller
{
    public function store(StorePerkaraRequest $request)
    {
        try {
            Perkara::create([
                'jenis' => $request->jenis,
                'noperkara' => $request->noperkara,
                'pemohon' => $request->pemohon,
                'pemohoni' => $request->pemohoni,
                'pemohoniii' => $request->pemohoniii,
                'pemohoniv' => $request->pemohoniv,
                'tergugat' => $request->tergugat,
                'kuasa_hukum' => $request->kuasa_hukum_status == '1' ? $request->kuasa_hukum : '-',
                'lokasi_pemohon' => $request->lokasipemohon,
                'lokasi_tergugat' => $request->lokasitergugat,
                'email_pemohon' => $request->emailpemohon,
                'email_pemohonii' => $request->emailpemohonii,
                'email_pemohoniii' => $request->emailpemohoniii,
                'email_pemohoniv' => $request->emailpemohoniv,
                'email_tergugat' => $request->emailtergugat ?? null,
                'keterangan' => $request->keterangan,
                'tanggal_pendaftaran' => $request->tanggal_pendaftaran,
                'jenisHakim' => null,
                'majelisHakim' => null,
                'hakimTunggal' => null,
                'jadwal' => null,
                'paniteraPengganti' => null,
                'juruSita' => null,
            ]);
        } catch (Exception $e) {
            Log::error('Failed to create Perkara in store: '.$e->getMessage());

            return redirect()->back()->with('error', 'Gagal menyimpan data.')->withInput();
        }

        $noperkara = $request->noperkara;
        $link = route('hakim', ['nomor' => $noperkara]);
        $pesan = "Silahkan kunjungi halaman {$link}";
        $pesan_encode = urlencode($pesan);
        $wa_hakim = config('app.wa_hakim');
        $wa_ketua = config('app.wa_ketua');
        $link_wa_hakim = "https://wa.me/{$wa_hakim}?text={$pesan_encode}";
        $link_wa_ketua = "https://wa.me/{$wa_ketua}?text={$pesan_encode}";

        return redirect()->route('operator', [
            'wa_link' => base64_encode($link_wa_hakim),
            'wa_ketua_link' => base64_encode($link_wa_ketua),
        ])
            ->with('success', 'Data berhasil disimpan & link terkirim ke WA hakim dan ketua.');
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function show()
    {
        $data = Perkara::all();

        // return dd($data);
        return view('halaman.operatorshow', compact('data'));
    }

    public function edit(string $id)
    {
        $data = Perkara::findorfail($id);

        return view('halaman.hakimedit', compact('data'));
    }

    public function edit2(string $id)
    {
        $data = Perkara::findorfail($id);

        return view('halaman.hakimedit2', compact('data'));
    }
    
    public function editpanitera(string $id)
    {
        $data = Perkara::findorfail($id);

        return view('halaman.paniteraedit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        // Validasi input
        $request->validate([
            'jenisHakim' => 'required',
            'hakimTunggal' => 'required_if:jenisHakim,2|string|max:255',
            //'jadwal' => 'required|date',
        ], [
            'jenisHakim.required' => 'Penunjukkan Majelis Hakim wajib diisi.',
            'hakimTunggal.required_if' => 'Nama Hakim Tunggal wajib diisi jika memilih Hakim Tunggal.',
            //'jadwal.required' => 'Jadwal sidang wajib diisi.',
            //'jadwal.date' => 'Format jadwal sidang tidak valid.',
        ]);

        // Ambil data berdasarkan ID
        // $perkara = Perkara::findOrFail($id);
        $perkara = Perkara::find($id);
        if (! $perkara) {
            return redirect()->back()->withErrors('Data tidak ditemukan');
        }

        // Update data
        $perkara->update([
            'jenisHakim' => $request->jenisHakim,
            'majelisHakim' => $request->jenisHakim == 1 ? '1,2,3' : null,
            'hakimTunggal' => $request->jenisHakim == 2 ? $request->hakimTunggal : null,
            //'jadwal' => date('Y-m-d', strtotime($request->jadwal)),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('hakim')->with('success', 'Data berhasil diperbarui.');
    }

    public function update2(Request $request, $id)
    {
        // dd($request->all());
        // Validasi input
        $request->validate([
            'jenisHakim' => 'required',
            'hakimTunggal' => 'required_if:jenisHakim,2|string|max:255',
            'jadwal' => 'required|date',
        ], [
            'jenisHakim.required' => 'Penunjukkan Majelis Hakim wajib diisi.',
            'hakimTunggal.required_if' => 'Nama Hakim Tunggal wajib diisi jika memilih Hakim Tunggal.',
            'jadwal.required' => 'Jadwal sidang wajib diisi.',
            'jadwal.date' => 'Format jadwal sidang tidak valid.',
        ]);

        // Ambil data berdasarkan ID
        // $perkara = Perkara::findOrFail($id);
        $perkara = Perkara::find($id);
        if (! $perkara) {
            return redirect()->back()->withErrors('Data tidak ditemukan');
        }

        // Update data
        $perkara->update([
            'jenisHakim' => $request->jenisHakim,
            'majelisHakim' => $request->jenisHakim == 1 ? '1,2,3' : null,
            'hakimTunggal' => $request->jenisHakim == 2 ? $request->hakimTunggal : null,
            'jadwal' => date('Y-m-d', strtotime($request->jadwal)),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('hakim2')->with('success', 'Data berhasil diperbarui.');
    }

    public function updatepanitera(Request $request, $id)
    {
        // dd($request->all());
        // Validasi input
        $request->validate([
            'paniteraPengganti' => 'required',
            'juruSita' => 'required',
        ]);

        // Ambil data berdasarkan ID
        // $perkara = Perkara::findOrFail($id);
        $perkara = Perkara::find($id);
        if (! $perkara) {
            return redirect()->back()->withErrors('Data tidak ditemukan');
        }
        // dd('a');

        // Update data
        $perkara->update([
            'paniteraPengganti' => $request->paniteraPengganti,
            'juruSita' => $request->juruSita,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('panitera')->with('success', 'Data berhasil diperbarui.');
    }

    public function downloadPdf(Request $request)
    {
        $request->validate([
        'bulan' => 'required|numeric|min:1|max:12',
        'tahun' => 'required|numeric',
        'kuasa_hukum' => 'nullable|string',
        'jenis' => 'nullable|string',
        ]);

        $query = Perkara::query();

        // Filter berdasarkan tanggal_pendaftaran (range bulanan)
        $bulan = (int) $request->bulan;
        $tahun = (int) $request->tahun;

        $start = Carbon::createFromDate($tahun, $bulan, 1)->startOfMonth();
        $end   = Carbon::createFromDate($tahun, $bulan, 1)->endOfMonth();

        $query->whereBetween('tanggal_pendaftaran', [$start, $end]);

        // 🔹 FILTER NAMA KUASA HUKUM
        if ($request->filled('kuasa_hukum')) {
            $query->where('kuasa_hukum', 'like', '%' . $request->kuasa_hukum . '%');
        }

        // 🔹 FILTER JENIS PERKARA
        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        $data = $query->get();

        $namaBulan = Carbon::createFromDate($tahun, $bulan, 1)
        ->locale('id')
        ->translatedFormat('F');

        $tahun = $request->tahun;

        $judul = mb_strtoupper(
            "Laporan Monitoring Data Perkara Pengadilan Agama Bitung Bulan {$namaBulan} {$tahun}",
            'UTF-8'
        );
        $total = $data->count();

        $namaFile = 'laporan-perkara-' . strtoupper($namaBulan) . '-' . $tahun . '.pdf';

        $pdf = Pdf::loadView('perkara.report', compact(
        'data',
        'judul',
        'total',
        'request' // kirim request ke view agar filter tampil
        ))
            ->setPaper('a4', 'landscape')
            ->setOptions(['isPhpEnabled' => true]);

        return $pdf->download($namaFile);
    }

    public function downloadPdfPen(Request $request)
    {
        // Ambil semua data pendistribusian
        // $data = BerkasPerkara::all();
        $request->validate([
        'bulan' => 'required|numeric|min:1|max:12',
        'tahun' => 'required|numeric',
        'paniteraPengganti' => 'nullable|string',
        ]);

        $query = BerkasPerkara::query();

        // Filter berdasarkan tanggal
        $bulan = (int) $request->bulan;
        $tahun = (int) $request->tahun;

        $start = Carbon::createFromDate($tahun, $bulan, 1)->startOfMonth();
        $end   = Carbon::createFromDate($tahun, $bulan, 1)->endOfMonth();

        $query->whereBetween('tanggal', [$start, $end]);

        // 🔹 FILTER NAMA PANITERA/PANITERA MUDA/PANITERA PENGGANTI
        if ($request->filled('paniteraPengganti')) {
            $query->where('paniteraPengganti', $request->paniteraPengganti);
        }

        $data = $query->get();

        $namaBulan = Carbon::createFromDate($tahun, $bulan, 1)
        ->locale('id')
        ->translatedFormat('F');

        $tahun = $request->tahun;

        $judul = mb_strtoupper(
            "Laporan Pendistribusian Berkas Perkara Pengadilan Agama Bitung Bulan {$namaBulan} {$tahun}",
            'UTF-8'
        );
        $total = $data->count();

        $namaFile = 'laporan-pendistribusian-berkas-perkara-' . strtoupper($namaBulan) . '-' . $tahun . '.pdf';

        $pdf = Pdf::loadView('pdf.pendistribusian', compact(
        'data',
        'judul',
        'total',
        'request' // kirim request ke view agar filter tampil
        ))
            ->setPaper('a4', 'landscape')
            ->setOptions(['isPhpEnabled' => true]);

        return $pdf->download($namaFile);
    }

    public function destroy(string $id)
    {
        $perkara = Perkara::findOrFail($id);

        $perkara->delete();

        return redirect()->route('operator')->with('success', 'Data berhasil dihapus.');
    }
}

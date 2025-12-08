<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePerkaraRequest;
use App\Models\BerkasPerkara;
use App\Models\Perkara;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        return redirect()->route('hakim')->with('success', 'Data berhasil diperbarui.');
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
        $query = Perkara::query();

        // Filter tahunan
        if ($request->filled('tahun')) {
            $query->whereYear('jadwal', $request->tahun);
        }

        // Filter bulanan
        if ($request->filled('bulan')) {
            $query->whereMonth('jadwal', $request->bulan);
        }

        // Filter jenis perkara
        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        // Filter kuasa hukum
        if ($request->filled('kuasa_hukum')) {
            $query->where('kuasa_hukum', 'LIKE', "%{$request->kuasa_hukum}%");
        }

        // Filter hakim
        if ($request->filled('hakimTunggal')) {
            $query->where('hakimTunggal', $request->hakimTunggal);
        }

        if ($request->filled('jenisHakim')) {
            $query->where('jenisHakim', $request->jenisHakim);
        }

        // Filter panitera
        if ($request->filled('paniteraPengganti')) {
            $query->where('paniteraPengganti', $request->paniteraPengganti);
        }

        // Filter jurusita
        if ($request->filled('juruSita')) {
            $query->where('juruSita', $request->juruSita);
        }

        $data = $query->get([
            'jenis',
            'noperkara',
            'pemohon',
            'pemohoni',
            'pemohoniii',
            'pemohoniv',
            'tergugat',
            'kuasa_hukum',
            'lokasi_pemohon',
            'lokasi_tergugat',
            'email_pemohon',
            'email_pemohonii',
            'email_pemohoniii',
            'email_pemohoniv',
            'email_tergugat',
            'keterangan',
            'tanggal_pendaftaran',
            'jenisHakim',
            'hakimTunggal',
            'jadwal',
            'paniteraPengganti',
            'juruSita',
        ]);

        $pdf = Pdf::loadView('perkara.report', compact('data'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan-perkara.pdf');
    }

    public function downloadPdfPen(Request $request)
    {
        // Ambil semua data pendistribusian
        // $data = BerkasPerkara::all();
        $query = BerkasPerkara::query();

        // Filter tahunan
        if ($request->filled('tahun')) {
            $query->whereYear('tanggal', $request->tahun);
        }

        // Filter bulanan
        if ($request->filled('bulan')) {
            $query->whereMonth('tanggal', $request->bulan);
        }

        // Filter panitera
        if ($request->filled('panitera')) {
            $query->where('panitera', $request->panitera);
        }

        $data = $query->get([
            'tanggal',
            'nomor',
            'panitera',
            'tanda_tangan',
        ]);

        // Generate PDF
        $pdf = Pdf::loadView('pdf.pendistribusian', compact('data'))
            ->setPaper('A4', 'portrait');

        return $pdf->download('pendistribusian-berkas.pdf');
    }

    public function destroy(string $id)
    {
        $perkara = Perkara::findOrFail($id);

        $perkara->delete();

        return redirect()->route('operator')->with('success', 'Data berhasil dihapus.');
    }
}

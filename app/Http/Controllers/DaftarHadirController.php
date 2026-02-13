<?php

namespace App\Http\Controllers;

use App\Models\DaftarHadir;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DaftarHadirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('halaman.daftarhadir');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all);
        $request->validate([
            'tanggal' => 'required|date',
            'nomor' => 'required|string',
            'jenis_perkara' => 'required|string',
            'penggugat' => 'required|string',
            'kuasa_hukum_pemohon' => 'required|string',
            'tergugat' => 'required|string',
            'kuasa_hukum_tergugat' => 'required|string',
            'tanda_tangan' => 'nullable|string',
        ]);

        $path = null;

        if ($request->tanda_tangan) {
            // ambil data base64
            $image = $request->tanda_tangan;
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = 'ttd_'.time().'.png';

            // simpan ke storage/app/public/ttd
            Storage::disk('public')->put('ttd/'.$imageName, base64_decode($image));

            // simpan path untuk database
            $path = "ttd/{$imageName}";
        }

        DaftarHadir::create([
            'tanggal' => $request->tanggal,
            'nomor' => $request->nomor,
            'jenis_perkara' => $request->jenis_perkara,
            'penggugat' => $request->penggugat,
            'kuasa_hukum_pemohon' => $request->kuasa_hukum_pemohon,
            'tergugat' => $request->tergugat,
            'kuasa_hukum_tergugat' => $request->kuasa_hukum_tergugat,
            'tanda_tangan' => $path, // simpan path file
        ]);

        return redirect()->route('daftarhadir.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data = DaftarHadir::all();

        // return dd($data);
        return view('halaman.daftarhadirshow', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function downloadPdfHad(Request $request)
    {
        $query = DaftarHadir::query();

        // Filter tahunan
        if ($request->filled('tahun')) {
            $query->whereYear('tanggal', $request->tahun);
        }

        // Filter bulanan
        if ($request->filled('bulan')) {
            $query->whereMonth('tanggal', $request->bulan);
        }

        // Filter jenis perkara
        if ($request->filled('jenis_perkara')) {
            $query->where('jenis_perkara', $request->jenis_perkara);
        }

        $data = $query->get([
            'tanggal',
            'jenis_perkara',
            'nomor',
            'penggugat',
            'tergugat',
            'tanda_tangan',
        ]);

        $pdf = Pdf::loadView('daftarhadir.laporan', compact('data'))
            ->setPaper('a4', 'potrait');

        return $pdf->download('laporan-daftar-hadir.pdf');
    }
}

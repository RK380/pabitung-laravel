<?php

namespace App\Http\Controllers;

use App\Models\BerkasPerkara;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BerkasPerkaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BerkasPerkara::latest()->get();
        return view('berkas.index', compact('data'));
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
            'nomor'   => 'required|string',
            'panitera'=> 'required|string',
            'tanda_tangan' => 'nullable|string'
        ]);

        // BerkasPerkara::create($request->all());
         $path = null;

    if ($request->tanda_tangan) {
        // ambil data base64
        $image = $request->tanda_tangan;
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = 'ttd_' . time() . '.png';

        // simpan ke storage/app/public/ttd
        \Storage::disk('public')->put('ttd/' . $imageName, base64_decode($image));

        // simpan path untuk database
        $path = 'storage/ttd/' . $imageName;
    }

    BerkasPerkara::create([
        'tanggal' => $request->tanggal,
        'nomor'   => $request->nomor,
        'panitera'=> $request->panitera,
        'tanda_tangan' => $path, // simpan path file
    ]);

        return redirect()->route('berkas.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('berkas.edit', compact('berkas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BerkasPerkara $berkas)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nomor'   => 'required|string',
            'panitera'=> 'required|string',
            'tanda_tangan' => 'required|string'
        ]);

        $berkas->update($request->all());

        return redirect()->route('berkas.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $berkas = BerkasPerkara::findOrFail($id);

        // hapus file ttd juga kalau ada
        if ($berkas->tanda_tangan && file_exists(public_path($berkas->tanda_tangan))) {
            unlink(public_path($berkas->tanda_tangan));
        }

        $berkas->delete();

        return redirect()->route('berkas.index')->with('success', 'Data berhasil dihapus.');
    }
}

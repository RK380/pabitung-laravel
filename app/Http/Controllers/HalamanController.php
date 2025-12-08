<?php

namespace App\Http\Controllers;

use App\Models\Perkara;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function index(){
        return view ('halaman.index');
    }

    public function hakim(Request $request){
        $nomor = $request->nomor ?? null;
        $data = Perkara::when($nomor, function($query, $nomor) {
            $query->where('noperkara', $nomor);
        })->latest()->get();

        return view('halaman.hakim', compact('data', 'nomor'));
    }

    public function panitera(){
        $nomor = $request->nomor ?? null;
        $data = Perkara::when($nomor, function($query, $nomor) {
            $query->where('noperkara', $nomor);
        })->latest()->get();
        return view('halaman.panitera', compact('data', 'nomor'));
    }

    public function pendistribusian(){
        return view('halaman.pendistribusian');
    }

    public function operator(){
        $link_wa = null;
        if(session('link_wa')){
            $link_wa = session('link_wa');
            //unset session
            session()->forget('link_wa');
        }

        return view('halaman.operator', compact('link_wa'));
    }

}

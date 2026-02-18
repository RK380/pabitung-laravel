<?php

namespace App\Http\Controllers;

use App\Models\Perkara;
use Illuminate\Support\Facades\DB;
use App\Models\Visitor;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function index(){
        $today = Visitor::whereDate('created_at', Carbon::today())->count();
        $thisWeek = Visitor::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();
        $thisMonth = Visitor::whereMonth('created_at', Carbon::now()->month)
                            ->whereYear('created_at', Carbon::now()->year)
                            ->count();
        $thisYear = Visitor::whereYear('created_at', Carbon::now()->year)->count();
        $total = Visitor::count();
        return view ('halaman.index', compact('today', 'thisWeek', 'thisMonth', 'thisYear', 'total'));
    }

    public function hakim(Request $request){
        $today = Visitor::whereDate('created_at', Carbon::today())->count();
        $thisWeek = Visitor::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();
        $thisMonth = Visitor::whereMonth('created_at', Carbon::now()->month)
                            ->whereYear('created_at', Carbon::now()->year)
                            ->count();
        $thisYear = Visitor::whereYear('created_at', Carbon::now()->year)->count();
        $total = Visitor::count();

        $nomor = $request->nomor ?? null;
        $data = Perkara::when($nomor, function($query, $nomor) {
            $query->where('noperkara', $nomor);
        })->latest()->get();

        return view('halaman.hakim', compact('data', 'nomor', 'today', 'thisWeek', 'thisMonth', 'thisYear', 'total'));
    }

    public function hakim2(Request $request){
        $today = Visitor::whereDate('created_at', Carbon::today())->count();
        $thisWeek = Visitor::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();
        $thisMonth = Visitor::whereMonth('created_at', Carbon::now()->month)
                            ->whereYear('created_at', Carbon::now()->year)
                            ->count();
        $thisYear = Visitor::whereYear('created_at', Carbon::now()->year)->count();
        $total = Visitor::count();

        return view('halaman.hakim2', compact('today', 'thisWeek', 'thisMonth', 'thisYear', 'total'));
    }

    public function panitera(){
        $today = Visitor::whereDate('created_at', Carbon::today())->count();
        $thisWeek = Visitor::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();
        $thisMonth = Visitor::whereMonth('created_at', Carbon::now()->month)
                            ->whereYear('created_at', Carbon::now()->year)
                            ->count();
        $thisYear = Visitor::whereYear('created_at', Carbon::now()->year)->count();
        $total = Visitor::count();

        $nomor = $request->nomor ?? null;
        $data = Perkara::when($nomor, function($query, $nomor) {
            $query->where('noperkara', $nomor);
        })->latest()->get();
        return view('halaman.panitera', compact('data', 'nomor', 'today', 'thisWeek', 'thisMonth', 'thisYear', 'total'));
    }

    public function pendistribusian(){
        $today = Visitor::whereDate('created_at', Carbon::today())->count();
        $thisWeek = Visitor::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();
        $thisMonth = Visitor::whereMonth('created_at', Carbon::now()->month)
                            ->whereYear('created_at', Carbon::now()->year)
                            ->count();
        $thisYear = Visitor::whereYear('created_at', Carbon::now()->year)->count();
        $total = Visitor::count();

        return view('halaman.pendistribusian', compact('today', 'thisWeek', 'thisMonth', 'thisYear', 'total'));
    }

    public function operator(){
        $today = Visitor::whereDate('created_at', Carbon::today())->count();
        $thisWeek = Visitor::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();
        $thisMonth = Visitor::whereMonth('created_at', Carbon::now()->month)
                            ->whereYear('created_at', Carbon::now()->year)
                            ->count();
        $thisYear = Visitor::whereYear('created_at', Carbon::now()->year)->count();
        $total = Visitor::count();

        $link_wa = null;
        if(session('link_wa')){
            $link_wa = session('link_wa');
            //unset session
            session()->forget('link_wa');
        }

        return view('halaman.operator', compact('link_wa', 'today', 'thisWeek', 'thisMonth', 'thisYear', 'total'));
    }

}

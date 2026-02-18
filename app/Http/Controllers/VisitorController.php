<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor; 
use Carbon\Carbon;

class VisitorController extends Controller
{
    public function index ()
    {
        $today = Visitor::whereDate('created_at', Carbon::today())->count();
        $thisWeek = Visitor::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $thisMonth = Visitor::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->count();
        $thisYear = Visitor::whereYear('created_at', Carbon::now()->year)->count();
        $total = Visitor::count();

        return view('halaman.index', compact('today', 'thisWeek', 'thisMonth', 'thisYear', 'total'));
    }
}

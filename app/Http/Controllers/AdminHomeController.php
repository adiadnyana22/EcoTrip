<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderExplore;
use App\Models\Waste;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminHomeController extends Controller
{
    public function index() {
        $countPendingEcoWaste = Waste::where('status_code', '=', '1')->get()->count();
        $countPendingEcoWisata = Order::where('status_code', '=', '1')->where('date', '>=', Carbon::today())->get()->count();
        $countPendingEcoExplore = OrderExplore::where('status_code', '=', '1')->where('date', '>=', Carbon::today())->get()->count();

        return view('admin.dashboard')
            ->with('pendingEcoWaste', $countPendingEcoWaste)
            ->with('pendingEcoWisata', $countPendingEcoWisata)
            ->with('pendingEcoExplore', $countPendingEcoExplore);
    }
}

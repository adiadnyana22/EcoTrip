<?php

namespace App\Http\Controllers;

use App\Models\CoinUse;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderExplore;
use App\Models\User;
use App\Models\Waste;
use App\Models\WasteImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminWasteController extends Controller
{
    public function wasteListPage() {
        $wastes = Waste::orderBy('status_code', 'asc')->orderBy('created_at', 'desc')->get();

        return view('admin.waste')->with('wastes', $wastes);
    }

    public function wasteDetailPage(Waste $waste) {
        $wasteImages = WasteImage::where('waste_id', '=', $waste->id)->get();
        if($waste->order_type == 'W'){
            $order = Order::where('id', '=', $waste->order_id)->first();
        } else {
            $order = OrderExplore::where('id', '=', $waste->order_id)->first();
        }

        return view('admin.waste-detail')->with('waste', $waste)->with('wasteImages', $wasteImages)->with('order', $order);
    }

    public function wasteConfirmMethod(Waste $waste, Request $request) {
        $validateReq = $request->validate([
            'coin' => 'required|numeric',
        ]);

        if($waste->order_type == 'W'){
            $order = Order::where('id', '=', $waste->order_id)->first();
        } else {
            $order = OrderExplore::where('id', '=', $waste->order_id)->first();
        }

        $user = User::where('id', '=', $waste->user_id)->first();
        $user->coin += $request->coin;
        $user->save();

        $coinHistory = new CoinUse();
        $coinHistory->nominal = $request->coin;
        $coinHistory->type = 1;
        $coinHistory->date = Carbon::now();
        $coinHistory->description = 'EcoWaste untuk tiket '.$order->kode_tiket;
        $coinHistory->user_id = $waste->user_id;
        $coinHistory->save();

        $notification = new Notification();
        $notification->title = "Koin berhasil ditambahkan dari EcoWaste";
        $notification->type = 0;
        $notification->date = Carbon::now();
        $notification->user_id = $waste->user_id;
        $notification->save();

        $waste->status_code = 2;
        $waste->save();

        return redirect()->route('adminWasteDetail', $waste->id);
    }
}

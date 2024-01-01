<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderExplore;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminOrderController extends Controller
{
    public function orderWisataListPage() {
        $orders = Order::orderBy('status_code', 'asc')->orderBy('created_at', 'desc')->get();

        return view('admin.order-wisata')->with('orders', $orders);
    }

    public function orderWisataDetailPage(Order $order) {
        $order = Order::with('customer')->with('user')->where('id', '=', $order->id)->first();
        return view('admin.order-wisata-detail')->with('order', $order);
    }

    public function orderWisataConfirmMethod(Order $order) {
        $notification = new Notification();
        $notification->title = "Transaksi terakhirmu sukses";
        $notification->type = 0;
        $notification->date = Carbon::now();
        $notification->user_id = $order->user->id;
        $notification->save();

        $order->status_code = 2;
        $order->save();

        return redirect()->route('adminOrderWisataDetail', $order->id);
    }

    public function orderExploreListPage() {
        $orders = OrderExplore::orderBy('status_code', 'asc')->orderBy('created_at', 'desc')->get();

        return view('admin.order-explore')->with('orders', $orders);
    }

    public function orderExploreDetailPage(OrderExplore $order) {
        $order = OrderExplore::with('customer')->with('user')->where('id', '=', $order->id)->first();
        return view('admin.order-explore-detail')->with('order', $order);
    }

    public function orderExploreConfirmMethod(OrderExplore $order) {
        $notification = new Notification();
        $notification->title = "Transaksi terakhirmu sukses";
        $notification->type = 0;
        $notification->date = Carbon::now();
        $notification->user_id = $order->user->id;
        $notification->save();

        $order->status_code = 2;
        $order->save();

        return redirect()->route('adminOrderExploreDetail', $order->id);
    }
}

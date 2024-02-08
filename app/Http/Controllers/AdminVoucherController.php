<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminVoucherController extends Controller
{
    public function voucherListPage() {
        $vouchers = Voucher::all();

        return view('admin.voucher')->with('vouchers', $vouchers);
    }

    public function voucherEditPage(Voucher $voucher) {
        return view('admin.voucher-edit')->with('voucher', $voucher);
    }

    public function voucherEditMethod(Voucher $voucher, Request $request) {
        $validateReq = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'percentage' => 'required|numeric|min:1|max:100',
            'max_nominal' => 'required|numeric',
            'min_transaction_nominal' => 'required|numeric',
        ]);

        $voucher->name = $request->name;
        $voucher->description = $request->description;
        $voucher->percentage = $request->percentage;
        $voucher->max_nominal = $request->max_nominal;
        $voucher->min_transaction_nominal = $request->min_transaction_nominal;
        $voucher->save();

        return redirect()->route('adminVoucher');
    }

    public function voucherDeleteMethod(Voucher $voucher) {
        $voucher->delete();

        return redirect()->route('adminVoucher');
    }

    public function voucherAddPage() {
        return view('admin.voucher-add');
    }

    public function voucherAddMethod(Request $request) {
        $validateReq = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'percentage' => 'required|numeric|min:1|max:100',
            'max_nominal' => 'required|numeric',
            'min_transaction_nominal' => 'required|numeric',
        ]);

        $voucher = new Voucher();
        $voucher->name = $request->name;
        $voucher->description = $request->description;
        $voucher->percentage = $request->percentage;
        $voucher->max_nominal = $request->max_nominal;
        $voucher->min_transaction_nominal = $request->min_transaction_nominal;
        $voucher->save();

        $users = User::all();
        foreach ($users as $user) {
            $notification = new Notification();
            $notification->title = "Anda mendapatkan voucher baru";
            $notification->type = 1;
            $notification->date = Carbon::now();
            $notification->user_id = $user->id;
            $notification->save();
        }

        return redirect()->route('adminVoucher');
    }
}

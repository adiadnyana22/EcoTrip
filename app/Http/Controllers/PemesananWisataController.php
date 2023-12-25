<?php

namespace App\Http\Controllers;

use App\Mail\MailClass;
use App\Models\CoinUse;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderCustomerDetail;
use App\Models\User;
use App\Models\Voucher;
use App\Models\VoucherUse;
use App\Models\Wisata;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PemesananWisataController extends Controller
{
    public function mtdPemesananFromDetail(Request $request) {
        $validateReq = $request->validate([
            'wisata_id' => 'required|numeric',
            'date' => 'required',
            'qty' => 'required|numeric',
        ]);

        $wisata = Wisata::where('id', '=', $request->wisata_id)->first();

        Session::put('wisata', $wisata);
        Session::put('date', $request->date);
        Session::put('qty', $request->qty);
        Session::put('transaction', 1);

        return redirect()->route('viewPemesananWisata1');
    }

    public function viewPemesananDataDiri() {
        $wisata = Session::get('wisata');
        $date = Session::get('date');
        $qty = Session::get('qty');

        if(!Session::get('transaction') || !Auth::check()) return redirect()->route('home');

        return view('user.pemesanan_wisata')
            ->with('wisata', $wisata)
            ->with('date', $date)
            ->with('qty', $qty);
    }

    public function mtdPemesananDataDiri(Request $request) {
        if(!Session::get('transaction') || !Auth::check()) return redirect()->route('home');

        $validateReq = $request->validate([
            'wisata_id' => 'required|numeric',
            'date' => 'required',
            'qty' => 'required|numeric',
        ]);

        for ($i = 1; $i <= $request->qty; $i++){
            $validateReq = $request->validate([
                'email'.$i => 'required|email',
                'name'.$i => 'required',
                'telp'.$i => 'required',
                'gender'.$i => 'required|in:M,F',
                'nationality'.$i => 'required|in:0,1',
            ]);
        }

        $wisata = Wisata::where('id', '=', $request->wisata_id)->first();

        $pemesan = array();
        $total_price = 0;
        $date = Session::get('date');

        for ($i = 0; $i < $request->qty; $i++){
            $pemesan[$i] = [
                'email' =>  $request['email'.($i+1)],
                'name' =>  $request['name'.($i+1)],
                'telp' =>  $request['telp'.($i+1)],
                'gender' =>  $request['gender'.($i+1)],
                'nationality' =>  $request['nationality'.($i+1)],
            ];

            $total_price += ($request['nationality'.($i+1)] == 0) ? (Carbon::parse($date)->isWeekend() ? $wisata->local_weekend_price : $wisata->local_price) : (Carbon::parse($date)->isWeekend() ? $wisata->foreign_weekend_price : $wisata->foreign_price);
        }

        Session::put('pemesan', $pemesan);
        Session::put('total_price', $total_price);

        return redirect()->route('viewPemesananWisata2');
    }

    public function viewPemesananConfirm() {
        $wisata = Session::get('wisata');
        $date = Session::get('date');
        $qty = Session::get('qty');
        $pemesan = Session::get('pemesan');
        $total_price = Session::get('total_price');
        $voucher = User::where('id', '=', Auth::user()->id)->first()->unusedVouchers();

        if(!Session::get('transaction') || !Auth::check()) return redirect()->route('home');

        $voucherList = array();
        foreach ($voucher as $vc){
            array_push($voucherList, array("id" => $vc->id, "name" => $vc->name, "description" => $vc->description, "percentage" => $vc->percentage, "max_nominal" => $vc->max_nominal, "actual_disc" => min($vc->percentage/100 * $total_price, $vc->max_nominal)));
        }

        return view('user.pemesanan2_wisata')
            ->with('wisata', $wisata)
            ->with('date', $date)
            ->with('qty', $qty)
            ->with('pemesan', $pemesan)
            ->with('total_price', $total_price)
            ->with('voucher', $voucherList);
    }

    public function mtdPemesananPayment(Request $request) {
        if(!Session::get('transaction') || !Auth::check()) return redirect()->route('home');

        $validateReq = $request->validate([
            'wisata_id' => 'required|numeric',
            'date' => 'required',
            'qty' => 'required|numeric',
        ]);

        $validateReq = $request->validate([
            'useCoin' => 'in:Yes',
            'coin' => 'numeric',
            'voucher' => 'numeric',
            'total_pay' => 'required|numeric',
            'sk' => 'required|in:Yes',
        ]);

        $kode_tiket = 'ECTRP-'.rand(1000000000, 9999999999).str_pad(Session::get('wisata')->id, 3, STR_PAD_LEFT);
        $voucher = Voucher::where('id', '=', $request->voucher)->first();
        $voucherDisc = ($voucher) ? min($voucher->percentage/100 * Session::get('total_price'), $voucher->max_nominal) : 0;
        $kode_unik = "".rand(0, 9).rand(0, 9).rand(0, 9);
        $grand_total = $request->total_pay + (int) $kode_unik;

        $wisata_id = Session::get('wisata')->id;
        $qty = Session::get('qty');
        $date = date('Y-m-d', strtotime(Session::get('date')));
        $total_price = Session::get('total_price');
        $voucher_id = ($request->voucher) ? $request->voucher : 0;
        $voucher_nominal = ($request->voucher) ? $request->voucher_nominal : 0;
        $coin = ($request->useCoin) ? $request->coin : 0;

        if($coin != 0) {
            $useCoin = new CoinUse();
            $useCoin->nominal = $coin;
            $useCoin->type = 0;
            $useCoin->date = Carbon::today();
            $useCoin->description = 'Transaksi pemesanan wisata';
            $useCoin->user_id = Auth::user()->id;
            $useCoin->save();

            $notification = new Notification();
            $notification->title = 'Koin kamu telah berhasil digunakan';
            $notification->type = 2;
            $notification->date = Carbon::now();
            $notification->user_id = Auth::user()->id;
            $notification->save();
        }

        // Add to table Pesanan
        $pesanan = new Order();
        $pesanan->kode_tiket = $kode_tiket;
        $pesanan->wisata_id = $wisata_id;
        $pesanan->user_id = Auth::user()->id;
        $pesanan->qty = $qty;
        $pesanan->date = $date;
        $pesanan->total_ticket_price = $total_price;
        $pesanan->voucher_id = $voucher_id;
        $pesanan->voucher_nominal = $voucher_nominal;
        $pesanan->coin = $coin;
        $pesanan->unique_code = $kode_unik;
        $pesanan->grand_total_price = $grand_total;
        $pesanan->status_code = 1;
        $pesanan->waste_flag = 0;
        $pesanan->qty_indonesia = 0;
        $pesanan->qty_foreign = 0;
        $pesanan->save();

        $pemesanIndo = 0;
        $pemesanForeign = 0;

        // Add to table DataDiriPesanan
        $pemesanAll = Session::get('pemesan');
        foreach ($pemesanAll as $ps) {
            $pemesan = new OrderCustomerDetail();
            $pemesan->name = $ps['name'];
            $pemesan->email = $ps['email'];
            $pemesan->gender = $ps['gender'];
            $pemesan->telp = $ps['telp'];
            $pemesan->nationality = $ps['nationality'];
            $pemesan->order_id = $pesanan->id;
            $pemesan->save();

            if($pemesan->nationality == 0) $pemesanIndo += 1;
            if($pemesan->nationality == 1) $pemesanForeign += 1;
        }

        $pesanan->qty_indonesia = $pemesanIndo;
        $pesanan->qty_foreign = $pemesanForeign;
        $pesanan->save();

        // Kurangi koin & voucher
        if($coin != 0) {
            $user = User::where('id', '=', Auth::user()->id)->first();
            $user->coin = 0;
            $user->save();
        }

        if($voucher_id != 0) {
            $voucherUse = new VoucherUse();
            $voucherUse->user_id = Auth::user()->id;
            $voucherUse->voucher_id = $voucher_id;
            $voucherUse->order_id = $pesanan->id;
            $voucherUse->use_date = $date;
            $voucherUse->save();
        }

        Mail::to($pemesanAll[0]['email'])->send(new MailClass(Session::get('wisata')->name, $kode_tiket, $date, $qty, $grand_total, Carbon::now()));

        // Put to Session
        Session::put('kode_tiket', $kode_tiket);
        Session::put('coin', ($request->useCoin) ? $request->coin : 0);
        Session::put('voucher', ($voucher) ? $voucherDisc : 0);
        Session::put('kode_unik', $kode_unik);
        Session::put('grand_total', $grand_total);

        return redirect()->route('viewPemesananWisata3');
    }

    public function viewPemesananPayment() {
        if(!Session::get('transaction') || !Auth::check()) return redirect()->route('home');

        $wisata = Session::get('wisata');
        $date = Session::get('date');
        $qty = Session::get('qty');
        $total_price = Session::get('total_price');
        $coin = Session::get('coin');
        $voucher = Session::get('voucher');
        $kode_unik = Session::get('kode_unik');
        $grand_total = Session::get('grand_total');
        $kode_tiket = Session::get('kode_tiket');

        Session::forget('transaction');

        return view('user.pemesanan3_wisata')
            ->with('wisata', $wisata)
            ->with('date', $date)
            ->with('qty', $qty)
            ->with('total_price', $total_price)
            ->with('coin', $coin)
            ->with('voucher', $voucher)
            ->with('kode_unik', $kode_unik)
            ->with('grand_total', $grand_total)
            ->with('kode_tiket', $kode_tiket);
    }

    public function viewPesananSuccess() {
        Session::forget('wisata');
        Session::forget('date');
        Session::forget('qty');
        Session::forget('total_price');
        Session::forget('voucher');
        Session::forget('kode_unik');
        Session::forget('grand_total');
        Session::forget('pemesan');
        Session::forget('kode_tiket');

        return view('user.success');
    }
}

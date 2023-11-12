<?php

namespace App\Http\Controllers;

use App\Models\Explore;
use App\Models\MeetingPoint;
use App\Models\OrderExplore;
use App\Models\OrderExploreCustomerDetail;
use App\Models\User;
use App\Models\Voucher;
use App\Models\VoucherUse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PemesananExploreController extends Controller
{
    public function mtdPemesananFromDetail(Request $request) {
        $validateReq = $request->validate([
            'explore_id' => 'required|numeric',
            'date' => 'required',
            'qty' => 'required|numeric',
        ]);

        $explore = Explore::where('id', '=', $request->explore_id)->first();

        Session::put('explore', $explore);
        Session::put('date', $request->date);
        Session::put('qty', $request->qty);
        Session::put('transaction', 1);

        return redirect()->route('viewPemesananExplore1');
    }

    public function viewPemesananDataDiri() {
        $explore = Session::get('explore');
        $date = Session::get('date');
        $qty = Session::get('qty');

        if(!Session::get('transaction') || !Auth::check()) return redirect()->route('home');

        return view('user.pemesanan_explore')
            ->with('explore', $explore)
            ->with('date', $date)
            ->with('qty', $qty);
    }

    public function mtdPemesananDataDiri(Request $request) {
        if(!Session::get('transaction') || !Auth::check()) return redirect()->route('home');

        $validateReq = $request->validate([
            'explore_id' => 'required|numeric',
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

        $explore = Explore::where('id', '=', $request->explore_id)->first();

        $pemesan = array();
        $total_price = 0;

        for ($i = 0; $i < $request->qty; $i++){
            $pemesan[$i] = [
                'email' =>  $request['email'.($i+1)],
                'name' =>  $request['name'.($i+1)],
                'telp' =>  $request['telp'.($i+1)],
                'gender' =>  $request['gender'.($i+1)],
                'nationality' =>  $request['nationality'.($i+1)],
            ];

            $total_price += ($request['nationality'.($i+1)] == 0) ? (Carbon::now()->isWeekend() ? $explore->local_weekend_price : $explore->local_price) : (Carbon::now()->isWeekend() ? $explore->foreign_weekend_price : $explore->foreign_price);
        }

        Session::put('pemesan', $pemesan);
        Session::put('total_price', $total_price);

        return redirect()->route('viewPemesananExplore2');
    }

    public function viewPemesananMeetingPoint() {
        $explore = Session::get('explore');
        $date = Session::get('date');
        $qty = Session::get('qty');
        $meeting_point = MeetingPoint::all();

        if(!Session::get('transaction') || !Auth::check()) return redirect()->route('home');

        $meetingPointList = array();
        foreach ($meeting_point as $mp){
            array_push($meetingPointList, array("id" => $mp->id, "title" => $mp->title, "description" => $mp->description, "mapIframe" => substr($mp->mapIframe, strpos($mp->mapIframe, "\"") + 1, strpos($mp->mapIframe, "\"", strpos($mp->mapIframe, "\"") + 1) - 1 - strpos($mp->mapIframe, "\""))));
        }

        return view('user.pemesanan2_explore')
            ->with('explore', $explore)
            ->with('date', $date)
            ->with('qty', $qty)
            ->with('meeting_point', $meetingPointList);
    }

    public function mtdPemesananMeetingPoint(Request $request) {
        $validateReq = $request->validate([
            'explore_id' => 'required|numeric',
            'date' => 'required',
            'qty' => 'required|numeric',
            'meeting_point_id' => 'required|numeric'
        ]);

        $meeting_point = MeetingPoint::where('id', '=', $request->meeting_point_id)->first();

        Session::put('meeting_point', $meeting_point);

        return redirect()->route('viewPemesananExplore3');
    }

    public function viewPemesananConfirm() {
        $explore = Session::get('explore');
        $date = Session::get('date');
        $qty = Session::get('qty');
        $pemesan = Session::get('pemesan');
        $meeting_point = Session::get('meeting_point');
        $total_price = Session::get('total_price');
        $voucher = User::where('id', '=', Auth::user()->id)->first()->unusedVouchers();

        if(!Session::get('transaction') || !Auth::check()) return redirect()->route('home');

        $voucherList = array();
        foreach ($voucher as $vc){
            array_push($voucherList, array("id" => $vc->id, "name" => $vc->name, "description" => $vc->description, "percentage" => $vc->percentage, "max_nominal" => $vc->max_nominal, "actual_disc" => min($vc->percentage/100 * $total_price, $vc->max_nominal)));
        }

        return view('user.pemesanan3_explore')
            ->with('explore', $explore)
            ->with('date', $date)
            ->with('qty', $qty)
            ->with('pemesan', $pemesan)
            ->with('meeting_point', $meeting_point)
            ->with('total_price', $total_price)
            ->with('voucher', $voucherList);
    }

    public function mtdPemesananPayment(Request $request) {
        if(!Session::get('transaction') || !Auth::check()) return redirect()->route('home');

        $validateReq = $request->validate([
            'explore_id' => 'required|numeric',
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

        $voucher = Voucher::where('id', '=', $request->voucher)->first();
        $voucherDisc = ($voucher) ? min($voucher->percentage/100 * Session::get('total_price'), $voucher->max_nominal) : 0;
        $kode_unik = "".rand(0, 9).rand(0, 9).rand(0, 9);
        $grand_total = $request->total_pay + (int) $kode_unik;

        $explore_id = Session::get('explore')->id;
        $meeting_point_id = Session::get('meeting_point')->id;
        $qty = Session::get('qty');
        $date = date('d-m-y', strtotime(Session::get('date')));
        $total_price = Session::get('total_price');
        $voucher_id = ($request->voucher) ? $request->voucher : 0;
        $coin = ($request->useCoin) ? $request->coin : 0;

        // Add to table Pesanan
        $pesanan = new OrderExplore();
        $pesanan->explore_id = $explore_id;
        $pesanan->user_id = Auth::user()->id;
        $pesanan->meeting_point_id = $meeting_point_id;
        $pesanan->qty = $qty;
        $pesanan->date = $date;
        $pesanan->total_ticket_price = $total_price;
        $pesanan->voucher_id = $voucher_id;
        $pesanan->coin = $coin;
        $pesanan->unique_code = $kode_unik;
        $pesanan->grand_total_price = $grand_total;
        $pesanan->status_code = 1;
        $pesanan->waste_flag = 0;
        $pesanan->save();

        // Add to table DataDiriPesanan
        $pemesan = Session::get('pemesan');
        foreach ($pemesan as $ps) {
            $pemesan = new OrderExploreCustomerDetail();
            $pemesan->name = $ps['name'];
            $pemesan->email = $ps['email'];
            $pemesan->gender = $ps['gender'];
            $pemesan->telp = $ps['telp'];
            $pemesan->nationality = $ps['nationality'];
            $pemesan->order_explore_id = $pesanan->id;
            $pemesan->save();
        }

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

        // Put to Session
        Session::put('coin', ($request->useCoin) ? $request->coin : 0);
        Session::put('voucher', ($voucher) ? $voucherDisc : 0);
        Session::put('kode_unik', $kode_unik);
        Session::put('grand_total', $grand_total);

        return redirect()->route('viewPemesananExplore4');
    }

    public function viewPemesananPayment() {
        if(!Session::get('transaction') || !Auth::check()) return redirect()->route('home');

        $explore = Session::get('explore');
        $date = Session::get('date');
        $qty = Session::get('qty');
        $total_price = Session::get('total_price');
        $coin = Session::get('coin');
        $voucher = Session::get('voucher');
        $kode_unik = Session::get('kode_unik');
        $grand_total = Session::get('grand_total');

        Session::forget('transaction');

        return view('user.pemesanan4_explore')
            ->with('explore', $explore)
            ->with('date', $date)
            ->with('qty', $qty)
            ->with('total_price', $total_price)
            ->with('coin', $coin)
            ->with('voucher', $voucher)
            ->with('kode_unik', $kode_unik)
            ->with('grand_total', $grand_total);
    }

    public function viewPesananSuccess() {
        Session::forget('explore');
        Session::forget('date');
        Session::forget('qty');
        Session::forget('total_price');
        Session::forget('voucher');
        Session::forget('kode_unik');
        Session::forget('grand_total');
        Session::forget('pemesan');
        Session::forget('meeting_point');

        return view('user.success');
    }
}

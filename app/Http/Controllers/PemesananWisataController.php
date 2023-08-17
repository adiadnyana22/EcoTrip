<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use App\Models\Wisata;
use Illuminate\Http\Request;
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

        return redirect()->route('viewPemesananWisata1');
    }

    public function viewPemesananDataDiri() {
        $wisata = Session::get('wisata');
        $date = Session::get('date');
        $qty = Session::get('qty');

        return view('user.pemesanan')
            ->with('wisata', $wisata)
            ->with('date', $date)
            ->with('qty', $qty);
    }

    public function mtdPemesananDataDiri(Request $request) {
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
                'gender'.$i => 'required|in:M,W',
                'nationality'.$i => 'required|in:0,1',
            ]);
        }

        $wisata = Wisata::where('id', '=', $request->wisata_id)->first();

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

            $total_price += ($request['nationality'.($i+1)] == 0) ? $wisata->local_price : $wisata->foreign_price;
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
        $voucher = Voucher::all();

        return view('user.pemesanan2')
            ->with('wisata', $wisata)
            ->with('date', $date)
            ->with('qty', $qty)
            ->with('pemesan', $pemesan)
            ->with('total_price', $total_price)
            ->with('voucher', $voucher);
    }

    public function mtdPemesananPayment(Request $request) {
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

        $kode_unik = "".rand(0, 9).rand(0, 9).rand(0, 9);
        $grand_total = $request->total_pay + $kode_unik;

        // Add to table Pesanan

        // Add to table DataDiriPesanan

        // Put to Session
        Session::put('coin', ($request->useCoin) ? $request->coin : 0);
        Session::put('voucher', ($request->voucher) ? $request->voucher : 0);
        Session::put('kode_unik', $kode_unik);
        Session::put('grand_total', $grand_total);

        return redirect()->route('viewPemesananWisata3');
    }

    public function viewPemesananPayment() {
        $wisata = Session::get('wisata');
        $date = Session::get('date');
        $qty = Session::get('qty');
        $total_price = Session::get('total_price');
        $coin = Session::get('coin');
        $voucher = Session::get('voucher');
        $kode_unik = Session::get('kode_unik');
        $grand_total = Session::get('grand_total');

        return view('user.pemesanan3')
            ->with('wisata', $wisata)
            ->with('date', $date)
            ->with('qty', $qty)
            ->with('total_price', $total_price)
            ->with('coin', $coin)
            ->with('voucher', $voucher)
            ->with('kode_unik', $kode_unik)
            ->with('grand_total', $grand_total);
    }
}

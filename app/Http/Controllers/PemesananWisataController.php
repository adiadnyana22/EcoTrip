<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class PemesananWisataController extends Controller
{
    public function pemesananFromDetail(Request $request) {
        $validateReq = $request->validate([
            'wisata_id' => 'required|numeric',
            'date' => 'required',
            'qty' => 'required|numeric',
        ]);

        $wisata = Wisata::where('id', '=', $request->wisata_id)->first();

        return view('user.pemesanan')
            ->with('wisata', $wisata)
            ->with('date', $request->date)
            ->with('qty', $request->qty);
    }

    public function pemesananFrom1(Request $request) {
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

        return view('user.pemesanan2')
            ->with('wisata', $wisata)
            ->with('date', $request->date)
            ->with('qty', $request->qty)
            ->with('pemesan', $pemesan)
            ->with('total_price', $total_price);
    }
}

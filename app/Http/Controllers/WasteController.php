<?php

namespace App\Http\Controllers;

use App\Models\Explore;
use App\Models\Order;
use App\Models\OrderExplore;
use App\Models\Waste;
use App\Models\WasteImage;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class WasteController extends Controller
{
    public function viewTicketList() {
        if(!Auth::user()) return redirect('/campaign');

        // $hasWasteBefore = Waste::where('user_id', '=', Auth::user()->id)->count();
        // if($hasWasteBefore == 0) return redirect('/campaign');

        // Nanti perlu ada tambahan kondisi status code
        $wisataList = Order::with('wisata')->where([['waste_flag', '=', 0], ['user_id', '=', Auth::user()->id]])->get();
        $exploreList = OrderExplore::with('explore')->where([['waste_flag', '=', 0], ['user_id', '=', Auth::user()->id]])->get();

        return view('user.waste1')
            ->with('wisataList', $wisataList)
            ->with('exploreList', $exploreList);
    }

    public function mtdTicketSelected(Request $request) {
        $validateReq = $request->validate([
            'tiket' => 'required',
        ]);

        Session::put('ticketId', $request->tiket);

        return redirect()->route('viewWaste2');
    }

    public function viewUploadImage() {
        $ticketId = Session::get('ticketId');

        return view('user.waste2')
            ->with('ticketId', $ticketId);
    }

    public function mtdUploadImage(Request $request) {
        $validateReq = $request->validate([
            'ticketId' => 'required',
            'file.*' => 'required'
        ]);

        $filenames = '';
        $files = $request->file('file');
        if($request->hasFile('file')) {
            foreach ($files as $file) {
                $filename = Str::upper(Str::random(16)).'.'.$file->getClientOriginalExtension();
                $file->move('assets/admin/images/waste', $filename);
                $filenames = ($filenames == '') ? $filename : $filenames.';'.$filename;
            }
        }

        Session::put('images', $filenames);

        return redirect()->route('viewWaste3');
    }

    public function viewReview() {
        $ticketId = Session::get('ticketId');
        $images = Session::get('images');

        return view('user.waste3')
            ->with('ticketId', $ticketId)
            ->with('images', $images);
    }

    public function mtdReview(Request $request) {
        $validateReq = $request->validate([
            'ticketId' => 'required',
            'images' => 'required',
            'star' => 'required|between:1,5',
            'review' => 'max:500',
        ]);

        // Tambah data Waste
        $waste = new Waste();
        $waste->order_type = $request->ticketId[0];
        $waste->order_id = $request->ticketId[1];
        $waste->user_id = Auth::user()->id;
        if('W' == $request->ticketId[0]) {
            $order = Order::where('id', '=', $request->ticketId[1])->first();
            $waste->product_id = $order->wisata_id;
        } else if('E' == $request->ticketId[0]) {
            $order = OrderExplore::where('id', '=', $request->ticketId[1])->first();
            $waste->product_id = $order->explore_id;
        }
        $waste->star = $request->star;
        $waste->review = ($request->review == null) ? '' : $request->review;
        $waste->save();

        // Tambah data Waste Image
        $images = explode(';', $request->images);
        for ($i = 0; $i < count($images); $i++) {
            $wasteImage = new WasteImage();
            $wasteImage->waste_id = $waste->id;
            $wasteImage->image = $images[$i];
            $wasteImage->save();
        }

        // Ubah flag waste di tabel transaksi
        if('W' == $request->ticketId[0]) {
            $order = Order::where('id', '=', $request->ticketId[1])->first();
            $order->waste_flag = 1;
            $order->save();

            $wisata = Wisata::where('id', '=', $order->wisata_id)->first();
            $wisata->rating = (($wisata->order * $wisata->rating) + $request->star) / ($wisata->order + 1);
            $wisata->order += 1;
            $wisata->save();
        } else if('E' == $request->ticketId[0]) {
            $order = OrderExplore::where('id', '=', $request->ticketId[1])->first();
            $order->waste_flag = 1;
            $order->save();

            $explore = Explore::where('id', '=', $order->explore_id)->first();
            $explore->rating = (($explore->order * $explore->rating) + $request->star) / ($explore->order + 1);
            $explore->order += 1;
            $explore->save();
        }

        return redirect()->route('wasteSuccess');
    }

    public function viewSuccess() {
        return view('user.success_waste');
    }
}

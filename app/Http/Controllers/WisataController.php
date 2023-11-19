<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\WisataPicture;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function wisataList(Request $request) {
        $search = $request->query('search');

        if($search != null) {
            $wisataList = Wisata::where('name', 'like', '%'.$search.'%')->get();
        } else {
            $wisataList = Wisata::all();
            $search = '';
        }

        return view('user.wisata')
            ->with('wisataList', $wisataList)
            ->with('search', $search);
    }

    public function wisataDetail(Wisata $wisata) {
        $wisataImgList = WisataPicture::where('wisata_id', $wisata->id)->get();

        return view('user.wisata_detail')
            ->with('wisata', $wisata)
            ->with('wisataImgList', $wisataImgList);
    }
}

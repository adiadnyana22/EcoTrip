<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function wisataList() {
        $wisataList = Wisata::all();

        return view('user.wisata')
            ->with('wisataList', $wisataList);
    }
}

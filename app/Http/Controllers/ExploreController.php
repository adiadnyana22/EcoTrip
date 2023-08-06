<?php

namespace App\Http\Controllers;

use App\Models\Explore;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function exploreList() {
        $exploreList = Explore::all();

        return view('user.explore')
            ->with('exploreList', $exploreList);
    }
}

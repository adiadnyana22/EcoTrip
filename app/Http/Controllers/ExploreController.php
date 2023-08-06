<?php

namespace App\Http\Controllers;

use App\Models\Explore;
use App\Models\ExplorePicture;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function exploreList() {
        $exploreList = Explore::all();

        return view('user.explore')
            ->with('exploreList', $exploreList);
    }

    public function exploreDetail(Explore $explore) {
        $exploreImgList = ExplorePicture::where('explore_id', $explore->id)->get();

        return view('user.explore_detail')
            ->with('explore', $explore)
            ->with('exploreImgList', $exploreImgList);
    }
}

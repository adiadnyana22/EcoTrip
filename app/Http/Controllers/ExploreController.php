<?php

namespace App\Http\Controllers;

use App\Models\Explore;
use App\Models\ExplorePicture;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function exploreList(Request $request) {
        $type = $request->query('type');
        $search = $request->query('search');

        if($search != null) {
            if($type == 'private')
                $exploreList = Explore::where('type', '=', 0)->where('name', 'like', '%'.$search.'%')->get();
            else {
                $exploreList = Explore::where('type', '=', 1)->where('name', 'like', '%'.$search.'%')->get();
                $type = 'open';
            }
        } else {
            if($type == 'private')
                $exploreList = Explore::where('type', '=', 0)->get();
            else {
                $exploreList = Explore::where('type', '=', 1)->get();
                $type = 'open';
            }
            $search = '';
        }
            
        return view('user.explore')
            ->with('exploreList', $exploreList)
            ->with('type', $type)
            ->with('search', $search);
    }

    public function exploreDetail(Explore $explore) {
        $exploreImgList = ExplorePicture::where('explore_id', $explore->id)->get();

        return view('user.explore_detail')
            ->with('explore', $explore)
            ->with('exploreImgList', $exploreImgList);
    }
}

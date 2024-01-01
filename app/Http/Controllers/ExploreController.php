<?php

namespace App\Http\Controllers;

use App\Models\Explore;
use App\Models\ExplorePicture;
use App\Models\Waste;
use App\Models\WishlistExplore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $review = Waste::with('user')->where([['order_type', '=', 'E'], ['product_id', '=', $explore->id]])->take(3)->get();

        if(Auth::check()){
            $isWishlist = WishlistExplore::where('user_id', '=', Auth::user()->id)->where('explore_id', '=', $explore->id)->first() ? true : false;
        } else {
            $isWishlist = false;
        }

        return view('user.explore_detail')
            ->with('explore', $explore)
            ->with('exploreImgList', $exploreImgList)
            ->with('review', $review)
            ->with('isWishlist', $isWishlist);
    }

    public function wishlistToggle(Request $request) {
        $exploreId = $request->query('explore_id');

        $explore = Explore::where('id', '=', $exploreId)->first();
        if($explore) {
            $wishlistExplore = WishlistExplore::where('user_id', '=', Auth::user()->id)->where('explore_id', '=', $exploreId)->first();
            
            if($wishlistExplore) {
                $wishlistExplore->delete();
            } else {
                $newWishlistExplore = new WishlistExplore();
                $newWishlistExplore->user_id = Auth::user()->id;
                $newWishlistExplore->explore_id = $exploreId;
                $newWishlistExplore->save();
            }
        }

        return redirect()->route('exploreDetail', $exploreId);
    }
}

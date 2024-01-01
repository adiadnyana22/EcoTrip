<?php

namespace App\Http\Controllers;

use App\Models\Waste;
use App\Models\Wisata;
use App\Models\WisataPicture;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $review = Waste::with('user')->where([['order_type', '=', 'W'], ['product_id', '=', $wisata->id]])->take(3)->get();

        if(Auth::check()){
            $isWishlist = Wishlist::where('user_id', '=', Auth::user()->id)->where('wisata_id', '=', $wisata->id)->first() ? true : false;
        } else {
            $isWishlist = false;
        }

        return view('user.wisata_detail')
            ->with('wisata', $wisata)
            ->with('wisataImgList', $wisataImgList)
            ->with('review', $review)
            ->with('isWishlist', $isWishlist);
    }

    public function wishlistToggle(Request $request) {
        $wisataId = $request->query('wisata_id');

        $wisata = Wisata::where('id', '=', $wisataId)->first();
        if($wisata) {
            $wishlistWisata = Wishlist::where('user_id', '=', Auth::user()->id)->where('wisata_id', '=', $wisataId)->first();
            
            if($wishlistWisata) {
                $wishlistWisata->delete();
            } else {
                $newWishlistWisata = new Wishlist();
                $newWishlistWisata->user_id = Auth::user()->id;
                $newWishlistWisata->wisata_id = $wisataId;
                $newWishlistWisata->save();
            }
        }

        return redirect()->route('wisataDetail', $wisataId);
    }
}

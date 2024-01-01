<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\CoinUse;
use App\Models\Explore;
use App\Models\Insight;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderExplore;
use App\Models\User;
use App\Models\Wisata;
use App\Models\Wishlist;
use App\Models\WishlistExplore;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function homepage() {
        $carouselList = Carousel::all();
        $exploreList = Explore::limit(3)->get();
        $insightList = Insight::limit(3)->get();

        return view('user.index')
            ->with('carouselList', $carouselList)
            ->with('exploreList', $exploreList)
            ->with('insightList', $insightList);
    }

    public function orderList(Request $request) {
        $type = $request->query('type');

        if($type == 'history') {
            $orderWisataList = Order::with('customer')->with('wisata')->where('user_id', '=', Auth::user()->id)->where('status_code', '=', '2')->get();
            $orderExploreList = OrderExplore::with('customer')->with('explore')->where('user_id', '=', Auth::user()->id)->where('status_code', '=', '2')->get();
        } else {
            $orderWisataList = Order::with('customer')->with('wisata')->where('user_id', '=', Auth::user()->id)->where('status_code', '=', '1')->where('date', '>=', Carbon::today()->subDays(30))->get();
            $orderExploreList = OrderExplore::with('customer')->with('explore')->where('user_id', '=', Auth::user()->id)->where('status_code', '=', '1')->where('date', '>=', Carbon::today()->subDays(30))->get();
            $type = 'order';
        }

        return view('user.history')
            ->with('type', $type)
            ->with('orderWisata', $orderWisataList)
            ->with('orderExplore', $orderExploreList);
    }

    public function wishlist(Request $request) {
        $type = $request->query('type');
        
        if($type == 'explore') {
            $list = WishlistExplore::with('explore')->where('user_id', '=', Auth::user()->id)->get();
        } else {
            $type = 'wisata';
            $list = Wishlist::with('wisata')->where('user_id', '=', Auth::user()->id)->get();
        }

        return view('user.wishlist')
            ->with('list', $list)
            ->with('type', $type);
    }
    
    public function voucher(Request $request) {
        $voucherList = User::where('id', '=', Auth::user()->id)->first()->unusedVouchers();

        return view('user.voucher')
            ->with('voucherList', $voucherList);
    }

    public function coin(Request $request) {
        $useCoinList = CoinUse::where('user_id', '=', Auth::user()->id)->orderBy('date', 'desc')->get();
        $carouselList = Carousel::all();

        return view('user.coin')
            ->with('carouselList', $carouselList)
            ->with('useCoinList', $useCoinList);
    }

    public function notification(Request $request) {
        $type = $request->query('type');
        
        if($type == 'transaksi') {
            $list = Notification::where('user_id', '=', Auth::user()->id)->where('type', '=', '0')->orderBy('date', 'desc')->get();
        } else if($type == 'promo') {
            $list = Notification::where('user_id', '=', Auth::user()->id)->where('type', '=', '1')->orderBy('date', 'desc')->get();
        } else if($type == 'koin') {
            $list = Notification::where('user_id', '=', Auth::user()->id)->where('type', '=', '2')->orderBy('date', 'desc')->get();
        } else {
            $type = 'all';
            $list = Notification::where('user_id', '=', Auth::user()->id)->orderBy('date', 'desc')->get();
        }

        return view('user.notification')
            ->with('list', $list)
            ->with('type', $type);
    }

    public function campaign(Request $request) {
        return view('user.campaign');
    }

    public function faq(Request $request) {
        return view('user.faq');
    }

    public function profile(Request $request) {
        return view('user.profile');
    }

    public function submitProfile(Request $request) {
        $validateReq = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'dob' => 'required|date',
            'telp' => 'required',
            'gender' => 'required|in:M,F',
            'nationality' => 'required|in:0,1',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->dob = $request->dob;
        $user->telp = $request->telp;
        $user->gender = $request->gender;
        $user->nationality = $request->nationality;
        $user->save();

        return redirect()->route('profile');
    }

    public function search(Request $request) {
        $search = $request->query('search');

        if($search != null) {
            $wisataList = Wisata::where('name', 'like', '%'.$search.'%')->get();
            $exploreList = Explore::where('name', 'like', '%'.$search.'%')->get();
        } else {
            $wisataList = Wisata::all();
            $exploreList = Explore::all();
            $search = '';
        }

        return view('user.search')
            ->with('wisataList', $wisataList)
            ->with('exploreList', $exploreList)
            ->with('search', $search);
    }
}

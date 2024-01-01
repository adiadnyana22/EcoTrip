<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdminCarouselController extends Controller
{
    public function carouselListPage() {
        $carousels = Carousel::all();

        return view('admin.carousel')->with('carousels', $carousels);
    }

    public function carouselAddPage() {
        return view('admin.carousel-add');
    }

    public function carouselAddMethod(Request $request) {
        $validateReq = $request->validate([
            'picture' => 'required|image|file|mimes:jpeg,jpg,png|max:2048',
            'link' => 'required',
        ]);

        $carousel = new Carousel();

        $file = $request->file('picture');
        $filename = Str::upper(Str::random(16)).'.'.$file->getClientOriginalExtension();
        $file->move('assets/user/images/carousel', $filename);
        $carousel->picture = $filename;
        $carousel->link = $request->link;

        $carousel->save();

        return redirect()->route('adminCarousel');
    }

    public function carouselDetailPage(Carousel $carousel) {
        return view('admin.carousel-detail')->with('carousel', $carousel);
    }

    public function carouselDeleteMethod(Carousel $carousel) {
        File::delete('assets/user/images/carousel/'.$carousel->picture);
        $carousel->delete();

        return redirect()->route('adminCarousel');
    }

    public function carouselEditMethod(Carousel $carousel, Request $request) {
        $validateReq = $request->validate([
            'link' => 'required'
        ]);

        $carousel->link = $request->link;
        $carousel->save();

        return redirect()->route('adminCarousel');
    }

    public function carouselEditPage(Carousel $carousel) {
        return view('admin.carousel-edit')->with('carousel', $carousel);
    }
}

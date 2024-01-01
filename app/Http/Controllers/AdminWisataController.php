<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\WisataPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdminWisataController extends Controller
{
    public function wisataListPage() {
        $wisatas = Wisata::all();

        return view('admin.wisata')->with('wisatas', $wisatas);
    }

    public function wisataDetailPage(Wisata $wisata) {
        $wisataImages = WisataPicture::where('wisata_id', '=', $wisata->id)->get();
        return view('admin.wisata-detail')->with('wisata', $wisata)->with('wisataImages', $wisataImages);
    }

    public function wisataEditPage(Wisata $wisata) {
        $wisataImages = WisataPicture::where('wisata_id', '=', $wisata->id)->get();
        return view('admin.wisata-edit')->with('wisata', $wisata)->with('wisataImages', $wisataImages);
    }

    public function wisataEditMethod(Wisata $wisata, Request $request) {
        $validateReq = $request->validate([
            'name' => 'required',
            'local_weekday' => 'required|numeric',
            'local_weekend' => 'required|numeric',
            'foreign_weekday' => 'required|numeric',
            'foreign_weekend' => 'required|numeric',
            'location' => 'required',
            'description' => 'required',
            'activity' => 'required',
            'includes' => 'required',
            'picture' => 'image|file|mimes:jpeg,jpg,png|max:2048',
            'file.*' => 'image|file|mimes:jpeg,jpg,png|max:2048'
        ]);

        $wisata->name = $request->name;
        $wisata->local_price = $request->local_weekday;
        $wisata->local_weekend_price = $request->local_weekend;
        $wisata->foreign_price = $request->foreign_weekday;
        $wisata->foreign_weekend_price = $request->foreign_weekend;
        $wisata->location = $request->location;
        $wisata->description = $request->description;
        $wisata->activity = $request->activity;
        $wisata->includes = $request->includes;

        if($request->file('picture')){
            File::delete('assets/user/images/wisata/'.$wisata->picture);
            $file = $request->file('picture');
            $filename = Str::upper(Str::random(16)).'.'.$file->getClientOriginalExtension();
            $file->move('assets/user/images/wisata', $filename);
            $wisata->picture = $filename;
        };

        $files = $request->file('file');
        if($request->hasFile('file')) {
            foreach ($files as $file) {
                $filenameFile = Str::upper(Str::random(16)).'.'.$file->getClientOriginalExtension();
                $file->move('assets/user/images/wisata', $filenameFile);
                $wisataPicture = new WisataPicture();
                $wisataPicture->wisata_id = $wisata->id;
                $wisataPicture->picture = $filenameFile;
                $wisataPicture->save();
            }
        }

        $wisata->save();

        return redirect()->route('adminWisata');
    }

    public function wisataAddPage() {
        return view('admin.wisata-add');
    }

    public function wisataAddMethod(Request $request) {
        $validateReq = $request->validate([
            'name' => 'required',
            'local_weekday' => 'required|numeric',
            'local_weekend' => 'required|numeric',
            'foreign_weekday' => 'required|numeric',
            'foreign_weekend' => 'required|numeric',
            'location' => 'required',
            'description' => 'required',
            'activity' => 'required',
            'includes' => 'required',
            'picture' => 'required|image|file|mimes:jpeg,jpg,png|max:2048',
            'file.*' => 'image|file|mimes:jpeg,jpg,png|max:2048'
        ]);

        $wisata = new Wisata();
        $wisata->name = $request->name;
        $wisata->local_price = $request->local_weekday;
        $wisata->local_weekend_price = $request->local_weekend;
        $wisata->foreign_price = $request->foreign_weekday;
        $wisata->foreign_weekend_price = $request->foreign_weekend;
        $wisata->location = $request->location;
        $wisata->description = $request->description;
        $wisata->activity = $request->activity;
        $wisata->includes = $request->includes;
        $wisata->rating = 0;
        $wisata->order = 0;

        $file = $request->file('picture');
        $filename = Str::upper(Str::random(16)).'.'.$file->getClientOriginalExtension();
        $file->move('assets/user/images/wisata', $filename);
        $wisata->picture = $filename;
        $wisata->save();

        $files = $request->file('file');
        if($request->hasFile('file')) {
            foreach ($files as $file) {
                $filenameFile = Str::upper(Str::random(16)).'.'.$file->getClientOriginalExtension();
                $file->move('assets/user/images/wisata', $filenameFile);
                $wisataPicture = new WisataPicture();
                $wisataPicture->wisata_id = $wisata->id;
                $wisataPicture->picture = $filenameFile;
                $wisataPicture->save();
            }
        }

        return redirect()->route('adminWisata');
    }

    public function wisataDeleteMethod(Wisata $wisata) {
        $wisataImages = WisataPicture::where('wisata_id', '=', $wisata->id)->get();

        foreach ($wisataImages as $image) {
            File::delete('assets/user/images/wisata/'.$image->picture);
            $image->delete();
        }

        File::delete('assets/user/images/wisata/'.$wisata->picture);
        $wisata->delete();

        return redirect()->route('adminWisata');
    }

    public function wisataImageDeleteMethod(WisataPicture $wisataPicture) {
        File::delete('assets/user/images/wisata/'.$wisataPicture->picture);
        $wisataPicture->delete();

        return redirect()->route('adminWisataEdit', $wisataPicture->wisata_id);
    }
}

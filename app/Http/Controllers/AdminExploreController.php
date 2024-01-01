<?php

namespace App\Http\Controllers;

use App\Models\Explore;
use App\Models\ExplorePicture;
use App\Models\MeetingPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdminExploreController extends Controller
{
    public function meetingListPage() {
        $points = MeetingPoint::all();

        return view('admin.explore-meeting')->with('points', $points);
    }

    public function meetingEditPage(MeetingPoint $point) {
        return view('admin.explore-meeting-edit')->with('point', $point);
    }

    public function meetingEditMethod(MeetingPoint $point, Request $request) {
        $validateReq = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'map' => 'required',
        ]);

        $point->title = $request->title;
        $point->description = $request->description;
        $point->mapIframe = $request->map;
        $point->save();

        return redirect()->route('adminExploreMeeting');
    }

    public function meetingDeleteMethod(MeetingPoint $point) {
        $point->delete();

        return redirect()->route('adminExploreMeeting');
    }

    public function meetingAddPage() {
        return view('admin.explore-meeting-add');
    }

    public function meetingAddMethod(Request $request) {
        $validateReq = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'map' => 'required',
        ]);

        $point = new MeetingPoint();
        $point->title = $request->title;
        $point->description = $request->description;
        $point->mapIframe = $request->map;
        $point->save();

        return redirect()->route('adminExploreMeeting');
    }

    public function meetingDetailPage(MeetingPoint $point) {
        return view('admin.explore-meeting-detail')->with('point', $point);
    }

    public function exploreListPage() {
        $explores = Explore::all();

        return view('admin.explore')->with('explores', $explores);
    }

    public function exploreDetailPage(Explore $explore) {
        $exploreImages = ExplorePicture::where('explore_id', '=', $explore->id)->get();
        return view('admin.explore-detail')->with('explore', $explore)->with('exploreImages', $exploreImages);
    }

    public function exploreEditPage(Explore $explore) {
        $exploreImages = ExplorePicture::where('explore_id', '=', $explore->id)->get();
        return view('admin.explore-edit')->with('explore', $explore)->with('exploreImages', $exploreImages);
    }

    public function exploreEditMethod(Explore $explore, Request $request) {
        $validateReq = $request->validate([
            'name' => 'required',
            'type' => 'required|in:0,1',
            'local_weekday' => 'required|numeric',
            'local_weekend' => 'required|numeric',
            'foreign_weekday' => 'required|numeric',
            'foreign_weekend' => 'required|numeric',
            'location' => 'required',
            'description' => 'required',
            'activity' => 'required',
            'includes' => 'required',
            'itinerary' => 'required',
            'picture' => 'image|file|mimes:jpeg,jpg,png|max:2048',
            'file.*' => 'image|file|mimes:jpeg,jpg,png|max:2048'
        ]);

        $explore->name = $request->name;
        $explore->type = $request->type;
        $explore->local_price = $request->local_weekday;
        $explore->local_weekend_price = $request->local_weekend;
        $explore->foreign_price = $request->foreign_weekday;
        $explore->foreign_weekend_price = $request->foreign_weekend;
        $explore->location = $request->location;
        $explore->description = $request->description;
        $explore->activity = $request->activity;
        $explore->includes = $request->includes;
        $explore->itinerary = $request->itinerary;

        if($request->file('picture')){
            File::delete('assets/user/images/explore/'.$explore->picture);
            $file = $request->file('picture');
            $filename = Str::upper(Str::random(16)).'.'.$file->getClientOriginalExtension();
            $file->move('assets/user/images/explore', $filename);
            $explore->picture = $filename;
        };

        $files = $request->file('file');
        if($request->hasFile('file')) {
            foreach ($files as $file) {
                $filenameFile = Str::upper(Str::random(16)).'.'.$file->getClientOriginalExtension();
                $file->move('assets/user/images/explore', $filenameFile);
                $explorePicture = new ExplorePicture();
                $explorePicture->explore_id = $explore->id;
                $explorePicture->picture = $filenameFile;
                $explorePicture->save();
            }
        }

        $explore->save();

        return redirect()->route('adminExplore');
    }

    public function exploreAddPage() {
        return view('admin.explore-add');
    }

    public function exploreAddMethod(Request $request) {
        $validateReq = $request->validate([
            'name' => 'required',
            'type' => 'required|in:0,1',
            'local_weekday' => 'required|numeric',
            'local_weekend' => 'required|numeric',
            'foreign_weekday' => 'required|numeric',
            'foreign_weekend' => 'required|numeric',
            'location' => 'required',
            'description' => 'required',
            'activity' => 'required',
            'includes' => 'required',
            'itinerary' => 'required',
            'picture' => 'required|image|file|mimes:jpeg,jpg,png|max:2048',
            'file.*' => 'image|file|mimes:jpeg,jpg,png|max:2048'
        ]);

        $explore = new Explore();
        $explore->name = $request->name;
        $explore->type = $request->type;
        $explore->local_price = $request->local_weekday;
        $explore->local_weekend_price = $request->local_weekend;
        $explore->foreign_price = $request->foreign_weekday;
        $explore->foreign_weekend_price = $request->foreign_weekend;
        $explore->location = $request->location;
        $explore->description = $request->description;
        $explore->activity = $request->activity;
        $explore->includes = $request->includes;
        $explore->itinerary = $request->itinerary;
        $explore->rating = 0;
        $explore->order = 0;

        $file = $request->file('picture');
        $filename = Str::upper(Str::random(16)).'.'.$file->getClientOriginalExtension();
        $file->move('assets/user/images/explore', $filename);
        $explore->picture = $filename;
        $explore->save();

        $files = $request->file('file');
        if($request->hasFile('file')) {
            foreach ($files as $file) {
                $filenameFile = Str::upper(Str::random(16)).'.'.$file->getClientOriginalExtension();
                $file->move('assets/user/images/explore', $filenameFile);
                $explorePicture = new ExplorePicture();
                $explorePicture->explore_id = $explore->id;
                $explorePicture->picture = $filenameFile;
                $explorePicture->save();
            }
        }

        return redirect()->route('adminExplore');
    }

    public function exploreDeleteMethod(Explore $explore) {
        $exploreImages = ExplorePicture::where('explore_id', '=', $explore->id)->get();

        foreach ($exploreImages as $image) {
            File::delete('assets/user/images/explore/'.$image->picture);
            $image->delete();
        }

        File::delete('assets/user/images/explore/'.$explore->picture);
        $explore->delete();

        return redirect()->route('adminExplore');
    }

    public function exploreImageDeleteMethod(ExplorePicture $explorePicture) {
        File::delete('assets/user/images/explore/'.$explorePicture->picture);
        $explorePicture->delete();

        return redirect()->route('adminExploreEdit', $explorePicture->explore_id);
    }
}

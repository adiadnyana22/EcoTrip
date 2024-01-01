<?php

namespace App\Http\Controllers;

use App\Models\Insight;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdminInsightController extends Controller
{
    public function insightListPage() {
        $insights = Insight::all();

        return view('admin.insight')->with('insights', $insights);
    }

    public function insightDetailPage(Insight $insight) {
        return view('admin.insight-detail')->with('insight', $insight);
    }

    public function insightEditPage(Insight $insight) {
        return view('admin.insight-edit')->with('insight', $insight);
    }

    public function insightEditMethod(Insight $insight, Request $request) {
        $validateReq = $request->validate([
            'title' => 'required',
            'insight_content' => 'required',
            'picture' => 'image|file|mimes:jpeg,jpg,png|max:2048',
        ]);

        $insight->title = $request->title;
        $insight->content = $request->insight_content;
        if($request->file('picture')){
            File::delete('assets/user/images/insight/'.$insight->picture);
            $file = $request->file('picture');
            $filename = Str::upper(Str::random(16)).'.'.$file->getClientOriginalExtension();
            $file->move('assets/user/images/insight', $filename);
            $insight->picture = $filename;
        };
        $insight->save();

        return redirect()->route('adminInsight');
    }

    public function insightAddPage() {
        return view('admin.insight-add');
    }

    public function insightAddMethod(Request $request) {
        $validateReq = $request->validate([
            'title' => 'required',
            'insight_content' => 'required',
            'picture' => 'required|image|file|mimes:jpeg,jpg,png|max:2048',
        ]);

        $insight = new Insight();
        $insight->title = $request->title;
        $insight->content = $request->insight_content;
        $insight->date = Carbon::now();

        $file = $request->file('picture');
        $filename = Str::upper(Str::random(16)).'.'.$file->getClientOriginalExtension();
        $file->move('assets/user/images/insight', $filename);
        $insight->picture = $filename;

        $insight->save();

        return redirect()->route('adminInsight');
    }

    public function insightDeleteMethod(Insight $insight) {
        File::delete('assets/user/images/insight/'.$insight->picture);
        $insight->delete();

        return redirect()->route('adminInsight');
    }
}

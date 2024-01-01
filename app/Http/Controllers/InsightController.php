<?php

namespace App\Http\Controllers;

use App\Models\Insight;
use Illuminate\Http\Request;

class InsightController extends Controller
{
    public function insightList(Request $request) {
        $search = $request->query('search');

        if($search != null) {
            $insightList = Insight::where('title', 'like', '%'.$search.'%')->get();
        } else {
            $insightList = Insight::all();
            $search = '';
        }

        return view('user.insight')
            ->with('insightList', $insightList)
            ->with('search', $search);
    }

    public function insightDetail(Insight $insight) {
        return view('user.insight_detail')
            ->with('insight', $insight);
    }

    public function insightDetailContent(Insight $insight) {
        return view('user.insight_detail_content')
            ->with('insight', $insight);
    }
}

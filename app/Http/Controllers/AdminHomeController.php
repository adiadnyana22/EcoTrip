<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderExplore;
use App\Models\Sysparam;
use App\Models\Waste;
use App\Models\WasteImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;

class AdminHomeController extends Controller
{
    public function index() {
        $countPendingEcoWaste = Waste::where('status_code', '=', '1')->get()->count();
        $countPendingEcoWisata = Order::where('status_code', '=', '1')->where('date', '>=', Carbon::today())->get()->count();
        $countPendingEcoExplore = OrderExplore::where('status_code', '=', '1')->where('date', '>=', Carbon::today())->get()->count();

        return view('admin.dashboard')
            ->with('pendingEcoWaste', $countPendingEcoWaste)
            ->with('pendingEcoWisata', $countPendingEcoWisata)
            ->with('pendingEcoExplore', $countPendingEcoExplore);
    }

    public function aboutPage(Request $request) {
        $about = Sysparam::where('param', '=', 'ecotrip_desc')->first();

        return view('admin.about')
            ->with('about', $about);
    }

    public function aboutEditMethod(Request $request) {
        $validateReq = $request->validate([
            'about' => 'required'
        ]);

        $about = Sysparam::where('param', '=', 'ecotrip_desc')->first();
        $about->value = $request->about;
        $about->save();

        return redirect()->route('adminAbout');
    }

    public function cleanImage(Request $request) {
        foreach (File::allFiles(public_path('assets/admin/images/waste')) as $file) {
            $dbImage = WasteImage::with('waste')->where('image', '=', $file->getFilename())->first();

            if($dbImage == null || ($dbImage != null && $dbImage->waste->status_code == 2 && Carbon::parse($dbImage->waste->updated_at)->lt(Carbon::today()->subDays(10)))) {
                File::delete($file);
            }
        }

        return redirect()->route('adminDashboard');
    }
}

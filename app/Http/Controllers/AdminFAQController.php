<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class AdminFAQController extends Controller
{
    public function FAQListPage() {
        $faq = Faq::all();

        return view('admin.faq')->with('faqs', $faq);
    }

    public function FAQEditPage(Faq $faq) {
        return view('admin.faq-edit')->with('faq', $faq);
    }

    public function FAQEditMethod(Faq $faq, Request $request) {
        $validateReq = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->save();

        return redirect()->route('adminFAQ');
    }

    public function FAQDeleteMethod(Faq $faq) {
        $faq->delete();

        return redirect()->route('adminFAQ');
    }

    public function FAQAddPage() {
        return view('admin.faq-add');
    }

    public function FAQAddMethod(Request $request) {
        $validateReq = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $faq = new Faq();
        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->save();

        return redirect()->route('adminFAQ');
    }
}

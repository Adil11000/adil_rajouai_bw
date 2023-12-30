<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelsFAQ;


class FAQController extends Controller
{
    public function index()
    {
        return view('faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('faq.create');
    }

    public function store(Request $request)
    {
        FAQ::create($request->all());
        return redirect()->route('faq.index');
    }

    public function edit(FAQ $faq)
    {
        return view('faq.edit', compact('faq'));
    }

    public function update(Request $request, FAQ $faq)
    {
        $faq->update($request->all());
        return redirect()->route('faq.index');
    }

    public function destroy(FAQ $faq)
    {
        $faq->delete();
        return redirect()->route('faq.index');
    }
}
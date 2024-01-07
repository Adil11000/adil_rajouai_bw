<?php

namespace App\Http\Controllers;

use App\Models\FaqQuestion;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(FaqQuestion::class, 'faq-question');
    }

    public function index()
    {
        $questions = FaqQuestion::with('category')->get();
        return view('faq.index', compact('questions'));
    }

    public function create(Request $request)
    {
        $this->authorize('create', FaqQuestion::class);
        $categories = FaqCategory::all();
        return view('faq.create', compact('categories', 'request'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', FaqQuestion::class);

        $request->validate([
            'category_id' => 'required|exists:faq_categories,id',
            'question' => 'required',
            'answer' => 'required',
        ]);

        FaqQuestion::create([
            'faq_category_id' => $request->category_id,
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect()->route('faq.index')->with('success', 'Question created successfully.');
    }

    public function show(FaqQuestion $faqQuestion)
    {
        return view('faq.show', compact('faqQuestion'));
    }

    public function edit(FaqQuestion $faqQuestion)
    {
        $this->authorize('update', $faqQuestion);
        $categories = FaqCategory::all();
        return view('faq.edit_question', compact('faqQuestion', 'categories'));
    }

    public function update(Request $request, FaqQuestion $faqQuestion)
    {
        $this->authorize('update', $faqQuestion);

        $request->validate([
            'category_id' => 'required|exists:faq_categories,id',
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faqQuestion->update([
            'faq_category_id' => $request->category_id,
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect()->route('faq.index')->with('success', 'Question updated successfully.');
    }

    public function destroy(FaqQuestion $faqQuestion)
    {
        $this->authorize('delete', $faqQuestion);

        $faqQuestion->delete();

        return redirect()->route('faq.index')->with('success', 'Question deleted successfully.');
    }
}



<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use App\Models\FaqQuestion;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(FaqCategory::class, 'faq-category');
    }

    public function index()
    {
        $categories = FaqCategory::with('questions')->get();
        return view('faq.index', compact('categories'));
    }

    public function create()
    {
        $this->authorize('create', FaqCategory::class);
        return view('faq.create_category');
    }

    public function store(Request $request)
    {
        $this->authorize('create', FaqCategory::class);

        $request->validate([
            'name' => 'required|max:255',
        ]);

        FaqCategory::create($request->all());

        return redirect()->route('faq.index')->with('success', 'Category created successfully.');
    }

    public function edit(FaqCategory $faqCategory)
    {
        $this->authorize('update', $faqCategory);
        return view('faq.edit_category', compact('faqCategory'));
    }

    
    public function update(Request $request, FaqCategory $faqCategory)
    {
        $this->authorize('update', $faqCategory);

        $request->validate([
            'name' => 'required|max:255',
        ]);

        $faqCategory->update($request->all());

        return redirect()->route('faq.index')->with('success', 'Category updated successfully.');
    }
    public function destroy(FaqCategory $faqCategory)
    {
        $this->authorize('delete', $faqCategory);

        $faqCategory->questions()->delete();

        $faqCategory->delete();

        return redirect()->route('faq.index')->with('success', 'Category deleted successfully.');
    }
}

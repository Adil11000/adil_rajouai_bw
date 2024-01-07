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
        return view('faq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        FaqCategory::create($request->all());

        return redirect()->route('faq.index')->with('success', 'Category created successfully.');
    }

    public function edit(FaqCategory $faqCategory)
    {
        $this->authorize('update', $faqCategory);
        return view('faq.edit', compact('faqCategory'));
    }

    public function update(Request $request, FaqCategory $category)
    {
        $this->authorize('update', $category);

        $request->validate([
            'name' => 'required|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('faq.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(FaqCategory $category)
    {
        $this->authorize('delete', $category); // Voeg beleidscontrole toe
        $category->delete();

        return redirect()->route('faq.index')->with('success', 'Category deleted successfully.');
    }
}

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



public function create()
{
    $this->authorize('create', FaqQuestion::class);
    $categories = FaqCategory::all();
    return view('faq.create', compact('categories'));
}


public function store(Request $request)
{
    $this->authorize('create', FaqQuestion::class);

    $request->validate([
        'category_id' => 'required|exists:faq_categories,id',
        'question' => 'required',
        'answer' => 'required',
    ]);

    FaqQuestion::create($request->all());

    return redirect()->route('faq.index')->with('success', 'Question created successfully.');
}


    public function edit(FaqQuestion $faqQuestion)
{
    $this->authorize('update', $faqQuestion);
    return view('faq.edit', compact('faqQuestion'));
}

    public function update(Request $request, FaqQuestion $question)
    {
        $request->validate([
            'category_id' => 'required|exists:faq_categories,id',
            'question' => 'required',
            'answer' => 'required',
        ]);

        $question->update($request->all());

        return redirect()->route('faq.index')->with('success', 'Question updated successfully.');
    }

    public function destroy(FaqQuestion $question)
    {
        $question->delete();

        return redirect()->route('faq.index')->with('success', 'Question deleted successfully.');
    }
}

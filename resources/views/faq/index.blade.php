@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <h2>Frequently Asked Questions</h2>

        @foreach($categories as $category)
            <div class="category">
                <h3>{{ $category->name }}</h3>

                <div>

                @forelse($category->questions as $question)
                    <div class="question">
                        <h4>{{ $question->question }}</h4>
                        <p>{{ $question->answer }}</p>
                    </div>
                @empty
                    <p>No questions available for this category.</p>
                @endforelse

                <!-- Toon de knoppen alleen als de gebruiker een admin is -->
                @can('create', \App\Models\FaqQuestion::class)
                    <a href="{{ route('faq-questions.create', ['faq_category_id' => $category->id]) }}" class="btn btn-primary">Add Question</a>

                @endcan
                @can('create', \App\Models\FaqCategory::class)
                    <a href="{{ route('faq-categories.create') }}" class="btn btn-primary">Add Category</a>
                @endcan

                @can('update', $category)
                    <a href="{{ route('faq-questions.edit', $question->id) }}" class="btn btn-warning">Edit Question</a>
                @endcan
                @can('update', $category)
                    <a href="{{ route('faq-categories.edit', $category->id) }}" class="btn btn-warning">Edit Category</a>
                @endcan

                @can('delete', $category)
                    <form action="{{ route('faq-questions.destroy', $question->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Question</button>
                    </form>
                    
                @endcan
                @can('delete', $category)
                    <form action="{{ route('faq-categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Category</button>
                    </form>
                @endcan
            </div>

            </div>
        @endforeach
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Frequently Asked Questions</h2>

        @foreach($categories as $category)
            <div class="category">
                <h3>{{ $category->name }}</h3>

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
                    <a href="{{ route('faq.create', ['category_id' => $category->id]) }}" class="btn btn-primary">Add Question</a>
                @endcan

                @can('update', $category)
                    <a href="{{ route('faq.edit', $category->id) }}" class="btn btn-warning">Edit Category</a>
                @endcan

                @can('delete', $category)
                    <form action="{{ route('faq.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Category</button>
                    </form>
                @endcan
            </div>
        @endforeach
    </div>
@endsection

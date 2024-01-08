@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <h2>Veelgestelde Vragen</h2>

        @foreach($categories as $category)
            <div class="category">
                <h3>{{ $category->name }}</h3>

                <div>

                @php
                    $lastQuestion = null; // Definieer de variabele buiten de lus
                @endphp

                @forelse($category->questions as $question)
                    <div class="question">
                        <h4>{{ $question->question }}</h4>
                        <p>{{ $question->answer }}</p>
                    </div>
                    
                    @php
                        $lastQuestion = $question; // Wijs het laatste element toe aan de variabele
                    @endphp

                @empty
                    <p>Geen vragen beschikbaar voor deze categorie.</p>
                @endforelse

                <!-- Toon de knoppen altijd -->
                @can('create', \App\Models\FaqQuestion::class)
                    <a href="{{ route('faq-questions.create', ['faq_category_id' => $category->id]) }}" class="btn btn-primary">Add question</a>
                @endcan

                @can('create', \App\Models\FaqCategory::class)
                    <a href="{{ route('faq-categories.create') }}" class="btn btn-primary">Add category</a>
                @endcan

                @if(isset($lastQuestion))
                    @can('update', $category)
                        <a href="{{ route('faq-questions.edit', $lastQuestion->id) }}" class="btn btn-warning">Edit question</a>
                    @endcan

                    @can('delete', $category)
                        <form action="{{ route('faq-questions.destroy', $lastQuestion->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete question</button>
                        </form>
                    @endcan
                @endif

                @can('update', $category)
                    <a href="{{ route('faq-categories.edit', $category->id) }}" class="btn btn-warning">Edit category</a>
                @endcan

                @can('delete', $category)
                    <form action="{{ route('faq-categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete category</button>
                    </form>
                @endcan

                </div>
            </div>
        @endforeach
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Edit Question</h2>

        <form action="{{ route('faq-questions.update', $faqQuestion->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="category_id">Category:</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $faqQuestion->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="question">Question:</label>
                <input type="text" name="question" id="question" class="form-control" value="{{ $faqQuestion->question }}" required>
            </div>

            <div class="form-group">
                <label for="answer">Answer:</label>
                <textarea name="answer" id="answer" class="form-control" required>{{ $faqQuestion->answer }}</textarea>
            </div>

            <!-- Voeg andere formuliervelden toe zoals nodig -->

            <button type="submit" class="btn btn-primary">Update Question</button>
        </form>
    </div>
@endsection

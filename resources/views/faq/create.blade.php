@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Create New Question</h2>

        <form action="{{ route('faq-questions.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="category_id">Category:</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="question">Question:</label>
                <input type="text" name="question" id="question" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="answer">Answer:</label>
                <textarea name="answer" id="answer" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create Question</button>
        </form>
    </div>
@endsection

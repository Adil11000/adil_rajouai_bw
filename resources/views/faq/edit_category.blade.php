
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Edit Category</h2>

        <form action="{{ route('faq-categories.update', $faqCategory->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $faqCategory->name }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>
@endsection

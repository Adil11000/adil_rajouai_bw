@extends('layouts.app')

@section('content')
<div class="container h-100 mt-5">
    @auth
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h3>Edit FAQ</h3>
            <form action="{{ route('faq-questions.update', $faqQuestion->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Category Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
                </div>

                <div class="form-group">
                    <label for="faq_category_id">FAQ Category ID:</label>
                    <input type="text" class="form-control" id="faq_category_id" name="faq_category_id" value="{{ $category->faq_category_id }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Category Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $category->description }}</textarea>
                </div>


                <button type="submit" class="btn mt-3 btn-primary">Update FAQ</button>
            </form>
        </div>
    </div>
    @endauth
</div>
@endsection

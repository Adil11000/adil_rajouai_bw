@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h2>Create New Category</h2>

    <form action="{{ route('faq-categories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Category Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Category</button>
    </form>

</div>

@endsection

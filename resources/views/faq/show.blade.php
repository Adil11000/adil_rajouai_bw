@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Question Details</h2>

        <div class="card">
            <div class="card-body">
                <h4>{{ $question->question }}</h4>
                <p>{{ $question->answer }}</p>
                <p><strong>Category:</strong> {{ $question->category->name }}</p>
            </div>
        </div>
    </div>
@endsection

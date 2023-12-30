
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>FAQ</h2>
        @foreach($faqs->groupBy('category') as $category => $faqs)
            <h3>{{ $category }}</h3>
            @foreach($faqs as $faq)
                <h4>{{ $faq->question }}</h4>
                <p>{{ $faq->answer }}</p>
            @endforeach
        @endforeach
    </div>
@endsection


@extends('layouts.app')

@section('content')

<div class="container">
    <h1>My favs ads</h1>

    @forelse($likedProducts as $product)
        <div class="card mb-4"> 
            <div class="card-header">
            @if ($product->image)
                    <img src="{{ asset('public/images/' . $product->image) }}" class="img-fluid" alt="Product Image">
                @endif
                <h5 class="card-title">{{ $product->name }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $product->description }}</p>
                <p class="card-text">Price: ${{ $product->price }}</p>
                
            </div>
        </div>
    @empty
        <p>No liked products yet.</p>
    @endforelse
</div>

@endsection
